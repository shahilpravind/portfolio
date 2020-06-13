import numpy as np
import cv2


lot_spaces = []


def get_lots():
    lots = []
    file = open("lot_data.txt", "r")

    for line in file:
        split_str = line.split()
        lot = [int(split_str[0]), int(split_str[1]), int(split_str[2]), int(split_str[3])]
        lots.append(lot)

    file.close()
    return lots


def get_area(x1, y1, x2, y2):
    return ((x2 - x1) * (y2 - y1))


def is_occupied(lot=[], obj=[]):
    area_limit = 2000

    u1 = lot[0]
    v1 = lot[1]
    x1 = lot[2]
    y1 = lot[3]

    u2 = obj[0]
    v2 = obj[1]
    x2 = obj[2]
    y2 = obj[3]

    if (u2 >= u1 and v2 >= v1 and u2 <= x1 and v2 <= y1):
        if get_area(u2, v2, x1, y1) >= area_limit:
            return True
    elif (x2 >= u1 and y2 >= v1 and x2 <= x1 and y2 <= y1):
        if get_area(u1, v1, x2, y2) >= area_limit:
            return True
    elif (u2 >= u1 and y2 >= v1 and u2 <= x1 and y2 <= y1):
        if get_area(u2, v1, x1, y2) >= area_limit:
            return True
    elif (x2 >= u1 and v2 >= v1 and x2 <= x1 and v2 <= y1):
        if get_area(u1, v2, x2, y1) >= area_limit:
            return True

    return False


lot_spaces = get_lots()

img = cv2.imread("image-2.jpg")
gray = cv2.cvtColor(img, cv2.COLOR_RGB2GRAY)

kernel = np.ones((5,5), 'uint8')
eroded = cv2.erode(gray, kernel, iterations=1)

threshold = 150
ret, thresh = cv2.threshold(eroded, threshold, 255, cv2.THRESH_BINARY)

thresh = cv2.dilate(thresh, kernel, iterations=5)

contours, hierarchy = cv2.findContours(thresh, cv2.RETR_TREE, cv2.CHAIN_APPROX_SIMPLE)

index = -1
thickness = 4
color = (255, 0, 255)

occupied = []

objects = np.zeros([img.shape[0], img.shape[1], 3], 'uint8')
for c in contours:
    area = cv2.contourArea(c)

    if (area > 5000):
        print(area)
        x, y, w, h = cv2.boundingRect(c)

        for i in range(len(lot_spaces)-1):
            lot = [ lot_spaces[i][0], lot_spaces[i][1], lot_spaces[i+1][2], lot_spaces[i+1][3] ]
            if is_occupied(lot, [x,y,x+w,y+h]) or is_occupied([x,y,x+w,y+h], lot):
                occupied.append(i)


for i in range(len(lot_spaces)-1):
    cv2.rectangle(img, (lot_spaces[i][0], lot_spaces[i][1]), (lot_spaces[i+1][2], lot_spaces[i+1][3]), (0,255,0), 2)

for i in occupied:
    cv2.rectangle(img, (lot_spaces[i][0], lot_spaces[i][1]), (lot_spaces[i+1][2], lot_spaces[i+1][3]), (255,0,0), 2)


cv2.imshow("Thresh", img)

cv2.waitKey(0)
cv2.destroyAllWindows()
import numpy as np
import cv2

lots = []
gen_y = None
gen_height = None


def sort_multi(multi, index):
    for i in range(len(multi)-1, 0, -1):
        for j in range(i):
            if multi[j][index] > multi[j+1][index]:
                temp = multi[j]
                multi[j] = multi[j+1]
                multi[j+1] = temp
    return multi


def write_file(data):
    file = open("lot_data.txt", "w")
    
    for i in range(len(data)):
        file.write( str(data[i][0]) + " " )
        file.write( str(data[i][1]) + " " )
        file.write( str(data[i][2]) + " " )
        file.write( str(data[i][3]) + "\n" )
        

    file.close()


img = cv2.imread("image.jpg")
gray = cv2.cvtColor(img, cv2.COLOR_RGB2GRAY)

kernel = np.ones((5,5), 'uint8')
dilated = cv2.dilate(gray, kernel, iterations=1)

threshold = 200
ret, thresh = cv2.threshold(dilated, threshold, 255, cv2.THRESH_BINARY)

contours, hierarchy = cv2.findContours(thresh, cv2.RETR_TREE, cv2.CHAIN_APPROX_SIMPLE)

index = -1
thickness = 4
color = (255, 0, 255)

objects = np.zeros([img.shape[0], img.shape[1], 3], 'uint8')
for c in contours:
    cv2.drawContours(objects, [c], -1, color, -1)
    area = cv2.contourArea(c)

    if area > 200 and area < 800:
        x, y, w, h = cv2.boundingRect(c)

        if gen_y == None:
            gen_y = y
            gen_height = h
        elif y < gen_y - gen_height / 2:
            gen_y = y
            gen_height = h

        lot = [int(x + w/2), gen_y, int(x + w/2), gen_y + gen_height]
        lots.append(lot)


lots = sort_multi(lots, 0)
lots = sort_multi(lots, 1)

for i in range(len(lots)-1):
    cv2.rectangle(img, (lots[i][0], lots[i][1]), (lots[i+1][2], lots[i+1][3]), (0,255,0), 2)

cv2.imshow("Image", img)

cv2.waitKey(0)
cv2.destroyAllWindows()



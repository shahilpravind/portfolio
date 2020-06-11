import numpy as np
import cv2
import time
import math

red = (0, 0, 255)
blue = (255, 0, 0)

init_dist = 25
end_dist = 50
offset = 10

cap = cv2.VideoCapture("video.mp4")


def calc_point_x2(m, x1, y1, y2):
   return ((y2 - y1) / m) + x1


def get_centre(img):
    thresh = 200
    height, width = img.shape[0:2]

    cent_x1, cent_y1, cent_x2, cent_y2 = (0, 0, 0, 0)
    
    row = init_dist
    val_count = 0

    while val_count < 2 and row < height:
        max = 0
        x1, x2, centre, y = (0, 0, 0, 0)

        for col in range(0, width):
            count = 0

            if img[row][col] >= thresh:
                count += 1
                col += 1

                while (col < width) and (img[row][col] >= thresh):
                    count += 1
                    col += 1
                if count > max:
                    max = count
                    x1 = col - count
                    x2 = col - 1
                    centre = int((x2 - x1) / 2) + int(x1)
                    y = int(row)
        
        if (max > 0):
            if val_count == 0:
                cent_x1 = centre
                cent_y1 = y
            else:
                cent_x2 = centre
                cent_y2 = y

            val_count += 1
        
        row += end_dist if (row == init_dist) else offset

    return (cent_x1, cent_y1, cent_x2, cent_y2)


def close():
    cap.release()
    cv2.destroyAllWindows()


kernel = np.ones((5,5), 'uint8')
prev_x2, prev_y2 = (0, 0)
while (cap.isOpened()):
    ret, img = cap.read()
    #if ret == True:
        #img = cv2.flip(img, 0)

    img = cv2.bitwise_not(img)
    gray = cv2.cvtColor(img, cv2.COLOR_RGB2GRAY)
        
    threshold = 160
    ret, thresh = cv2.threshold(gray, threshold, 255, cv2.THRESH_BINARY)
    dilated = cv2.dilate(thresh, kernel, iterations=3)
    
    height, width = img.shape[0:2]

    x1, y1, x2, y2 = get_centre(dilated)
    cv2.line(img, (x1, y1), (x2, y2), red, 10)


    if (x2 - x1 == 0):
        print("Angle: 0")
    else:
        slope = (y2 - y1) / (x2 - x1)
        angle = ( math.atan(slope) ) * 180 / math.pi
        print("Angle: {}".format(angle))

    my_x2 = calc_point_x2(slope, prev_x2, prev_y2+30, y2)

    cv2.line(img, (prev_x2, prev_y2 + 30), (int(my_x2), y2), blue, 10)
    prev_x2 = x2
    prev_y2 = y2

    cv2.imshow("Image", img)

    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

close()


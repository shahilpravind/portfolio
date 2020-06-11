import numpy as np
import cv2
import time

init_dist = 50
offset = 20

cap = cv2.VideoCapture("video.mp4")


def close():
    cap.release()
    cv2.destroyAllWindows()


kernel = np.ones((5,5), 'uint8')
while (cap.isOpened()):
    ret, img = cap.read()
    #if ret == True:
        #img = cv2.flip(img, 0)

    img = cv2.bitwise_not(img)
    gray = cv2.cvtColor(img, cv2.COLOR_RGB2GRAY)
        
    threshold = 160
    ret, gray = cv2.threshold(gray, threshold, 255, cv2.THRESH_BINARY)
    
    gray = cv2.dilate(gray, kernel, iterations=3)
    
    lines_x = []
    lines_y = []

    height, width = gray.shape[0:2]
    thresh_white = 200

    for row in range(init_dist, height, offset):
        max = 0
        x1 = 0
        x2 = 0
        center = 0
        y = 0

        for col in range(0, width):
            count = 0

            if gray[row][col] >= thresh_white:
                count += 1
                col += 1

                while (col < width) and (gray[row][col] >= thresh_white):
                    count += 1
                    col += 1
                if count > max:
                    max = count
                    x1 = col - count
                    x2 = col - 1
                    center = int((x2 - x1) / 2) + int(x1)
                    y = int(row)
        
        if (max > 0):
            lines_x.append( center )
            lines_y.append( y )
                    

    for i in range(len(lines_x) - 1):
        cv2.line(img, (lines_x[i], lines_y[i]), (lines_x[i-1], lines_y[i-1]), (0, 0, 255), 10)

    cv2.imshow("Image", img)
    cv2.imshow("Gray", gray)

    if cv2.waitKey(1) & 0xFF == ord('q'):
        break



close()


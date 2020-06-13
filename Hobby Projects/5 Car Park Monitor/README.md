# Car Park Monitoring (2018 Project)
<p>
This project was made as a submission to the Smart City hackathon held in the second half of 2018.
</p>

<p>
Image processing based monitoring of a car park to determine empty and occupied slots. The project consists of a script that reads and processes camera feeds and, an accompanying android app that gets real-time updates on the parking lot's status.
</p>
<p>
The entire project has been uploaded however, due to the complexity of setup, a simplified version of the project has been provided that demonstrates the underlying concept behind the project. Instructions have only been provided for running this script. If a demo of the entire app including the server setup and android app is desired, please contact me via email as listed on my CV.
</p>

## Project Information
1. Development environment:
    1. Processing script: python (libraries => opencv)
    2. Android app: Java, Android Studio + Android SDK
    3. Server: socket.io
2. To run the demo script:
    0. Ensure that opencv and numpy python libraries are installed. Can be installed with pip.
    1. Navigate to the folder, 'Demo'.
    2. Open command prompt and cd into this directory.
    3. Run 'python get_lots.py'.
    4. Run 'python main.py'.
3. Demo uses images however, it would work similarly on a video feed since video is just a sequence of images (frames).

## Demo Screenshot

<p>
    <img src="https://github.com/shahilpravind/portfolio/blob/master/Hobby%20Projects/5%20Car%20Park%20Monitor/images/lots.png" width="300" alt="Lots">
    <img src="https://github.com/shahilpravind/portfolio/blob/master/Hobby%20Projects/5%20Car%20Park%20Monitor/images/demo.png" width="300" alt="Demo">
</p>
<br>

&copy; 2020 Shahil Avishal Pravind. All rights reserved.

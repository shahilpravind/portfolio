# Connect 4G Firefox Extension (2020 Project)
A firefox extension for easily viewing the amount of data left on my Connect Prepay account. This extension was not released to avoid copyright and trademark infringement and, other issues however, I do use it locally. Clicking the button on the toolbar opens up a locally hosted python app which displays the desired information (see screenshots below).

## Project Information
1. The code for the entire project is availble.
2. I was unable to download the extension installer to my machine hence, it needs to be built if required. To build the firefox extension, instructions for building firefox extensions need to be followed.
3. The python app under 'app' folder can be executed independently from the command line using 'python main.py'. Before execution however, ensure to install the 'Beautiful Soup' and 'pywebview' packages using pip. Also, update 'UNAME' AND 'PASSW' variables in 'main.py' with your username and password respectively.
4. Viewing the entire working extension in its entirety takes a bit of work. Firstly, the addon needs to be built and installed. Secondly, native messaging needs to be setup. Instructions on this can be found on firefox extension development page. After this, it should work fine.

## Screenshots
<p>
    <img src="https://github.com/shahilpravind/portfolio/blob/master/Hobby%20Projects/3%20Firefox%20Extension/images/icon.png" width="300" alt="Toolbar Icon">
    <img src="https://github.com/shahilpravind/portfolio/blob/master/Hobby%20Projects/3%20Firefox%20Extension/images/app.png" width="300" alt="App">
</p>
<br>

&copy; 2020 Shahil Avishal Pravind. All rights reserved.

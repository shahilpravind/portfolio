<%@ Page Language="VB" AutoEventWireup="false" CodeFile="Test.aspx.vb" Inherits="Test" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head runat="server">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Titans Gym</title>

        <!-- Bootstrap core CSS -->
        <link href="Styles/bootstrap.min.css" rel="stylesheet" />
        <link href="/Styles/w3.css" rel="Stylesheet" />

        <link href="Styles/Lightbox.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        
         <div class="row">
 <div class="column">
   <img src="Images/img1.jpg" onclick="openModal();currentSlide(1)" class="hover-shadow">
 </div>
 <div class="column">
   <img src="Images/img2.jpg" onclick="openModal();currentSlide(2)" class="hover-shadow">
 </div>
 <div class="column">
   <img src="Images/img3.jpg" onclick="openModal();currentSlide(3)" class="hover-shadow">
 </div>
 <div class="column">
   <img src="Images/img4.jpg" onclick="openModal();currentSlide(4)" class="hover-shadow">
 </div>
</div>

<div id="myModal" class="modal">
 <span class="close cursor" onclick="closeModal()">&times;</span>
 <div class="modal-content">

   <div class="mySlides">
     <div class="numbertext">1 / 4</div>
       <img src="Images/img_nature_wide.jpg" style="width:100%">
   </div>

   <div class="mySlides">
     <div class="numbertext">2 / 4</div>
       <img src="Images/img_fjords_wide.jpg" style="width:100%">
   </div>

   <div class="mySlides">
     <div class="numbertext">3 / 4</div>
       <img src="Images/img_mountains_wide.jpg" style="width:100%">
   </div>

   <div class="mySlides">
     <div class="numbertext">4 / 4</div>
       <img src="Images/img_lights_wide.jpg" style="width:100%">
   </div>

   <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
   <a class="next" onclick="plusSlides(1)">&#10095;</a>

   <div class="caption-container">
     <p id="caption"></p>
   </div>

   <div class="column">
     <img class="demo" src="Images/img1.jpg" onclick="currentSlide(1)" alt="Nature">
   </div>

   <div class="column">
     <img class="demo" src="Images/img2.jpg" onclick="currentSlide(2)" alt="Trolltunga">
   </div>

   <div class="column">
     <img class="demo" src="Images/img3.jpg" onclick="currentSlide(3)" alt="Mountains">
   </div>

   <div class="column">
     <img class="demo" src="Images/img4.jpg" onclick="currentSlide(4)" alt="Lights">
   </div>
 </div>
</div>
    
        <script src="Scripts/Lightbox.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script src="Scripts/jquery.min.js"></script>
        <script>            window.jQuery || document.write('<script src="Scripts/jquery.min.js"><\/script>')</script>
        <script src="Scripts/bootstrap.min.js"></script>
        
    </body>
</html>


<%@ Page Title="" Language="VB" MasterPageFile="~/Standard.master" AutoEventWireup="false" CodeFile="Gallery.aspx.vb" Inherits="Gallery" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <title> Gallery </title>

    <link href="Styles/w3.css" rel="stylesheet" type="text/css" />
    <link href="Styles/Lightbox.css" rel="stylesheet" type="text/css" />
</asp:Content>


<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    
    <div class="container">
        <h1 class="page-header"> Photo Gallery </h1> 
        
        <ol class="breadcrumb">
            <li><a href="#Home.aspx">Home</a></li>
            <li class="active">Gallery</li>
        </ol>
        
        <br />

        <h3> Everyday Pictures </h3>
        
        <div class="row">
            <div class="col-md-4">
                <img style="margin-bottom:25px;border-radius:5px" src="Images/Gallery/gallery-small-1.jpg" onclick="openModal();currentSlide(1)" class="hover-shadow img-thumbnail">
            </div>
            <div class="col-md-4">
                <img style="margin-bottom:25px;border-radius:5px"src="Images/Gallery/gallery-small-2.jpg" onclick="openModal();currentSlide(2)" class="hover-shadow img-thumbnail">
            </div>
            <div class="col-md-4">
                <img style="margin-bottom:25px;border-radius:5px" src="Images/Gallery/gallery-small-3.jpg" onclick="openModal();currentSlide(3)" class="hover-shadow img-thumbnail">
            </div>
            <div class="col-md-4">
                <img style="margin-bottom:25px;border-radius:5px"src="Images/Gallery/gallery-small-4.jpg" onclick="openModal();currentSlide(4)" class="hover-shadow img-thumbnail">
            </div>

            <div class="col-md-4">
                <img style="margin-bottom:25px;border-radius:5px" src="Images/Gallery/gallery-small-5.jpg" onclick="openModal();currentSlide(5)" class="hover-shadow img-thumbnail">
            </div>
            <div class="col-md-4">
                <img style="margin-bottom:25px;border-radius:5px"src="Images/Gallery/gallery-small-6.jpg" onclick="openModal();currentSlide(6)" class="hover-shadow img-thumbnail">
            </div>
            <div class="col-md-4">
                <img style="margin-bottom:25px;border-radius:5px" src="Images/Gallery/gallery-small-7.jpg" onclick="openModal();currentSlide(7)" class="hover-shadow img-thumbnail">
            </div>
        </div>

        <div id="myModal" class="modal">
            <span class="close cursor" onclick="closeModal()">&times;</span>
            <div class="modal-content">

                <div class="mySlides">
                    <div class="numbertext"></div>
                    <img src="Images/Gallery/gallery-1.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext"></div>
                    <img src="Images/Gallery/gallery-2.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext"></div>
                    <img src="Images/Gallery/gallery-3.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext"></div>
                    <img src="Images/Gallery/gallery-4.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext"></div>
                    <img src="Images/Gallery/gallery-5.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext"></div>
                    <img src="Images/Gallery/gallery-6.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext"></div>
                    <img src="Images/Gallery/gallery-7.jpg" style="width:100%">
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
        </div> <br />


        <h3> Nadi Branch - First Anniversary </h3>
        <div class="row">
            <div class="col-md-4">
                <img style="margin-bottom:25px;border-radius:5px" src="Images/Gallery/gallery-small-8.jpg" onclick="openModal();currentSlide(1)" class="hover-shadow img-thumbnail">
            </div>
            <div class="col-md-4">
                <img style="margin-bottom:25px;border-radius:5px"src="Images/Gallery/gallery-small-9.jpg" onclick="openModal();currentSlide(2)" class="hover-shadow img-thumbnail">
            </div>
            <div class="col-md-4">
                <img style="margin-bottom:25px;border-radius:5px" src="Images/Gallery/gallery-small-10.jpg" onclick="openModal();currentSlide(3)" class="hover-shadow img-thumbnail">
            </div>
            <div class="col-md-4">
                <img style="margin-bottom:25px;border-radius:5px"src="Images/Gallery/gallery-small-11.jpg" onclick="openModal();currentSlide(4)" class="hover-shadow img-thumbnail">
            </div>

            <div class="col-md-4">
                <img style="margin-bottom:25px;border-radius:5px" src="Images/Gallery/gallery-small-12.jpg" onclick="openModal();currentSlide(5)" class="hover-shadow img-thumbnail">
            </div>
        </div>

        <div id="Div2" class="modal">
            <span class="close cursor" onclick="closeModal()">&times;</span>
            <div class="modal-content">

                <div class="mySlides">
                    <div class="numbertext"></div>
                    <img src="Images/Gallery/gallery-8.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext"></div>
                    <img src="Images/Gallery/gallery-9.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext"></div>
                    <img src="Images/Gallery/gallery-10.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext"></div>
                    <img src="Images/Gallery/gallery-11.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext"></div>
                    <img src="Images/Gallery/gallery-12.jpg" style="width:100%">
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
        </div> <br /> <hr />

    </div>

    <script src="Scripts/Lightbox.js" type="text/javascript"></script>
</asp:Content>


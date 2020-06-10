<%@ Page Title="" Language="VB" MasterPageFile="~/Standard.master" AutoEventWireup="false" CodeFile="Home.aspx.vb" Inherits="Home" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <title>Titans Gym</title>

    <link href="Styles/w3.css" rel="stylesheet" type="text/css" />

    <style>
        p 
        {
            font-size: 15px;
        }
        
        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
        }

        /* On mouse-over, add a deeper shadow */
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        /* Add some padding inside the card container */
        .container {
            padding: 2px 16px;
        }
    </style>
</asp:Content>


<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <!-- Carousel - Jumbotron -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="first-slide" src="Images/slide-1.jpg" alt="First slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Sign Up Today</h1>
                        <p><a class="btn btn-lg btn-primary" href="#Register" role="button">Sign Up</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="second-slide" src="Images/slide-2.jpg" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>About Us</h1>
                        <p>The premier fitness centre in Fiji</p>
                        <p><a class="btn btn-lg btn-primary" href="#About.aspx" role="button">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="third-slide" src="Images/slide-3.jpg" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Gallery</h1>
                        <p>Share the moments with us</p>
                        <p><a class="btn btn-lg btn-primary" href="#Gallery.aspx" role="button">Browse gallery</a></p>
                    </div>
                </div>
            </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> <br />
    <!-- carousel -->


    <!-- ================================================== -->

    <div class="container">

        <!-- Content Begins Here -->

        <!-- News Feed and Blog Updates -->
        <div class="row">
            <h2>Blog</h2> <br />
            
            <div class="card">
                <div class="container">
                    <br />
                    <a href="Reviews.aspx" class="h2"><h4><b>Stepping up to fitness</b></h4></a>
                    <p>Tuesday April 18, 2017</p>
                    <p style="font-size:15px;">One thing people often get wrong about fitness is that they believe they need dozens of pieces of equipment to get a good workout.
                       In fact, one of the most basic and effective pieces of training equipment is found in virtually every home in the land – a set of stairs.
                       Here are some benefits of using stairs or steps as a workout tool.
                    </p>
                    <br />
                </div>
            </div>
            <br /> <br />

            <div class="card">
                <div class="container">
                    <br />
                    <a href="Blog.aspx" class="h2"><h4><b>Five easy lunchbox swaps to get you eating healthy</b></h4></a>
                    <p>Tuesday April 11, 2017</p>
                    <p style="font-size:15px;">Getting started with healthy eating doesn’t have to be a chore. Often, the best changes are the small ones you manage to stick to, not the big ones which you’re tempted to abandon after a week. Keeping that in mind, here are five easy lunchbox swaps to get you on the path to healthy eating.</p>
                    <br />
                </div>
            </div>
        </div> <br />


        <!-- Reviews -->

        <div class="page-header">
            <a href="Reviews.aspx" class="h2"><h2>Reviews</h2></a>
        </div>

        <!-- Three columns of text below the carousel -->
        <div class="marketing row">
            <div class="col-lg-4">
                <img class="img-circle" src="Images/Reviews/review-1.png" alt="Profile Picture" width="150" height="150">
                <h2>Divy D</h2>
                <p>The location of the gym is superb but the facilities could get a much better. The cashier at the counter is so polite and always smiling. The trainers are so nice and their webpage is so easy to browse through.</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" src="Images/Reviews/review-2.jpg" alt="Profile Picture" width="150" height="150">
                <h2>Grumpy Cat</h2>
                <p>The gym services are amazing</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" src="Images/Reviews/review-4.jpg" alt="Profile Picture" width="150" height="150">
                <h2>GamerDudett</h2>
                <p>Titans gym has helped me with my weight loss but some trainers are so grumpy that when we do something wrong they start to ignore us and go after the ones who are correct and forget about us. Also, the subscription page sometimes plays up while we are trying to subscribe.</p>
            </div><!-- /.col-lg-4 -->
        </div> <br /><!-- /.row -->

        <!-- Gallery -->
        <div class="page-header">
            <a href="Gallery.aspx" class="h2"><h2>Gallery</h2></a>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <img src="Images/Gallery/gallery-small-1.jpg" class="img-thumbnail" alt="man lying down and lifting weights" width="300" height="300">
            </div>
            <div class="col-lg-4">
                <img src="Images/Gallery/gallery-small-2.jpg" class="img-thumbnail" alt="lady exercising" width="300" height="300">
            </div>
            <div class="col-lg-4">
                <img src="Images/Gallery/gallery-small-3.jpg" class="img-thumbnail" alt="man lifting weight standing up" width="300" height="300">
            </div>
        </div> <br />

        <!-- Catalogue -->
        <div class="page-header">
            <a href="Catalogue.aspx" class="h2"> <h2 style="display:inline;">Catalogue</h2> </a> <h4 style="display:inline;"> - for sale at the gym</h4> 
        </div>

        <!-- Four columns content -->
        <div class="row">
            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="Images/Catalogue/product-1.jpg" class="img-thumbnail" alt="A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera">
                    </div>
                    <div class="panel-footer">
                        <h3>Powerade Isotonic</h3>
                        <p>When You Need That Extra Boost</p>
                    </div>
                </div>
            </div> <!-- /.col-lg-3 -->


            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="Images/Catalogue/product-2.jpg" class="img-thumbnail" alt="A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera">
                    </div>
                    <div class="panel-footer">
                        <h3>Powerade Standard</h3>
                        <p>Unleash The Beast</p>
                    </div>
                </div>
            </div><!-- /.col-lg-3 -->

            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="Images/Catalogue/product-3.png" class="img-thumbnail" alt="A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera" >
                    </div>
                    <div class="panel-footer">
                        <h3>Up & Go Liquid</h3>
                        <p>Why Eat When You Can Drink</p>
                    </div>
                </div>
            </div><!-- /.col-lg-3 -->

            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="Images/Catalogue/product-4.jpg" class="img-thumbnail" alt="A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera" >
                    </div>
                    <div class="panel-footer">
                        <h3>Gold Standard Whey</h3>
                        <p>Start Lifting</p>
                    </div>
                </div>
            </div><!-- /.col-lg-3 -->
        </div><!-- /.row -->
        <br />

        <hr /> <br />
        <div class="row">
            <div class="col-md-2"> </div>
        <a href="FindGym.aspx" class="btn btn-lg btn-primary col-md-3" role="button">Find a Gym</a>
        <div class="col-md-2"> </div>
        <a href="Contact.aspx" class="btn btn-lg btn-primary col-md-3" role="button">Contact Us</a>
        </div>

        <!-- Content Ends Here -->
    </div>
</asp:Content>


<%@ Page Title="" Language="VB" MasterPageFile="~/Standard.master" AutoEventWireup="false" CodeFile="Reviews.aspx.vb" Inherits="Reviews" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <title> Reviews </title>
</asp:Content>


<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">

    <div class="container marketing">
        <h1 class="page-header"> Reviews </h1> 
        
        <ol class="breadcrumb">
            <li><a href="#Home.aspx">Home</a></li>
            <li><a href="#.aspx">Services</a></li>
            <li class="active">Reviews</li>
        </ol>
        
        <br />

        <div class="row">
            <div class="col-md-5"> </div>
            <a href="AddReview.aspx" class="btn btn-lg btn-primary col-md-2" role="button">Add a Review</a>
        </div>
        <div class="page-header"> </div> <br />

        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img class="img-circle" src="Images/Reviews/review-1.png" alt="Profile Picture" width="175" height="150">
                        <h3>Divy D</h3>
                        <h5>Date: 30/04/17</h5>
                        <p>The location of the gym is superb but the facilities could get a much better. The cashier at the counter is so polite and always smiling. The trainers are so nice and their webpage is so easy to browse through.</p>
                    </div>
                </div>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img class="img-circle" src="Images/Reviews/review-2.jpg" alt="Profile Picture" width="175" height="150">
                        <h3>Grumpy Cat</h3>
                        <h5>Date: 25/04/17</h5>
                        <p>The gym services are amazing</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img class="img-circle" src="Images/Reviews/review-3.jpg" alt="Profile Picture" width="175" height="150">
                        <h3>Ravs</h3>
                        <h5>Date: 23/04/17</h5>
                        <p>The drinks sold are so cheap and helpful.  The helped me lose a lot of weight.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img class="img-circle" src="Images/Reviews/review-4.jpg" alt="Profile Picture" width="175" height="150">
                        <h3>GamerDudett</h3>
                        <h5>Date: 20/04/17</h5>
                        <p>Titans gym has helped me with my weight loss but some trainers are so grumpy that when we do something wrong they start to ignore us and go after the ones who are correct and forget about us. Also, the subscription page sometimes plays up while we are trying to subscribe.</p>
                    </div>
                </div>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img class="img-circle" src="Images/Reviews/review-5.jpg" alt="Profile Picture" width="175" height="150">
                        <h3>Some Guy</h3>
                        <h5>Date: 16/04/17</h5>
                        <p>The training videos are so helpful. I have lost 10 kg using those and the photo gallery is so eye catching.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</asp:Content>


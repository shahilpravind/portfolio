<%@ Page Title="" Language="VB" MasterPageFile="~/Standard.master" AutoEventWireup="false" CodeFile="Catalogue.aspx.vb" Inherits="Catalogue" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <title> Catalogue </title>
</asp:Content>


<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">

    <div class="container">
        <h1 class="page-header"> Product Catalogue </h1> 
        
        <ol class="breadcrumb">
            <li><a href="#Home.aspx">Home</a></li>
            <li><a href="#.aspx">Services</a></li>
            <li class="active">Catalogue</li>
        </ol>
        
        <br />

        <div class="row">
            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="Images/Catalogue/product-1.jpg" class="img-thumbnail" alt="Powerade Isotonic">
                    </div>
                    <div class="panel-footer">
                        <h3>Powerade Isotonic</h3>
                        <p>When You Need That Extra Boost</p>
                    </div>
                </div>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="Images/Catalogue/product-2.jpg" class="img-thumbnail" alt="Product Standard">
                    </div>
                    <div class="panel-footer">
                        <h3>Powerade Standard</h3>
                        <p>Unleash The Beast</p>
                    </div>
                </div>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="Images/Catalogue/product-3.png" class="img-thumbnail" alt="Liquid Breakfast">
                    </div>
                    <div class="panel-footer">
                        <h3>Up & Go Liquid</h3>
                        <p>Why Eat When You Can Drink</p>
                    </div>
                </div>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="Images/Catalogue/product-4.jpg" class="img-thumbnail" alt="Whey Gold Standard" height="50px">
                    </div>
                    <div class="panel-footer">
                        <h3>Gold Standard Whey</h3>
                        <p>Start Lifting</p>
                    </div>
                </div>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="Images/Catalogue/product-5.jpg" class="img-thumbnail" alt="Power Whey Protein">
                    </div>
                    <div class="panel-footer">
                        <h3>Whey Power Protein</h3>
                        <p>Protein Powerhouse</p>
                    </div>
                </div>
        </div> <br /> <hr /> <br />

    </div>

</asp:Content>


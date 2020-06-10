<%@ Page Title="" Language="VB" MasterPageFile="~/Standard.master" AutoEventWireup="false" CodeFile="AboutDevs.aspx.vb" Inherits="AboutDevs" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <title>Meet the Team</title>

    <link href="Styles/w3.css" rel="stylesheet" type="text/css" />
    <link href="Styles/AboutDevs.css" rel="stylesheet" type="text/css" />

    <style>
        p 
        {
            color: Black;
            font-size: 15px;
            white-space: pre-wrap;
        }
    </style>
</asp:Content>


<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <div class="container">
        <h1 class="page-header"> Meet the Team </h1> 
        
        <ol class="breadcrumb">
            <li><a href="#Home.aspx">Home</a></li>
            <li><a href="#.aspx">About</a></li>
            <li class="active">About the Developers</li>
        </ol>
        
        <br />

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="Images/shahil.jpg" alt="Shahil" style="width:100%">
                    <div class="container">
                        <h3>Shahil Avishal Pravind</h3>
                        <p class="title">Designer, Developer</p> 
                        <p>E: pravind_shahil@titans.com.fj</p> 
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <img src="Images/arnesh.jpg" alt="Arnesh" style="width:100%">
                    <div class="container">
                        <h3>Arnesh Chandra</h3>
                        <p class="title">Design / Video Editor, Marketing</p>
                        <p>E: chandra_arnesh@titans.com.fj</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <img src="Images/kritesh.jpg" alt="Kritesh" style="width:100%">
                    <div class="container">
                        <h3>Kritesh Prasad</h3>
                        <p class="title">Content Developer, Marketing</p>
                        <p>E: prasad_kritesh@titans.com.fj</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <img src="Images/nalisha.jpg" alt="Nalisha" style="width:100%">
                    <div class="container">
                        <h3>Nalisha Singh</h3>
                        <p class="title">Content Developer</p>
                        <p>E: singh_nalisha@titans.com.fj</p>
                    </div>
                </div>
            </div>
        </div> 

    </div>
</asp:Content>


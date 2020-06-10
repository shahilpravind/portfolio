<%@ Page Title="" Language="VB" MasterPageFile="~/Standard.master" AutoEventWireup="false" CodeFile="AboutGym.aspx.vb" Inherits="AboutGym" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <title>About Titans Gym</title>
    <style>
        p 
        {
            font-size: 18px;
        }
    </style>
</asp:Content>


<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <div class="container">
        <h1 class="page-header"> About Us </h1> 
        
        <ol class="breadcrumb">
            <li><a href="#Home.aspx">Home</a></li>
            <li><a href="#.aspx">About</a></li>
            <li class="active">About the Gym</li>
        </ol>
        
        <br />

        <div class="row">
            <div class="col-lg-5"> </div>
            <div class="panel panel-default col-lg-3">
                <div class="panel-body" align="center">
                    <img src="images/logo.png" alt="logo" width="120" height="120" />
                    <h2 style="font-variant:small-caps"> Titans Gym </h2>
                    <hr />
                    <h4> Sweat up a Storm </h4>
                </div>
            </div>
        </div> <br />

        <div class="panel panel-default">
            <div class="panel-body">
                <h3> Who we are? </h3>
                <p>
                    “Titans Gym” is a local gym and fitness center that spans the bigger towns and cities of the country namely, Suva, Sigatoka, Nadi, Lautoka and Ba. The company operates with the mission “to provide a high quality gym service to the people of Fiji that enables them to participate in all form of physical activity without compromise for a healthy life. Thus, the business slogan reads “Sweat up a Storm”, stressing the firm’s goal to encourage intensive physical activity amongst the populace for a healthier lifestyle. The business was formed by a group of four individuals with the aim of establishing a fitness center in their local town of Ba to provide the community with a center for workouts. Due to the success of the business, the company was able to expand their operations to the major town and cities of Fiji and would now like grow their presence to the digital domain as a way to expand their service quality. 
                </p>
            </div>
        </div> <br />

        <div class="panel panel-default">
            <div class="panel-body">
                <h3> Our Mission </h3>
                <p>
                    The company mission dictates “promote health and advocate healthy leaving.” Investing in the gym does not only improve the productivity of the people but also their overall wellness and health   but also their overall wellness. By having gyms at our door steps and engaging in a workout and regimen before the day begins help people to stay healthy and fit and to avoid injuries.
                </p>
            </div>
        </div> <br />

        <div class="panel panel-default">
            <div class="panel-body">
                <h3> Our Vision </h3>
                <p>
                    The vision of the gym is “get people of Fiji actively involved in fitness or become premier gym in Fiji ". The vision's definition is to provide services to a large number of people across the country through our technical skills and resources, not only seeing this business from the commercial view point, however, considering people’s health in the society and as an active business, we aim to improves the health and lifestyle of the people in the country. Our strategies will be new, efficient and very helpful and with greater support from our members we hope to become one of the best gym in the country in all aspects.
                </p>
            </div>
        </div> <br />
    </div>
</asp:Content>


<%@ Page Title="" Language="VB" MasterPageFile="~/Standard.master" AutoEventWireup="false" CodeFile="Contact.aspx.vb" Inherits="Contact" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <title>Contact Us</title>
</asp:Content>


<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <div class="container">

        <h1 class="page-header"> Contact Us </h1> 
        
        <ol class="breadcrumb">
            <li><a href="#Home.aspx">Home</a></li>
            <li class="active">Contact</li>
        </ol>
        
        <br />

        <div runat="server" class="alert alert-success alert-dismissible fade-in fade-out" role="alert" 
            id="alertSuccess">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success: </strong> The message was successfully emailed to the Titans Gym staff. You shall receive a reply within 2 working days.
        </div> <br />

        <form>
            <div class="form-group">
                <label for="iptTitle"> Title: </label>
                <asp:TextBox runat="server" id="iptTitle" type="text" class="form-control" placeholder="Topic of your message"> </asp:TextBox>
            </div> <br />

            <div runat="server" class="form-group">
                <label for="selOptions">Gym Location:</label>
                <select class="form-control" id="selOptions">
                    <option selected>General</option>
                    <option>Suva</option>
                    <option>Sigatoka</option>
                    <option>Nadi</option>
                    <option>Lautoka</option>
                    <option>Ba</option>
                    <option>Tavua</option>
                </select>
            </div> <br />

            <div class="form-group">
                <label for="txaMessage"> Message: </label>
                <textarea runat="server" id="txaMessage" class="form-control" rows="8"></textarea>
            </div> <br />

            <div class="row">
                <div class="col-md-4"> </div>
                <asp:Button runat="server" id="btnSend" Text="Send Email" class="btn btn-primary col-md-1" />
                <div class="col-md-2"> </div>
                <asp:Button runat="server" id="btnClear" Text="Clear" class="btn btn-default col-md-1" />
            </div>
        </form>

    </div>
</asp:Content>


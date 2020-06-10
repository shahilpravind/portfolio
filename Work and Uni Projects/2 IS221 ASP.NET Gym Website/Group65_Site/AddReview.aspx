<%@ Page Title="" Language="VB" MasterPageFile="~/Standard.master" AutoEventWireup="false" CodeFile="AddReview.aspx.vb" Inherits="AddReview" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <title> Leave a Review </title>
</asp:Content>


<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    
    <div class="container">
        <h1 class="page-header"> Add a Review </h1>

        <div class="form-group">
            <label for="usr"> Review Title: </label>
            <input type="text" class="form-control" id="usr">
        </div>
        <br />

        <div class="form-group">
            <label for="comment"> Comment: </label>
            <textarea class="form-control" rows="8" id="comment"></textarea>
        </div>
        <br />

        <div class="row">
            <div class="col-md-4"> </div>
            <button type="button" class="btn btn-primary col-md-1">Submit</button>
            <div class="col-md-2"> </div>
            <button type="button" class="btn btn-default col-md-1">Clear</button>
        </div>
    </div>

</asp:Content>


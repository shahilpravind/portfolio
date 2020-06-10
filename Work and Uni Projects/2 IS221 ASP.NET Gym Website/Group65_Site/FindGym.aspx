<%@ Page Title="" Language="VB" MasterPageFile="~/Standard.master" AutoEventWireup="false" CodeFile="FindGym.aspx.vb" Inherits="FindGym" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <title> Find a Location </title>
</asp:Content>


<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    
    <div class="container">
        <h1> Find a Gym </h1>
        
        <ol class="breadcrumb">
            <li><a href="#Home.aspx">Home</a></li>
            <li><a href="#.aspx">Services</a></li>
            <li class="active">Find a Gym</li>
        </ol>
        
        <br />

        <table class="table">
            <tr>
                <td class="col-lg-3">
                    <br />
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 style="font-variant:small-caps">Location:</h3> <hr />
                    
                            <label style="padding-bottom:4px; font-size:medium;" class="radio-inline"><input runat="server" id="radSuva" type="radio" name="optradio" checked>Suva</label> <br />
                            <label style="padding-top:4px; padding-bottom:4px; font-size:medium;" class="radio-inline"><input runat="server" id="radSigatoka" type="radio" name="optradio">Sigatoka</label> <br />
                            <label style="padding-top:4px; padding-bottom:4px; font-size:medium;" class="radio-inline"><input runat="server" id="radNadi" type="radio" name="optradio">Nadi</label> <br />
                            <label style="padding-top:4px; padding-bottom:4px; font-size:medium;" class="radio-inline"><input runat="server" id="radLautoka" type="radio" name="optradio">Lautoka</label> <br />
                            <label style="padding-top:4px; padding-bottom:4px; font-size:medium;"class="radio-inline"><input runat="server" id="radBa" type="radio" name="optradio">Ba</label> <br />
                            <label style="padding-top:4px; font-size:medium;"class="radio-inline"><input runat="server" id="radTavua" type="radio" name="optradio">Tavua</label> <hr />
                    
                            <asp:Button ID="btnSearch" runat="server" Text="Search" class="btn btn-primary col-md-12"/> <br />
                        </div>
                    </div>
                </td>
                <td class="col-lg-1"><td></td>
                <td class="col-lg-8">
                    <br />
                    <asp:Image ID="imgMap" runat="server" class="img-thumbnail" alt="map" 
                        width="300em" ImageUrl="~/Images/Location/suva.png" />
                </td>
            </tr>
        </table>
    </div>

</asp:Content>


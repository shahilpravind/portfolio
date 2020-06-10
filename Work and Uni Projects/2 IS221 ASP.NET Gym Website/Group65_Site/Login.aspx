<%@ Page Title="" Language="VB" MasterPageFile="~/Standard.master" AutoEventWireup="false" CodeFile="Login.aspx.vb" Inherits="Login" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <title>Login</title>
</asp:Content>


<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <div class="container">
        <h1 class="page-header">Login</h1>
        <ol class="breadcrumb">
            <li><asp:HyperLink runat="server" id="lnkLogin">
                <asp:Label runat="server" id="lblLogin" Text="Login"></asp:Label>
            </asp:HyperLink></li>
        </ol>
        <br />

        <div runat="server" class="alert alert-success alert-dismissible fade-in fade-out" role="alert" 
            id="alertSuccess" visible="False">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Login Successful: </strong> Page will redirect in 3 seconds
        </div> <br />

        <div runat="server" class="alert alert-success alert-dismissible fade-in fade-out" role="alert" 
            id="alertFailed" visible="False">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Login Failed: </strong> Incorrect username or password
        </div> <br />
        <form>
            <div class="col-md-4"></div>
            <div class="form-group form-inline">
                <label for="iptUsername"> Username: 
                <asp:AccessDataSource ID="AccessDataSource1" runat="server" 
                    DataFile="~/App_Data/GymData.mdb" 
                    SelectCommand="SELECT * FROM [UserCredentials]"></asp:AccessDataSource>
                </label>
                <asp:TextBox runat="server" id="iptUsername" type="text" class="form-control"> </asp:TextBox>
            </div> <br />

            <div class="col-md-4"></div>
            <div class="form-group form-inline">
                <label for="iptPassword"> Password: 
                <asp:GridView ID="gdvLogin" runat="server" AutoGenerateColumns="False" 
                    DataKeyNames="USER_ID" DataSourceID="AccessDataSource1" Visible="False">
                    <Columns>
                        <asp:BoundField DataField="USER_ID" HeaderText="USER_ID" InsertVisible="False" 
                            ReadOnly="True" SortExpression="USER_ID"></asp:BoundField>
                        <asp:BoundField DataField="USER_NAME" HeaderText="USER_NAME" 
                            SortExpression="USER_NAME"></asp:BoundField>
                        <asp:BoundField DataField="USER_EMAIL" HeaderText="USER_EMAIL" 
                            SortExpression="USER_EMAIL"></asp:BoundField>
                        <asp:BoundField DataField="USER_PASSWORD" HeaderText="USER_PASSWORD" 
                            SortExpression="USER_PASSWORD"></asp:BoundField>
                        <asp:BoundField DataField="USER_ROLE" HeaderText="USER_ROLE" 
                            SortExpression="USER_ROLE"></asp:BoundField>
                    </Columns>
                </asp:GridView>
                </label>
                <asp:TextBox runat="server" id="iptPassword" type="text" class="form-control" 
                    TextMode="Password"></asp:TextBox>
            </div> <br />

            <div class="col-md-4"></div>
            <div class="row">
                <asp:Button runat="server" id="btnSend" Text="Login" class="btn btn-primary col-md-1" />
                <div class="col-md-1"></div>
                <asp:Button runat="server" id="btnClear" Text="Clear" class="btn btn-default col-md-1" />
            </div>

            <br />
            <div class="col-md-4"></div>
            <div class="col-md-8"> <a href="Register.aspx" class="col-md-5">Not a Member? Register Here</a> </div>
        </form>
    </div>
</asp:Content>


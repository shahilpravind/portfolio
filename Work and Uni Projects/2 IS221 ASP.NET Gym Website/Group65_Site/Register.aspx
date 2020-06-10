<%@ Page Title="" Language="VB" MasterPageFile="~/Standard.master" AutoEventWireup="false" CodeFile="Register.aspx.vb" Inherits="Register" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <title>Register</title>
</asp:Content>


<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <div class="container">
        <h1 class="page-header">Register</h1>
        <ol class="breadcrumb">
            <li><asp:HyperLink runat="server" id="lnkRegister">
                <asp:Label runat="server" id="lblRegister" Text="Register"></asp:Label>
            </asp:HyperLink></li>
        </ol>
        <br />

        <div runat="server" class="alert alert-success alert-dismissible fade-in fade-out" role="alert" 
            id="alertSuccess" visible="False">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Registration Successful: </strong> Please login by going to the login page
        </div> <br />

        <div runat="server" class="alert alert-success alert-dismissible fade-in fade-out" role="alert" 
            id="alertFailed" visible="False">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Registration Failed: </strong> Unable to create account
        </div> 
        <asp:AccessDataSource ID="adsRegister" runat="server" 
            DataFile="~/App_Data/GymData.mdb" 
            DeleteCommand="DELETE FROM [UserCredentials] WHERE [USER_ID] = ?" 
            InsertCommand="INSERT INTO [UserCredentials] ([USER_ID], [USER_NAME], [USER_EMAIL], [USER_PASSWORD], [USER_ROLE]) VALUES (?, ?, ?, ?, ?)" 
            SelectCommand="SELECT * FROM [UserCredentials]" 
            UpdateCommand="UPDATE [UserCredentials] SET [USER_NAME] = ?, [USER_EMAIL] = ?, [USER_PASSWORD] = ?, [USER_ROLE] = ? WHERE [USER_ID] = ?">
            <DeleteParameters>
                <asp:Parameter Name="USER_ID" Type="Int32" />
            </DeleteParameters>
            <InsertParameters>
                <asp:Parameter Name="USER_ID" Type="Int32" />
                <asp:Parameter Name="USER_NAME" Type="String" />
                <asp:Parameter Name="USER_EMAIL" Type="String" />
                <asp:Parameter Name="USER_PASSWORD" Type="String" />
                <asp:Parameter Name="USER_ROLE" Type="String" />
            </InsertParameters>
            <UpdateParameters>
                <asp:Parameter Name="USER_NAME" Type="String" />
                <asp:Parameter Name="USER_EMAIL" Type="String" />
                <asp:Parameter Name="USER_PASSWORD" Type="String" />
                <asp:Parameter Name="USER_ROLE" Type="String" />
                <asp:Parameter Name="USER_ID" Type="Int32" />
            </UpdateParameters>
        </asp:AccessDataSource>
        <br />

        <form>
            <div class="form-group form-inline col-md-12">
                <label style="margin-right: 42px" for="iptUsername" class="col-md-1"> Username: </label>
                <asp:TextBox runat="server" id="iptUsername" type="text" class="form-control"> </asp:TextBox>
            </div>

            <div class="form-group form-inline col-md-6">
                <label for="iptFName" class="col-md-3"> First Name: </label>
                <asp:TextBox runat="server" id="iptFname" type="text" class="form-control"> </asp:TextBox>
            </div>

            <div class="form-group form-inline col-md-6">
                <label for="iptLName" class="col-md-3"> Last Name: </label>
                <asp:TextBox runat="server" id="iptLName" type="text" class="form-control"> </asp:TextBox>
            </div>

            <div class="form-group form-inline col-md-6">
                <label for="iptEmail" class="col-md-3"> Email Address: </label>
                <asp:TextBox runat="server" id="iptEmail" type="text" class="form-control"> </asp:TextBox>
            </div> 

            <div class="form-group form-inline col-md-6">
                <label for="iptTown" class="col-md-3"> City/Town: </label>
                <asp:TextBox runat="server" id="iptTown" type="text" class="form-control"> </asp:TextBox>
            </div> 

            <div class="form-group form-inline col-md-6">
                <label for="iptPassword" class="col-md-3"> Password: </label>
                <asp:TextBox runat="server" id="iptPassword" type="text" class="form-control" 
                    TextMode="Password"></asp:TextBox>
            </div> 

            <div class="form-group form-inline col-md-6">
                <label for="iptPassword2" class="col-md-3"> Confirm Password: </label>
                <asp:TextBox runat="server" id="iptPassword2" type="text" class="form-control" 
                    TextMode="Password"></asp:TextBox>
            </div>

            <br />

            <div class="col-md-4"></div>
            <div class="row">
                <asp:Button runat="server" id="btnSend" Text="Register" class="btn btn-primary col-md-1" />
                <div class="col-md-1"></div>
                <asp:Button runat="server" id="btnClear" Text="Clear" class="btn btn-default col-md-1" />
            </div> <br />

            <div class="col-md-4"></div>
            <div class="col-md-8"> <a href="Login.aspx" class="col-md-5">Already a Member? Login Here</a> </div>
        </form>
    </div>
</asp:Content>


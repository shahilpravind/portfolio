<%@ Page Title="" Language="VB" MasterPageFile="~/Standard.master" AutoEventWireup="false" CodeFile="Tutorials.aspx.vb" Inherits="Tutorials" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <title> Tutorials </title>
</asp:Content>


<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    
    <div class="container">
        <h1 class="page-header"> Gym Guide </h1> 
        
        <ol class="breadcrumb">
            <li><a href="#Home.aspx">Home</a></li>
            <li><a href="#.aspx">Services</a></li>
            <li class="active">Tutorials</li>
        </ol>
        
        <br />

        <br />
        <div class="row">
            <h4 style="font-variant:small-caps" class="col-md-2">Select Category:</h4>

            <label class="radio-inline col-md-1"><input runat="server" id="radBegin" type="radio" name="optradio">Beginner</label>
            <label class="radio-inline col-md-1"><input runat="server" id="radInter" type="radio" name="optradio">Intermediate</label>
            <label class="radio-inline col-md-1"><input runat="server" id="radAdvan" type="radio" name="optradio">Advanced</label>
            <asp:Button ID="btnCatFilter" runat="server" Text="Filter" class="btn btn-primary col-md-1" style="margin-left:2em;"/>
        </div> <hr /> <br />

        <asp:AccessDataSource ID="AccessDataSource1" runat="server" 
            DataFile="~/App_Data/GymData.mdb" SelectCommand="SELECT * FROM [Tutorials]">
        </asp:AccessDataSource>
        <asp:GridView ID="gdvVideoData" runat="server" AutoGenerateColumns="False" 
            DataKeyNames="VIDEO_ID" DataSourceID="AccessDataSource1" Visible="False">
            <Columns>
                <asp:BoundField DataField="VIDEO_ID" HeaderText="VIDEO_ID" 
                    InsertVisible="False" ReadOnly="True" SortExpression="VIDEO_ID">
                </asp:BoundField>
                <asp:BoundField DataField="VIDEO_CATEGORY" HeaderText="VIDEO_CATEGORY" 
                    SortExpression="VIDEO_CATEGORY"></asp:BoundField>
                <asp:BoundField DataField="VIDEO_NAME" HeaderText="VIDEO_NAME" 
                    SortExpression="VIDEO_NAME"></asp:BoundField>
                <asp:BoundField DataField="VIDEO_LINK" HeaderText="VIDEO_LINK" 
                    SortExpression="VIDEO_LINK"></asp:BoundField>
            </Columns>
        </asp:GridView>

        <div runat="server" id="placeholderDiv">
            <h3 class="page-header"> Category - Beginner </h3> <br />

            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <iframe height="200" src="https://www.youtube.com/embed/DyTymdT2HnI" frameborder="0"></iframe>
                        </div>
                        <div class="panel-footer">
                            <h5><strong> FitBrit beginner gym workout </strong></h5>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <iframe height="200" src="https://www.youtube.com/embed/7qM-DRn10SE" frameborder="0"></iframe>
                        </div>
                        <div class="panel-footer">
                            <h4>Teen Beginners Bodybuilding Training - Upper Body - Chest, Arms, Shoulders </h4>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <iframe height="200" src="https://www.youtube.com/embed/A7ZgGLtvaFg" frameborder="0"></iframe>
                        </div>
                        <div class="panel-footer">
                            <h4>Beginner women's fitness program </h4>
                        </div>
                    </div>
                </div>
            </div> <br />
        
            <div align="center">
                <a href="Gallery.aspx" align="center"><h3 style="font-variant:small-caps" >See All</h3></a>
            </div> <hr /> <br />


            <h3 class="page-header"> Category - Intermediate </h3> <br />
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <iframe height="200" src="https://www.youtube.com/embed/v1wl-jv47ns" frameborder="0"></iframe>
                        </div>
                        <div class="panel-footer">
                            <h4>Abs Routine - Intermediate level </h4>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <iframe height="200" src="https://www.youtube.com/embed/w2hGNM4l5so" frameborder="0"></iframe>
                        </div>
                        <div class="panel-footer">
                            <h4>Rowing Machine : TECHNIQUE and BENEFITS </h4>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <iframe height="200" src="https://www.youtube.com/embed/voEAKyDAX0A" frameborder="0"></iframe>
                        </div>
                        <div class="panel-footer">
                            <h4>Jeff Seid Chest Mondays Commentary </h4>
                        </div>
                    </div>
                </div>
            </div> <br />
        
            <div align="center">
                <a href="Gallery.aspx" align="center"><h3 style="font-variant:small-caps" >See All</h3></a>
            </div> <hr /> <br />

            <h3 class="page-header"> Category - Advanced </h3> <br />
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <iframe height="200" src="https://www.youtube.com/embed/V3JygD07bpY" frameborder="0"></iframe>
                        </div>
                        <div class="panel-footer">
                            <h4>Lazar Angelov arms workout hard 2016 </h4>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <iframe height="200" src="https://www.youtube.com/embed/Gl9zQblQAiU" frameborder="0"></iframe>
                        </div>
                        <div class="panel-footer">
                            <h4>Lazar Angelov Shoulders Workout New</h4>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <iframe height="200" src="https://www.youtube.com/embed/Gl9zQblQAiU" frameborder="0"></iframe>
                        </div>
                        <div class="panel-footer">
                            <h4>Sergi Constance progress chest workout New</h4>
                        </div>
                    </div>
                </div>
            </div> <br />
        
            <div align="center">
                <a href="Gallery.aspx" align="center"><h3 style="font-variant:small-caps" >See All</h3></a>
            </div>
        </div>

    </div>

</asp:Content>


Imports System.Data
Imports System.Data.SqlClient

Partial Class Tutorials
    Inherits System.Web.UI.Page

    Protected Sub btnCatFilter_Click(sender As Object, e As System.EventArgs) Handles btnCatFilter.Click
        If (radBegin.Checked Or radInter.Checked Or radAdvan.Checked) Then
            placeholderDiv.InnerHtml = ""

            If (radBegin.Checked) Then

                placeholderDiv.InnerHtml = "<h3 class=""page-header""> Category - Beginner </h3> <br />" + _
                    "<div class=""row"">"

                For i = 0 To gdvVideoData.Rows.Count - 1
                    If gdvVideoData.Rows(i).Cells(1).Text.ToString() = "Beginner" Then

                        placeholderDiv.InnerHtml += "<div class=""col-lg-4""> <div style=""height:325px;"" class=""panel panel-default""> <div class=""panel-body""> " + _
                                                                "<iframe height=""200"" src=""" + gdvVideoData.Rows(i).Cells(3).Text.ToString() + """ frameborder=""0""></iframe>" + _
                                                            "</div> <div class=""panel-footer"">" + _
                                                                "<h5><strong>" + gdvVideoData.Rows(i).Cells(2).Text.ToString() + "</strong></h5>" + _
                                                            "</div> </div> </div>"

                    End If
                Next

                placeholderDiv.InnerHtml += "</div>"

            ElseIf (radInter.Checked) Then
                placeholderDiv.InnerHtml = "<h3 class=""page-header""> Category - Intermediate </h3> <br />" + _
                    "<div class=""row"">"

                For i = 0 To gdvVideoData.Rows.Count - 1
                    If gdvVideoData.Rows(i).Cells(1).Text.ToString() = "Intermediate" Then

                        placeholderDiv.InnerHtml += "<div class=""col-lg-4""> <div style=""height:325px;"" class=""panel panel-default""> <div class=""panel-body""> " + _
                                                                "<iframe height=""200"" src=""" + gdvVideoData.Rows(i).Cells(3).Text.ToString() + """ frameborder=""0""></iframe>" + _
                                                            "</div> <div class=""panel-footer"">" + _
                                                                "<h5><strong>" + gdvVideoData.Rows(i).Cells(2).Text.ToString() + "</strong></h5>" + _
                                                            "</div> </div> </div>"

                    End If
                Next

                placeholderDiv.InnerHtml += "</div>"
            Else
                placeholderDiv.InnerHtml = "<h3 class=""page-header""> Category - Advanced </h3> <br />" + _
                    "<div class=""row"">"

                For i = 0 To gdvVideoData.Rows.Count - 1
                    If gdvVideoData.Rows(i).Cells(1).Text.ToString() = "Advanced" Then

                        placeholderDiv.InnerHtml += "<div class=""col-lg-4""> <div style=""height:325px;"" class=""panel panel-default""> <div class=""panel-body""> " + _
                                                                "<iframe height=""200"" src=""" + gdvVideoData.Rows(i).Cells(3).Text.ToString() + """ frameborder=""0""></iframe>" + _
                                                            "</div> <div class=""panel-footer"">" + _
                                                                "<h5><strong>" + gdvVideoData.Rows(i).Cells(2).Text.ToString() + "</strong></h5>" + _
                                                            "</div> </div> </div>"

                    End If
                Next

                placeholderDiv.InnerHtml += "</div>"
            End If

        End If
    End Sub
End Class

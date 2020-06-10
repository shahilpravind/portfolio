Imports System.Data
Imports System.Data.OleDb


Partial Class Login
    Inherits System.Web.UI.Page

    Protected Sub btnSend_Click(sender As Object, e As System.EventArgs) Handles btnSend.Click
        alertSuccess.Visible = False
        alertFailed.Visible = False

        Dim loginSuccessful As Boolean = False

        For i = 0 To gdvLogin.Rows.Count - 1
            If gdvLogin.Rows(i).Cells(1).Text.ToString() = iptUsername.Text() And gdvLogin.Rows(i).Cells(3).Text.ToString() = iptPassword.Text() Then
                loginSuccessful = True
                alertSuccess.Visible = True
                Response.AddHeader("REFRESH", "3;URL=Home.aspx")
            End If
        Next

        If (Not loginSuccessful) Then
            alertFailed.Visible = True
        End If
    End Sub

    Protected Sub btnClear_Click(sender As Object, e As System.EventArgs) Handles btnClear.Click
        iptUsername.Text = ""
        iptPassword.Text = ""
    End Sub
End Class

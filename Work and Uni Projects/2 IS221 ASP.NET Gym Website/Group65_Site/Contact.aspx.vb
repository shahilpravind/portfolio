
Partial Class Contact
    Inherits System.Web.UI.Page

    Protected Sub btnClear_Click(sender As Object, e As System.EventArgs) Handles btnClear.Click
        iptTitle.Text = ""
        txaMessage.Value = ""
    End Sub

    Protected Sub btnSend_Click(sender As Object, e As System.EventArgs) Handles btnSend.Click
        alertSuccess.Visible = True
    End Sub

    Protected Sub Page_Load(sender As Object, e As System.EventArgs) Handles Me.Load
        alertSuccess.Visible = False
    End Sub
End Class

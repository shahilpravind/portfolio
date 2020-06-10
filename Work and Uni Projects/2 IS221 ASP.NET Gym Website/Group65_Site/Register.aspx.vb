
Partial Class Register
    Inherits System.Web.UI.Page

    Protected Sub btnSend_Click(sender As Object, e As System.EventArgs) Handles btnSend.Click
        adsRegister.InsertParameters("USER_ID").DefaultValue = 5
        adsRegister.InsertParameters("USER_NAME").DefaultValue = iptUsername.Text
        adsRegister.InsertParameters("USER_EMAIL").DefaultValue = iptEmail.Text
        adsRegister.InsertParameters("USER_PASSWORD").DefaultValue = iptPassword.Text
        adsRegister.InsertParameters("USER_ROLE").DefaultValue = "User"
        adsRegister.Insert()

        alertSuccess.Visible = True
    End Sub

    Protected Sub btnClear_Click(sender As Object, e As System.EventArgs) Handles btnClear.Click
        iptUsername.Text = ""
        iptFname.Text = ""
        iptLName.Text = ""
        iptEmail.Text = ""
        iptTown.Text = ""
        iptPassword.Text = ""
        iptPassword2.Text = ""
    End Sub

    Protected Sub adsRegister_Selecting(sender As Object, e As System.Web.UI.WebControls.SqlDataSourceSelectingEventArgs) Handles adsRegister.Selecting

    End Sub
End Class

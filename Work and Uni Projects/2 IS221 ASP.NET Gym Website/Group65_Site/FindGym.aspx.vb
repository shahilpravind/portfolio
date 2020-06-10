
Partial Class FindGym
    Inherits System.Web.UI.Page

    Protected Sub btnSearch_Click(sender As Object, e As System.EventArgs) Handles btnSearch.Click
        If radSuva.Checked Then
            imgMap.ImageUrl = "~/Images/Location/suva.png"
        ElseIf radSigatoka.Checked Then
            imgMap.ImageUrl = "~/Images/Location/sigatoka.png"
        ElseIf radNadi.Checked Then
            imgMap.ImageUrl = "~/Images/Location/nadi.png"
        ElseIf radLautoka.Checked Then
            imgMap.ImageUrl = "~/Images/Location/lautoka.png"
        ElseIf radBa.Checked Then
            imgMap.ImageUrl = "~/Images/Location/ba.png"
        ElseIf radTavua.Checked Then
            imgMap.ImageUrl = "~/Images/Location/tavua.png"
        End If
    End Sub
End Class

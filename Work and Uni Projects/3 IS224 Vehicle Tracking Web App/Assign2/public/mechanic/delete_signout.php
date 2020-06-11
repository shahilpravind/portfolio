<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php"); ?>

<?php require("../../includes/classes/SignOut.php") ?>


<?php
    $signoutManager = new Sign_Out();

    $signout_num = $_GET['signout_num'];
    $signout = $signoutManager->get_signout_data($signout_num);
    
    if (!$signout) 
    {
        // vehicle not in database
        redirect_to("view_signout.php");
    }

    $result = $signoutManager->delete_signout($_GET["signout_num"]);

    if ($result)
    {
        // Success
        $_SESSION["message"] = "SignOut deleted.";
        redirect_to("view_signout.php");
    } 
    else 
    {
        // Failure
        $_SESSION["message"] = "SignOut could not be deleted.";
        redirect_to("view_signout.php");
    }
  
?>

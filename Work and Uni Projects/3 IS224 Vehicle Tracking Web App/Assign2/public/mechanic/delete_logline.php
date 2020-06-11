<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php"); ?>

<?php require("../../includes/classes/LogLine.php") ?>


<?php
    $loglineManager = new Log_Line();

    $log_num = $_GET['log_num'];
	$logline_num = $_GET['logline_num'];
    $logline = $loglineManager->get_logline_data($log_num,$logline_num);
    
    if (!$logline) 
    {
        // vehicle not in database
        redirect_to("view_logline.php");
    }

    $result = $loglineManager->delete_logline($_GET["log_num"], $_GET["log_num"]);

    if ($result)
    {
        // Success
        $_SESSION["message"] = "LogLine deleted.";
        redirect_to("view_logline.php");
    } 
    else 
    {
        // Failure
        $_SESSION["message"] = "Logline could not be deleted.";
        redirect_to("view_logline.php");
    }
  
?>

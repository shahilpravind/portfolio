<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php"); ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require("../../includes/classes/MaintainLog.php") ?>


<?php
    $logManager = new MaintainLog();

    $log_num = $_GET['log_num'];
    $mlog = $logManager->get_log_data($log_num);
    
    if (!$mlog) 
    {
        // vehicle not in database
        redirect_to("view_maintain_log.php");
    }

    $result = $logManager->delete_log($_GET["log_num"]);

    if ($result)
    {
        // Success
        $_SESSION["message"] = "Maintenance log deleted.";
        redirect_to("view_maintain_log.php");
    } 
    else 
    {
        // Failure
        $_SESSION["message"] = "Maintenance log could not be deleted.";
        redirect_to("view_maintain_log.php");
    }
  
?>

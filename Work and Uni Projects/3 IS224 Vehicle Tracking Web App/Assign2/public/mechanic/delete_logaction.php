<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php"); ?>

<?php require("../../includes/classes/LogAction.php") ?>


<?php
    $logactionManager = new Log_Action();

    $logact_num = $_GET['logact_num'];
    $logaction = $logactionManager->get_logaction_data($logact_num);
    
    if (!$logaction) 
    {
        // logaction not in database
        redirect_to("view_logactions.php");
    }

    $result = $logactionManager->delete_logaction($_GET["logact_num"]);

    if ($result)
    {
        // Success
        $_SESSION["message"] = "logaction deleted.";
        redirect_to("view_logactions.php");
    } 
    else 
    {
        // Failure
        $_SESSION["message"] = "logaction could not be deleted.";
        redirect_to("view_logactions.php");
    }
  
?>

<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php") ?>

<?php require("../../includes/classes/LogAction.php") ?>


<?php

    if (isset($_POST['submit']))
    {
        global $dbconn;
        $logactionManager = new Log_Action();

        $required_fields = array("logact_num", "log_num", "emp_id", "logaction_date", "logaction_type", "logline_date");
        validate_presences($required_fields);

        if (empty($errors))
        {
            $logact_num = $_POST["logact_num"];
			$log_num = $_POST["log_num"];
			$emp_id = $_POST["emp_id"];
            $logact_type = $_POST["logact_type"];
            $logact_date = $_POST["logact_date"];
			

            $result = $logactionManager->update_logaction($logact_num, $logact_type, $logact_date);

            if ($result) 
            {
                // Success
                $_SESSION["message"] = "Log action updated.";
                redirect_to("view_logaction.php");
            }
            else
            {
                // Failure
                $message = "Page update failed.";
            }
        }
    }
    else
    {
        redirect_to("view_logaction.php");
    }
?>


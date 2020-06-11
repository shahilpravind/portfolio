<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php") ?>

<?php require("../../includes/classes/LogAction.php") ?>


<?php

    if (isset($_POST['submit']))
    {
        global $dbconn;
        $LogActionManager = new LogAction();

        $required_fields = array("logact_num", "log_num", "emp_id", "logact_type", "logact_date");
        validate_presences($required_fields);

        if (empty($errors))
        {
            $logact_num = $_POST["logact_num"];
            $log_num = $_POST["log_num"];
            $emp_id = $_POST["emp_id"];
            $logact_type = $_POST["logact_type"];
            $logact_date = $_POST["logact_date"];

            $result = $LogActionManager->update_log_action($logact_num, $log_num, $emp_id, $logact_type, $logact_date);

            if ($result) 
            {
                // Success
                $_SESSION["message"] = "Maintenance log action updated.";
                redirect_to("view_log_action.php");
            }
            else
            {
                // Failure
                $message = "Maintenance log action update failed.";
            }
        }
    }
    else
    {
        redirect_to("view_log_action.php");
    }

?>

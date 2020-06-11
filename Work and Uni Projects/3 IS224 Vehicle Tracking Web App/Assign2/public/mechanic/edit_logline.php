<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php") ?>

<?php require("../../includes/classes/LogLine.php") ?>


<?php

    if (isset($_POST['submit']))
    {
        global $dbconn;
        $loglineManager = new Log_Line();

        $required_fields = array("log_num", "logline_num", "emp_id", "logline_date", "logline_time", "logline_action", "logline_units");
        validate_presences($required_fields);

        if (empty($errors))
        {
            $log_num = $_POST["log_num"];
            $logline_num = $_POST["logline_num"];
			$emp_id = $_POST["emp_id"];
            $logline_date = $_POST["logline_date"];
            $logline_time = $_POST["logline_time"];
			$logline_action = $_POST["logline_action"];
			$logline_units = $_POST["logline_units"];

            $result = $loglineManager->update_logline($log_num, $logline_num, $emp_id, $logline_date, $logline_time, $logline_action, $logline_units);

            if ($result) 
            {
                // Success
                $_SESSION["message"] = "LogLine updated.";
                redirect_to("view_logline.php");
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
        redirect_to("view_logline.php");
    }

?>
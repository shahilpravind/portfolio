<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php require("../../includes/classes/LogLine.php") ?>


<?php

    $loglineManager = new Log_Line();

    if (($_POST["submit"]))
    {
        global $dbconn;

        // get form data
        $log_num = $dbconn->mysql_prep($_POST["log_num"]);
        $logline_num = $_POST["logline_num"];
        $emp_id =  $_POST["emp_id"];
        $logline_date = $_POST["logline_date"];
		$logline_time = $_POST["logline_time"];
		$logline_action = $_POST["logline_action"];
		$logline_units = $_POST["logline_units"];

        // validation
        $required_fields = array("logline_num", "log_num", "emp_id", "logline_date", "logline_time", "logline_action", "logline_units");
        validate_presences($required_fields);

        //validate_veh_num($veh_num);

        if (!empty($errors))
        {
            $_SESSION['errors'] = $errors;
            redirect_to("form_add_logline.php");
        }

        $result = $loglineManager->add_logline($logline_num, $log_num, $emp_id, $logline_date, $logline_time, $logline_action, $logline_units);

        if ($result)
        {
            // Success
            $_SESSION['message'] = "Log line added successfully.";
            redirect_to("view_logline.php");
        }
        else
        {
            // Failure
            $_SESSION['message'] = "Log line could not be added.";
            redirect_to("form_add_logline.php");
        }
    }
    else
    {
        // Adding a vehicle is a post request
        redirect_to("form_add_logline.php");
    }

?>


<?php
    if (isset($dbconn))
    {
        $dbconn->db_disconnect();
    }
?>

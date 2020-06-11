<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php require("../../includes/classes/LogAction.php") ?>


<?php

    $logactionManager = new LogAction();

    if (($_POST["submit"]))
    {
        global $dbconn;

        // get form data
        $logact_num = $dbconn->mysql_prep($_POST["locact_num"]);
        $log_num = $_POST["log_num"];
        $emp_id =  $_POST["emp_id"];
        $logact_type = $_POST["logact_type"];
		$logact_date = $_POST["logact_date"];

        // validation
        $required_fields = array("logact_num", "log_num", "emp_id", "logact_type", "logact_date");
        validate_presences($required_fields);

        //validate_veh_num($veh_num);

        if (!empty($errors))
        {
            $_SESSION['errors'] = $errors;
            redirect_to("form_add_logaction.php");
        }

        $result = $logactionManager->add_logaction(logact_num, log_num, emp_id, logact_type, logact_date);

        if ($result)
        {
            // Success
            $_SESSION['message'] = "Log action data added successfully.";
            redirect_to("view_logaction.php");
        }
        else
        {
            // Failure
            $_SESSION['message'] = "Log action table could not be added.";
            redirect_to("form_add_logaction.php");
        }
    }
    else
    {
        // Adding a vehicle is a post request
        redirect_to("form_add_logaction.php");
    }

?>


<?php
    if (isset($dbconn))
    {
        $dbconn->db_disconnect();
    }
?>

<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require("../../includes/classes/LogAction.php") ?>


<?php

    $logActionManager = new LogAction();

    if (($_POST["submit"]))
    {
        global $dbconn;

        // get form data
        $logact_num = $dbconn->mysql_prep($_POST["logact_num"]);
        $log_num = $dbconn->mysql_prep($_POST["log_num"]);
        $emp_id = $dbconn->mysql_prep($_POST["emp_id"]);
        $log_type = $dbconn->mysql_prep($_POST["log_type"]);
        $log_date = $dbconn->mysql_prep($_POST["log_date"]);

        // validation
        $required_fields = array("logact_num", "log_num", "emp_id", "logact_type", "logact_date");
        validate_presences($required_fields);

        if (!empty($errors))
        {
            $_SESSION['errors'] = $errors;
            redirect_to("form_add_log_action.php");
        }

        $result = $logActionManager->add_log_action($logact_num, $log_num, $emp_id, $logact_type, $logact_date);

        if ($result)
        {
            // Success
            $_SESSION['message'] = "Maintenance log action added successfully.";
            redirect_to("view_log_action.php");
        }
        else
        {
            // Failure
            $_SESSION['message'] = "Maintenance log action could not be added.";
            redirect_to("form_add_log_action.php");
        }
    }
    else
    {
        redirect_to("form_add_log_action.php");
    }

?>


<?php
    if (isset($dbconn))
    {
        $dbconn->db_disconnect();
    }
?>

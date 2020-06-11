<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require("../../includes/classes/MaintainLog.php") ?>


<?php

    $logManager = new MaintainLog();

    if (($_POST["submit"]))
    {
        global $dbconn;

        // get form data
        $log_num = $dbconn->mysql_prep($_POST["log_num"]);
        $veh_num = $dbconn->mysql_prep($_POST["veh_num"]);
        $log_date = $dbconn->mysql_prep($_POST["log_date"]);
        $log_complaint = $dbconn->mysql_prep($_POST["log_complaint"]);

        // validation
        $required_fields = array("log_num", "veh_num", "log_date", "log_complaint");
        validate_presences($required_fields);

        if (!empty($errors))
        {
            $_SESSION['errors'] = $errors;
            redirect_to("form_add_log.php");
        }

        $result = $logManager->add_log($log_num, $veh_num, $log_date, $log_complaint);

        if ($result)
        {
            // Success
            $_SESSION['message'] = "Maintenance log added successfully.";
            redirect_to("view_maintain_log.php");
        }
        else
        {
            // Failure
            $_SESSION['message'] = "Maintenance log could not be added.";
            redirect_to("form_add_log.php");
        }
    }
    else
    {
        redirect_to("form_add_log.php");
    }

?>


<?php
    if (isset($dbconn))
    {
        $dbconn->db_disconnect();
    }
?>

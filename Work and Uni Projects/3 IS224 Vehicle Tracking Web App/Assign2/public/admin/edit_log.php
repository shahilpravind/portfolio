<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php") ?>

<?php require("../../includes/classes/MaintainLog.php") ?>


<?php

    if (isset($_POST['submit']))
    {
        global $dbconn;
        $logManager = new MaintainLog();

        $required_fields = array("log_num", "veh_num", "log_date", "log_complaint");
        validate_presences($required_fields);

        if (empty($errors))
        {
            $log_num = $_POST["log_num"];
            $veh_num = $_POST["veh_num"];
            $log_date = $_POST["log_date"];
            $log_complaint = $_POST["log_complaint"];

            $result = $logManager->update_log($log_num, $veh_num, $log_date, $log_complaint);

            if ($result) 
            {
                // Success
                $_SESSION["message"] = "Maintenance log updated.";
                redirect_to("view_maintain_log.php");
            }
            else
            {
                // Failure
                $message = "Maintenance log update failed.";
            }
        }
    }
    else
    {
        redirect_to("view_maintain_log.php");
    }

?>

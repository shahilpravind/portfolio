<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php") ?>

<?php require("../../includes/classes/SignOut.php") ?>


<?php

    if (isset($_POST['submit']))
    {
        global $dbconn;
        $signoutManager= new Sign_Out();

        $required_fields = array("signout_num", "emp_id", "part_code", "log_num", "signout_date", "signout_units");
        validate_presences($required_fields);

        if (empty($errors))
        {
            $signout_num = $_POST["signout_num"];
			$emp_id = $_POST["emp_id"];
			$log_num = $_POST["log_num"];
			$part_code = $_POST["part_code"];
            $signout_date = $_POST["signout_date"];
            $signout_units = $_POST["signout_units"];
			

            $result = $signoutManager->update_signout($signout_num, $signout_date, $signout_units);

            if ($result) 
            {
                // Success
                $_SESSION["message"] = "LogAction updated.";
                redirect_to("view_signout.php");
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
        redirect_to("view_signout.php");
    }
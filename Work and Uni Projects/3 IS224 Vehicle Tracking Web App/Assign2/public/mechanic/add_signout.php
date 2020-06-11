<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php require_once("../../includes/classes/SignOut.php") ?>


<?php

    $signoutManager = new Sign_Out();

    if (($_POST["submit"]))
    {
        global $dbconn;

        // get form data
        $signout_num = $dbconn->mysql_prep($_POST["signout_num"]);
        $emp_id= $_POST["emp_id"];
        $part_code = $_POST["part_code"];
        $log_num = $_POST["log_num"];
		$signout_date = $_POST["signout_date"];
		$signout_units = $_POST["signout_units"];

        // validation
        $required_fields = array("signout_num", "emp_id", "part_code", "log_num", "signout_date","signout_units");
        validate_presences($required_fields);

        //validate_veh_num($signout_num);

        if (!empty($errors))
        {
            $_SESSION['errors'] = $errors;
            redirect_to("form_add_signout.php");
        }

        $result = $signoutManager->add_sign_out(signout_num, emp_id, part_code, log_num, signout_date, signout_units);

        if ($result)
        {
            // Success
            $_SESSION['message'] = "signout added successfully.";
            redirect_to("view_signout.php");
        }
        else
        {
            // Failure
            $_SESSION['message'] = "signout could not be added.";
            redirect_to("form_add_signout.php");
        }
    }
    else
    {
        // Adding a vehicle is a post request
        redirect_to("form_add_signout.php");
    }

?>


<?php
    if (isset($dbconn))
    {
        $dbconn->db_disconnect();
    }
?>

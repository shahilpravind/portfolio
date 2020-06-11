<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/classes/Mechanic.php") ?>


<?php

    $mechanicManager = new Mechanic();

    if (($_POST["submit"]))
    {
        global $dbconn;

        // get form data
        $emp_id = $dbconn->mysql_prep($_POST["emp_id"]);
        $mech_inspect = $_POST["mech_inspect"];
        $mech_date_chk = (double) $_POST["mech_date_chk"];

        // validation
        $required_fields = array("emp_id", "mech_inspect", "mech_date_chk");
        validate_presences($required_fields);

        if (!empty($errors))
        {
            $_SESSION['errors'] = $errors;
            redirect_to("form_add_mechanic.php");
        }

        $result = $mechanicManager->add_mechanic($emp_id, $mech_inspect, $mech_date_chk);

        if ($result)
        {
            // Success
            $_SESSION['message'] = "Mechanic added successfully.";
            redirect_to("view_mechanics.php");
        }
        else
        {
            // Failure
            $_SESSION['message'] = "Mechanic could not be added.";
            redirect_to("form_add_mechanic.php");
        }
    }
    else
    {
        // Adding a mechanic is a post request
        redirect_to("form_add_mechanic.php");
    }

?>


<?php
    if (isset($dbconn))
    {
        $dbconn->db_disconnect();
    }
?>

<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php") ?>

<?php require_once("../../includes/classes/Mechanic.php") ?>


<?php

    if (isset($_POST['submit']))
    {
        global $dbconn;
        $mechanicManager = new Mechanic();

        $required_fields = array("emp_id", "mech_inspect", "mech_date_chk");
        validate_presences($required_fields);

        if (empty($errors))
        {
            $emp_id = $_POST["emp_id"];
            $mech_inspect = $_POST["mech_inspect"];
            $mech_date_chk = $_POST["mech_date_chk"];

            $result = $mechanicManager->update_mechanic($emp_id, $mech_inspect, $mech_date_chk);

            if ($result) 
            {
                // Success
                $_SESSION["message"] = "Mechanic updated.";
                redirect_to("view_mechanics.php");
            }
            else
            {
                // Failure
                $message = "Mechanic update filed.";
            }
        }
    }
    else
    {
        redirect_to("view_mechanics.php");
    }

?>

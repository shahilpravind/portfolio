<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/classes/Vehicle.php") ?>


<?php

    $vehicleManager = new Vehicle();

    if (($_POST["submit"]))
    {
        global $dbconn;

        // get form data
        $veh_num = $dbconn->mysql_prep($_POST["veh_num"]);
        $veh_desc = $_POST["veh_desc"];
        $veh_miles = (double) $_POST["veh_miles"];
        $veh_avail = $_POST["veh_avail"];

        // validation
        $required_fields = array("veh_num", "veh_desc", "veh_miles", "veh_avail");
        validate_presences($required_fields);

        validate_veh_num($veh_num);

        if (!empty($errors))
        {
            $_SESSION['errors'] = $errors;
            redirect_to("form_add_vehicle.php");
        }

        $result = $vehicleManager->add_vehicle($veh_num, $veh_desc, $veh_miles, $veh_avail);

        if ($result)
        {
            // Success
            $_SESSION['message'] = "Vehicle added successfully.";
            redirect_to("view_vehicles.php");
        }
        else
        {
            // Failure
            $_SESSION['message'] = "Vehicle could not be added.";
            redirect_to("form_add_vehicle.php");
        }
    }
    else
    {
        // Adding a vehicle is a post request
        redirect_to("form_add_vehicle.php");
    }

?>


<?php
    if (isset($dbconn))
    {
        $dbconn->db_disconnect();
    }
?>

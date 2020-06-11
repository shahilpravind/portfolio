<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php") ?>

<?php require_once("../../includes/classes/Vehicle.php") ?>


<?php

    if (isset($_POST['submit']))
    {
        global $dbconn;
        $vehicleManager = new Vehicle();

        $required_fields = array("veh_num", "veh_desc", "veh_miles", "veh_avail");
        validate_presences($required_fields);

        if (empty($errors))
        {
            $veh_num = $_POST["veh_num"];
            $veh_desc = $_POST["veh_desc"];
            $veh_miles = (double) $_POST["veh_miles"];
            $veh_avail = $_POST["veh_avail"];

            $result = $vehicleManager->update_vehicle($veh_num, $veh_desc, $veh_miles, $veh_avail);

            if ($result) 
            {
                // Success
                $_SESSION["message"] = "Vehicle updated.";
                redirect_to("view_vehicles.php");
            }
            else
            {
                // Failure
                $message = "Vehicle update failed.";
            }
        }
    }
    else
    {
        redirect_to("view_vehicles.php");
    }

?>

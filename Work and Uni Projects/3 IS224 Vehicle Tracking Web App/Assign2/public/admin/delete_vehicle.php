<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php"); ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/classes/Vehicle.php") ?>


<?php
    $vehicleManager = new Vehicle();

    $veh_num = $_GET['veh_num'];
    $vehicle = $vehicleManager->get_vehicle_data($veh_num);
    
    if (!$vehicle) 
    {
        // vehicle not in database
        redirect_to("view_vehicles.php");
    }

    $result = $vehicleManager->delete_vehicle($_GET["veh_num"]);

    if ($result)
    {
        // Success
        $_SESSION["message"] = "Vehicle deleted.";
        redirect_to("view_vehicles.php");
    } 
    else 
    {
        // Failure
        $_SESSION["message"] = "Vehicle could not be deleted.";
        redirect_to("view_vehicles.php");
    }
  
?>

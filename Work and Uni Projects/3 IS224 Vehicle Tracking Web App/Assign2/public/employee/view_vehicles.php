<?php require_once("../../includes/session.php") ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/classes/Vehicle.php") ?>

<?php include("../../includes/layouts/header_employee.php") ?>


<?php
    $vehicleManager = new Vehicle();

    if (isset($_GET['search']) && !empty($_GET['search_term']))
        $vehicle_set = $vehicleManager->search_vehicle($_GET['search_term']);
    else
        $vehicle_set = $vehicleManager->get_available_vehicles();

    $report = "";

    if (!empty($vehicle_set))
    {
        $report = "<table class=\"table table-bordered table-striped\">";
        $report .= "<thead>";
        $report .= "<th style=\"text-align: center;\"> Vehicle Number </th>";
        $report .= "<th style=\"text-align: center;\"> Vehicle Description </th>";
        $report .= "<th style=\"text-align: center;\"> Vehicle Miles </th>";
        $report .= "</thead>";

        $report .= "<tbody>";
        while ($vehicle = mysqli_fetch_assoc($vehicle_set))
        {
            $report .= "<tr>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($vehicle['veh_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($vehicle['veh_description']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($vehicle['veh_miles']) . "</td>";

            $report .= "</tr>";
        }
        $report .= "</tbody>";

        mysqli_free_result($vehicle_set);

        $report .= "</table>";
    }
    else
    {
        $report = "No available vehicles found";
    }

?>


<div id="main">
    <h1> Available Vehicles </h1>
    <hr /> <br />

    <?php echo $report; ?>
</div>


<?php include("../../includes/layouts/footer.php") ?>

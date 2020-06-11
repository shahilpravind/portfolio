<?php require_once("../../includes/session.php") ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/classes/Vehicle.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>


<?php
    $vehicleManager = new Vehicle();

    if (isset($_GET['btnSearch']) && !empty($_GET['veh_search']))
        $vehicle_set = $vehicleManager->search_vehicle($_GET['veh_search']);
    else
        $vehicle_set = $vehicleManager->get_vehicle_data();

    $report = "";

    if (!empty($vehicle_set))
    {
        $report = "<table class=\"table table-bordered table-striped\">";
        $report .= "<thead>";
        $report .= "<th style=\"text-align: center;\"> Vehicle Number </th>";
        $report .= "<th style=\"text-align: center;\"> Vehicle Description </th>";
        $report .= "<th style=\"text-align: center;\"> Vehicle Miles </th>";
        $report .= "<th style=\"text-align: center;\"> Vehicle Available </th>";
        $report .= "</thead>";

        while ($vehicle = mysqli_fetch_assoc($vehicle_set))
        {
            $report .= "<tr>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($vehicle['veh_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($vehicle['veh_description']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($vehicle['veh_miles']) . "</td>";
            
            $report .= "<td style=\"text-align: center;\"> ";
            $report .= ($vehicle['veh_available'] == 'Y') ? "Yes" : "No";
            $report .= "</td>";

            $report .= "</tr>";
        }

        mysqli_free_result($vehicle_set);

        $report .= "</table>";
    }
    else
    {
        $report = "No vehicles found";
    }

?>


<div id="main">

    <form name="VehicleSearch" action="view_vehicles.php" method="get">
        <div class="input-group" style="width:50%; margin:auto;">
            <input type="text" class="form-control" name="veh_search" placeholder="Search vehicle..." />

            <span class="input-group-btn">
                <button type="submit" class="btn btn-default" name="btnSearch" value="Submit"><span class="glyphicon glyphicon-search"></span></button></div>
            </span>
        </div>
    </form>
    <br />

    <h1 class="page-header"> Vehicle Report </h1>
    <br />

    <?php echo $report; ?>
</div>


<?php include("../../includes/layouts/footer.php") ?>

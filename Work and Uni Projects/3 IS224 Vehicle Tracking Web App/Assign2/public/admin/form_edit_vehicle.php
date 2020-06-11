<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php require("../../includes/classes/Vehicle.php"); ?>


<?php
    $vehicleManager = new Vehicle();
    $current_vehicle = NULL;

    if (isset($_GET['vn'])) 
    {
        $current_vehicle = $vehicleManager->get_vehicle_data($_GET['vn']);
        $current_vehicle = mysqli_fetch_assoc($current_vehicle);
    }

    if (!$current_vehicle) 
        redirect_to("view_vehicles.php");
?>


<?php include("../../includes/layouts/header_admin.php") ?>


<div id="main">
    <?php
        if (!empty($message)) 
        {
            if (!empty($message)) 
            {
                echo "<div class=\"message\">" . htmlentities($message) . "</div>";
            }
        }
    ?>

    <?php echo form_errors($errors); ?>

    <h1> Edit Vehicle: <?php echo $_GET['vn']; ?> </h1>

    <form action="edit_vehicle.php" method="post">
        <p> Vehicle Number:
            <input type="text" name="veh_num" value="<?php echo htmlentities($current_vehicle['veh_num']); ?>" readonly />
        </p>

        <p> Vehicle Description:
            <select name="veh_desc">
                <option value="Sedan"> Sedan </option>
                <option value="Station Wagon"> Station Wagon </option>
                <option value="Panel Truck"> Panel Truck </option>
                <option value="Minivan"> Minivan </option>
                <option value="Minibus"> Minibus </option>
            </select>
        </p>

        <p> Vehicle Miles:
            <input type="number" name="veh_miles" min="0" step="0.001" value="<?php echo $current_vehicle['veh_miles'] ?>" />
        </p>

        <p> Vehicle Available:
            <input type="radio" name="veh_avail" value="Y" <?php if ($current_vehicle['veh_available'] == "Y") echo "checked"; ?> /> Yes
            &nbsp
            <input type="radio" name="veh_avail" value="N" <?php if ($current_vehicle['veh_available'] == "N") echo "checked"; ?> /> No
        </p>

        <p> 
            <input type="submit" name="submit" value="Edit" />  

            <input type="button" onclick="location.href='view_vehicles.php';" value="Cancel" />
        </p>
    </form>
</div>


<?php include("../../includes/layouts/footer.php") ?>

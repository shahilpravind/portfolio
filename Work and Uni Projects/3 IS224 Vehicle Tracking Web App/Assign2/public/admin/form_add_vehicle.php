<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>


<div id="main">
    <h1 class="page-header"> Add a Vehicle </h1>

    <?php echo message(); ?>
    <?php $errors = errors(); ?>
    <?php echo form_errors($errors); ?>

    <form name="AddVehicle" class="form-horizontal" action="add_vehicle.php" method="post">

        <div class="form-group">
            <label class="control-label col-sm-2"> Vehicle Number: </label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="veh_num" value="" />
            </div>
        </div>
        
        <div class="form-group"> 
            <label class="control-label col-sm-2"> Vehicle Description: </label>

            <div class="col-sm-2">
                <select class="form-control" name="veh_desc">
                    <option value="Sedan"> Sedan </option>
                    <option value="Station Wagon"> Station Wagon </option>
                    <option value="Panel Truck"> Panel Truck </option>
                    <option value="Minivan"> Minivan </option>
                    <option value="Minibus"> Minibus </option>
                </select>
            </div>
        </div>

        <div class="form-group"> 
            <label class="control-label col-sm-2"> Vehicle Miles: </label>
            <div class="col-sm-2">
                <input type="number" class="form-control" name="veh_miles" min="0" step="0.001" />
            </div>
        </div>

        <div class="form-group"> 
            <label class="control-label col-sm-2"> Vehicle Available: </label>
            <div class="col-sm-2">
                <label class="radio-inline"> <input type="radio" name="veh_avail" value="Y" /> Yes </label>
                &nbsp
                <label class="radio-inline"> <input type="radio" name="veh_avail" value="N" /> No </label>
            <div class="col-sm-2">
        </div>

        <div class="form-group"> </div>
        <div class="form-group"> </div>
        <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Add" />
                <input type="reset" class="btn btn-success" value="Clear" />
                <input type="button" class="btn btn-default" onclick="location.href='view_vehicles.php';" value="Cancel" />
        </div>
    </form>
</div>

<?php include("../../includes/layouts/footer.php") ?>

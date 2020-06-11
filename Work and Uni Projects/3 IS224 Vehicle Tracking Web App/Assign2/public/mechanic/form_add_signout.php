<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>

<?php include("../../includes/layouts/header_mechanic.php") ?>

<div id="main">
    <h1> Add a Sign Out </h1>

    <?php echo message(); ?>
    <?php $errors = errors(); ?>
    <?php echo form_errors($errors); ?>

    <form name="AddVehicle" action="add_signout.php" method="post">
        <p> SignOut Number: 
            <input type="text" name="signout_num" value="" />
        </p>
        
        <p> Emp ID:
            <input type="text" name="emp_id"  />
        </p>

        <p> Part Code:
            <input type="text" name="part_code" value="" />
        </p>

        <p> Log Number:
            <input type="text" name="log_num" value="" />
        </p>
		
		<p> SignOut Date:
            <input type="text" name="signout_date" value="" />
        </p>
		
		<p> SignOut Units:
            <input type="text" name="signout_units" value="" />
        </p>
		
        <p> 
            <input type="submit" name="submit" value="Add SignOut" /> 

            <input type="reset" value="Clear" /> 

            <input type="button" onclick="location.href='view_vehicles.php';" value="Cancel" />
        </p>
    </form>
</div>

<?php include("../../includes/layouts/footer.php") ?>

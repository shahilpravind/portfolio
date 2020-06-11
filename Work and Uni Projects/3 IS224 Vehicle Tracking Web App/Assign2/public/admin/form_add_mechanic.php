<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>


<div id="main">
    <h3> Add a Mechanic </h3>

    <?php echo message(); ?>
    <?php $errors = errors(); ?>
    <?php echo form_errors($errors); ?>

    <form name="AddMechanic" action="add_mechanic.php" method="post">
        <p> Mechanic Employee Number: 
            <input type="text" name="emp_id" value="" />
        </p>

        <p> Authorised for Inspection:
            <input type="radio" name="mech_inspect" value="Y" /> Yes
            &nbsp
            <input type="radio" name="mech_inspect" value="N" /> No
        </p>

        <p> Mechanic Date Check:
            <input type="date" name="mech_date_chk" />
        </p>

        <p> 
            <input type="submit" name="submit" value="Add" /> 

            <input type="reset" value="Clear" /> 

            <input type="button" onclick="location.href='view_mechanics.php';" value="Cancel" />
        </p>
    </form>
</div>

<?php include("../../includes/layouts/footer.php") ?>

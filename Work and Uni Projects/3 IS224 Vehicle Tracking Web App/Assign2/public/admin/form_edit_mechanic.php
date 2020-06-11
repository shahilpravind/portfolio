<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php require("../../includes/classes/Mechanic.php"); ?>


<?php
    $mechanicManager = new Mechanic();
    $current_mechanic = NULL;

    if (isset($_GET['eid'])) 
    {
        $current_mechanic = $mechanicManager->get_mechanic_data($_GET['eid']);
        $current_mechanic = mysqli_fetch_assoc($current_mechanic);
    }

    if (!$current_mechanic) 
        redirect_to("view_mechanics.php");
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

    <h1> Edit Mechanic: <?php echo $_GET['eid']; ?> </h1>

    <form action="edit_mechanic.php" method="post">
        <p> Mechanic Employee Number:
            <input type="text" name="emp_id" value="<?php echo htmlentities($current_mechanic['emp_id']); ?>" readonly />
        </p>

        <p> Authorised for Inspection:
            <input type="radio" name="mech_inspect" value="Y" <?php if ($current_mechanic['mech_inspect'] == "Y") echo "checked"; ?> /> Yes
            &nbsp
            <input type="radio" name="mech_inspect" value="N" <?php if ($current_mechanic['mech_inspect'] == "N") echo "checked"; ?> /> No
        </p>

        <p> Mechanic Date Check:
            <input type="date" name="mech_date_chk" value="<?php echo $current_mechanic['mech_date_chk'] ?>" />
        </p>

        <p> 
            <input type="submit" name="submit" value="Edit" />  

            <input type="button" onclick="location.href='view_mechanics.php';" value="Cancel" />
        </p>
    </form>
</div>


<?php include("../../includes/layouts/footer.php") ?>

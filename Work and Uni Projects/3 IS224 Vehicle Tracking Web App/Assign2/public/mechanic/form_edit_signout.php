<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/validation_functions.php"); ?>


<?php require("../../includes/classes/SignOut.php"); ?>

<?php
    $signoutManager = new Sign_Out();
    $current_signout = NULL;

    if (isset($_GET['son']) ) 
    {
        $current_signout = $signoutManager->get_signout_data($_GET['son']);
        $current_signout= mysqli_fetch_assoc($current_signout);
    }

    if (!$current_signout) 
        redirect_to("view_signout.php");
?>


<?php include("../../includes/layouts/header_mechanic.php") ?>


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

    <h1> Edit SignOut: <?php echo $_GET['son'] ; ?> </h1>

    <form action="edit_signout.php" method="post">
	
        <p> SignOut Number:
            <input type="text" name="signout_num" value="<?php echo htmlentities($current_signout['sign_num']); ?>" readonly />
        </p>
		<p> Employee ID:
            <input type="text" name="emp_id" value="<?php echo htmlentities($current_signout['emp_id']); ?>" readonly />
        </p>

        <p>  Part Code:
             <input type="text" name="part_code" value="<?php echo htmlentities($current_signout['part_code']); ?>" readonly  />
        </p>

        <p> Log Number:
            <input type="text" name="log_num"  value="<?php echo ($current_signout['log_num']); ?>" readonly />
        </p>

        <p> SignOut Date:
             <input type="text" name="signout_date" value="<?php echo htmlentities($current_signout['signout_date']); ?>" />
        </p>
		
        <p> SignOut Units:
             <input type="number" name="signout_units" value="<?php echo htmlentities($current_signout['signout_units']); ?>" />
        </p>
		
        <p> 
            <input type="submit" name="submit" value="Edit" />  

            <input type="button" onclick="location.href='view_signout.php';" value="Cancel" />
        </p>
		
    </form>
</div>


<?php include("../../includes/layouts/footer.php") ?>
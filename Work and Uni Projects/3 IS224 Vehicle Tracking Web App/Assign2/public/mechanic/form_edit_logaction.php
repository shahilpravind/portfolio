<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/validation_functions.php"); ?>


<?php require("../../includes/classes/LogAction.php"); ?>

<?php
    $logactionManager = new Log_Action();
    $current_logaction = NULL;

    if (isset($_GET['lac']) ) 
    {
        $current_logaction = $logactionManager->get_logaction_data($_GET['lac']);
        $current_logaction= mysqli_fetch_assoc($current_logaction);
    }

    if (!$current_logaction) 
        redirect_to("view_logaction.php");
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

    <h1> Edit LogAction: <?php echo $_GET['lac'] ; ?> </h1>

    <form action="edit_logaction.php" method="post">
	
        <p> LogAction Number:
            <input type="text" name="logact_num" value="<?php echo htmlentities($current_logaction['logact_num']); ?>" readonly />
        </p>
		<p> Log Number:
            <input type="text" name="log_num" value="<?php echo htmlentities($current_logaction['log_num']); ?>" readonly />
        </p>

        <p> Employee ID:
             <input type="text" name="emp_id" value="<?php echo htmlentities($current_logaction['emp_id']); ?>" readonly  />
        </p>

        <p> LogAction Type:
            <input type="date" name="logact_type"  value="<?php echo ($current_logaction['logact_type']); ?>" />
        </p>

        <p> LogAction Date:
             <input type="text" name="logact_date" value="<?php echo htmlentities($current_logaction['logact_date']); ?>" />
        </p>
		
        <p> 
            <input type="submit" name="submit" value="Edit" />  

            <input type="button" onclick="location.href='view_logaction.php';" value="Cancel" />
        </p>
		
    </form>
</div>


<?php include("../../includes/layouts/footer.php") ?>

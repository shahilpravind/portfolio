<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php require("../../includes/classes/LogActionManager.php"); ?>


<?php
    $logActionManager = new LogActionManager();
    $current_log = NULL;

    if (isset($_GET['logact_num'])) 
    {
        $current_log = $logActionManager->get_log_action_data($_GET['logact_num']);
        $current_log = mysqli_fetch_assoc($current_log);
    }

    if (!$current_log) 
        redirect_to("view_log_action.php");
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

    <h1> Edit Maintenance Log Action: <?php echo $_GET['logact_num']; ?> </h1>

    <form action="edit_log_action.php" method="post">
        <p> Log Action Number:
            <input type="text" name="logact_num" value="<?php echo htmlentities($current_log['logact_num']); ?>" readonly />
        </p>

        <p> Log Number:
            <input type="text" name="log_num" value="<?php echo htmlentities($current_log['log_num']); ?>" readonly />
        </p>

        <p> Employee ID:
            <input type="text" name="emp_id" value="<?php echo $current_log['emp_id'] ?>" />
        </p>

        <p> Log Action Type:
            <input type="text" name="logact_type" value="<?php echo htmlentities($current_log['logact_type']); ?>" />
        </p>

        <p> Log Action Date:
            <input type="date" name="logact_date" value="<?php echo htmlentities($current_log['logact_date']); ?>" />
        </p>

        <p> 
            <input type="submit" name="submit" value="Edit" />  

            <input type="button" onclick="location.href='view_log_action.php';" value="Cancel" />
        </p>
    </form>
</div>


<?php include("../../includes/layouts/footer.php") ?>

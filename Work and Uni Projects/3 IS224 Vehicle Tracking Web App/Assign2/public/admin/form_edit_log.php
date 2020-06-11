<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php require("../../includes/classes/MaintainLog.php"); ?>


<?php
    $logManager = new MaintainLog();
    $current_log = NULL;

    if (isset($_GET['log_num'])) 
    {
        $current_log = $logManager->get_log_data($_GET['log_num']);
        $current_log = mysqli_fetch_assoc($current_log);
    }

    if (!$current_log) 
        redirect_to("view_maintain_log.php");
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

    <h1> Edit Maintenance Log: <?php echo $_GET['log_num']; ?> </h1>

    <form action="edit_log.php" method="post">
        <p> Log Number:
            <input type="text" name="log_num" value="<?php echo htmlentities($current_log['log_num']); ?>" readonly />
        </p>

        <p> Vehicle Number:
            <input type="text" name="veh_num" value="<?php echo htmlentities($current_log['veh_num']); ?>" readonly />
        </p>

        <p> Log Date:
            <input type="date" name="log_date" value="<?php echo $current_log['log_date'] ?>" />
        </p>

        <p> Log Complaint:
            <input type="text" name="log_complaint" value="<?php echo htmlentities($current_log['log_complaint']); ?>" />
        </p>

        <p> 
            <input type="submit" name="submit" value="Edit" />  

            <input type="button" onclick="location.href='view_maintain_log.php';" value="Cancel" />
        </p>
    </form>
</div>


<?php include("../../includes/layouts/footer.php") ?>

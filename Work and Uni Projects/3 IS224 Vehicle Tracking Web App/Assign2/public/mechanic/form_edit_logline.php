<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/validation_functions.php"); ?>


<?php require("../../includes/classes/LogLine.php"); ?>

<?php
    $loglineManager = new Log_Line();
    $current_logline = NULL;

    if (isset($_GET['ln']) and isset($_GET['lln']) ) 
    {
        $current_logline = $loglineManager->get_logline_data($_GET['ln'], $_GET['lln'] );
        $current_logline= mysqli_fetch_assoc($current_logline);
    }

    if (!$current_logline) 
        redirect_to("view_logline.php");
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

    <h1> Edit Logline: <?php echo $_GET['ln']." ".$_GET['lln'] ; ?> </h1>

    <form action="edit_logline.php" method="post">
        <p> Log Number:
            <input type="text" name="log_num" value="<?php echo htmlentities($current_logline['log_num']); ?>" readonly />
        </p>
		<p> LogLine Number:
            <input type="text" name="logline_num" value="<?php echo htmlentities($current_logline['logline_num']); ?>" readonly />
        </p>

        <p> Employee ID:
             <input type="text" name="emp_id" value="<?php echo htmlentities($current_logline['emp_id']); ?>"  />
        </p>

        <p> LogLine Date:
            <input type="date" name="logline_date"  value="<?php echo ($current_logline['logline_date']); ?>" />
        </p>

        <p> LogLine Time:
             <input type="time" name="logline_time" value="<?php echo htmlentities($current_logline['logline_time']); ?>" />
        </p>
		
		<p> LogLine Action:
             <input type="text" name="logline_action" value="<?php echo htmlentities($current_logline['logline_action']); ?>"/>
        </p>
		<p> LogLine Units:
             <input type="text" name="logline_units" value="<?php echo htmlentities($current_logline['logline_units']); ?>"  />
        </p>
        <p> 
            <input type="submit" name="submit" value="Edit" />  

            <input type="button" onclick="location.href='view_logline.php';" value="Cancel" />
        </p>
    </form>
</div>


<?php include("../../includes/layouts/footer.php") ?>

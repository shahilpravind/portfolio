<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>

<?php include("../../includes/layouts/header_mechanic.php") ?>

<div id="main">
    <h1> Add a LogLine </h1>

    <?php echo message(); ?>
    <?php $errors = errors(); ?>
    <?php echo form_errors($errors); ?>

    <form name="AddLogLine" action="add_logline.php" method="post">
        <p> Log Line: 
            <input type="text" name="log_num" value="" />
        </p>
        
        <p> LogLine Number:
            <input type="text" name="logline_num" value="" />
        </p>

        <p> Employee ID:
            <input type="text" name="emp_id" value = ""/>
        </p>

        <p> LogLine Date:
            <input type="text" name="logline_date" value = ""/>
        </p>
		
		<p> LogLine Time:
            <input type="text" name="logline_time" value = ""/>
        </p>
		
		<p> LogLine Action:
            <input type="text" name="logline_action" value = ""/>
        </p>

		<p> LogLine Units:
            <input type="number" name="logline_units" value = ""/>
        </p>

        <p> 
            <input type="submit" name="submit" value="Add Logline" /> 

            <input type="reset" value="Clear" /> 

            <input type="button" onclick="location.href='view_logline.php';" value="Cancel" />
        </p>
    </form>
</div>

<?php include("../../includes/layouts/footer.php") ?>

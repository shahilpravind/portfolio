<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>

<?php include("../../includes/layouts/header_mechanic.php") ?>


<div id="main">
    <h1> Add a Logline</h1>

    <?php echo message(); ?>
    <?php $errors = errors(); ?>
    <?php echo form_errors($errors); ?>

    <form name="AddLogAction" action="add_logaction.php" method="post">
        <p> LogAction Number: 
            <input type="number" name="logact_num" value="" />
        </p>
        
        <p> Log Number:
            <input type="number" name="log_num" value="" />
        </p>

        <p> Employee ID:
            
			<input type="number" name="emp_id" value="" />
        </p>

        <p> LogAction Type:
            <input type="text" name="logact_type" value="" />
        </p>
		
		<p> LogAction Date:
            <input type="date" name="logact_date" value="" />
        </p>
		
        <p> 
            <input type="submit" name="submit" value="Add LogAction" /> 

            <input type="reset" value="Clear" /> 

            <input type="button" onclick="location.href='view_logaction.php';" value="Cancel" />
        </p>
    </form>
</div>

<?php include("../../includes/layouts/footer.php") ?>

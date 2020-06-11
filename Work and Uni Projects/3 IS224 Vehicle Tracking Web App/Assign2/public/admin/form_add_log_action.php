<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>


<div id="main">
    <h1> Add a Maintenance Log Action </h1>

    <?php echo message(); ?>
    <?php $errors = errors(); ?>
    <?php echo form_errors($errors); ?>

    <form name="AddLogAction" action="add_log_action.php" method="post">
        <p> Log Action Number:
            <input type="text" name="logact_num" value="" />
        </p>

        <p> Log Number:
            <input type="text" name="log_num" value="" />
        </p>

        <p> Employee ID: 
            <input type="text" name="emp_id" value="" />
        </p>
        
        <p> Log Type:
            <input type="text" name="logact_type"/>
        </p>

        <p> Log Date: 
            <input type="date" name="logact_date" value="" />
        </p>

        <p> 
            <input type="submit" name="submit" value="Add" /> 

            <input type="reset" value="Clear" /> 

            <input type="button" onclick="location.href='view_log_action.php';" value="Cancel" />
        </p>
    </form>
</div>

<?php include("../../includes/layouts/footer.php") ?>

<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>

<div id="main">
    <h1> Add a Maintenance Log </h1>

    <?php echo message(); ?>
    <?php $errors = errors(); ?>
    <?php echo form_errors($errors); ?>

    <form name="AddLog" action="add_log.php" method="post">
        <p> Log Number:
            <input type="text" name="log_num" value="" />
        </p>

        <p> Vehicle Number: 
            <input type="text" name="veh_num" value="" />
        </p>
        
        <p> Log Date: 
            <input type="date" name="log_date" value="" />
        </p>

        <p> Log Complaint:
            <input type="text" name="log_complaint" value="" />
        </p>

        <p> 
            <input type="submit" name="submit" value="Add" /> 

            <input type="reset" value="Clear" /> 

            <input type="button" onclick="location.href='view_maintain_log.php';" value="Cancel" />
        </p>
    </form>
</div>

<?php include("../../includes/layouts/footer.php") ?>

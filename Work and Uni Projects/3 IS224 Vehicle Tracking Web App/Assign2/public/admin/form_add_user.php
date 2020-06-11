<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>


<div id="main">
    <h1 class="page-header"> Add a User </h1>

    <?php echo message(); ?>
    <?php $errors = errors(); ?>
    <?php echo form_errors($errors); ?>

    <form name="AddUser" class="form-horizontal" action="add_user.php" method="post">

        <div class="form-group">            
            <label class="control-label col-sm-2"> Username: </label>
            <div class="col-sm-2">
                <input type="text" name="uname" class="form-control" value="" />
            </div>
        </div>

        <div class="form-group">            
            <label class="control-label col-sm-2"> Password: </label>
            <div class="col-sm-2">
                <input type="password" class="form-control" name="upass" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2"> User Type: </label>

            <div class="col-sm-2">
                <select class="form-control" name="utype">
                    <option value="Admin"> Admin </option>
                    <option value="Mechanic"> Mechanic </option>
                    <option value="Employee"> Employee </option>
                </select>
            </div>
        </div>

        <div class="form-group"> </div>
        <div class="form-group"> </div>
        <div class="form-group"> 
            <input type="submit" class="btn btn-primary" name="submit" value="Add" />
            <input type="reset" class="btn btn-success" value="Clear" />

            <input type="button" class="btn btn-default" onclick="location.href='view_users.php';" value="Cancel">
        </div>
    </form>
</div>

<?php include("../../includes/layouts/footer.php") ?>

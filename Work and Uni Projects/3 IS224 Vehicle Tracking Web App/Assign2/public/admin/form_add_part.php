<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>


<div id="main">
    <h1 class="page-header"> Add a Part </h1>

    <?php echo message(); ?>
    <?php $errors = errors(); ?>
    <?php echo form_errors($errors); ?>

    <form name="AddPart" class="form-horizontal" action="add_part.php" method="post">

        <div class="form-group">
            <label class="control-label col-sm-2"> Part Code: </label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="part_code" value="" />
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-2"> Log Number: </label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="log_num" value="" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2"> Log Line Number: </label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="logline_num" value="" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2"> Part Description: </label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="part_desc" value="" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2"> Part Cost: </label>
            <div class="col-sm-2">
                <input type="number" class="form-control" name="part_cost" min="0" step="0.01" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2"> Part Quantity on Hand: </label>
            <div class="col-sm-2">
                <input type="number" class="form-control" name="part_qoh" min="0" />
            </div>
        </div>

        <div class="form-group"> </div>
        <div class="form-group"> </div>
        <div class="form-group"> 
            <input type="submit" class="btn btn-primary" name="submit" value="Add" />
            <input type="reset" class="btn btn-success" value="Clear" />
            <input type="button" class="btn btn-default" onclick="location.href='view_parts.php';" value="Cancel" />
        </div>
    </form>
</div>

<?php include("../../includes/layouts/footer.php") ?>

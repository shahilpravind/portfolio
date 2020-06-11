<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php require("../../includes/classes/Parts.php"); ?>


<?php
    $partsManager = new Parts();
    $current_part = NULL;

    if (isset($_GET['part_code'])) 
    {
        $current_part = $partsManager->get_parts_data($_GET['part_code']);
        $current_part = mysqli_fetch_assoc($current_part);
    }

    if (!$current_part) 
        redirect_to("view_parts.php");
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

    <h1> Edit Part: <?php echo $_GET['part_code']; ?> </h1>

    <form action="edit_part.php" method="post">
        <p> Part Code:
            <input type="text" name="part_code" value="<?php echo htmlentities($current_part['part_code']); ?>" readonly />
        </p>

        <p> Log Number:
            <input type="text" name="log_num" value="<?php echo $current_part['log_num']; ?>" />
        </p>

        <p> Log Line Number:
            <input type="text" name="logline_num" value="<?php echo $current_part['logline_num']; ?>" />
        </p>

        <p> Part Description:
            <input type="text" name="part_desc" value="<?php echo $current_part['part_description']; ?>" />
        </p>

        <p> Part Cost:
            <input type="number" name="part_cost" min="0" step="0.01" value="<?php echo $current_part['part_cost']; ?>" />
        </p>

        <p> Part Quantity on Hand:
            <input type="number" name="part_qoh" min="0" value="<?php echo $current_part['part_qoh']; ?>" />
        </p>

        <p> 
            <input type="submit" name="submit" value="Edit" />  

            <input type="button" onclick="location.href='view_parts.php';" value="Cancel" />
        </p>
    </form>
</div>


<?php include("../../includes/layouts/footer.php") ?>

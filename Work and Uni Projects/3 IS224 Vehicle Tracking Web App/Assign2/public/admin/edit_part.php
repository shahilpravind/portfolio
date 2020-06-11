<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php") ?>

<?php require_once("../../includes/classes/Parts.php") ?>


<?php

    if (isset($_POST['submit']))
    {
        global $dbconn;
        $partsManager = new Parts();

        $required_fields = array("part_code", "log_num", "logline_num", "part_desc", "part_cost", "part_qoh");
        validate_presences($required_fields);

        if (empty($errors))
        {
            $part_code = $_POST["part_code"];
            $log_num = $_POST["log_num"];
            $logline_num = $_POST["logline_num"];
            $part_desc = $_POST["part_desc"];
            $part_cost = (double) $_POST["part_cost"];
            $part_qoh = (int) $_POST["part_qoh"];

            $result = $partsManager->update_part($part_code, $log_num, $logline_num, $part_desc, $part_cost, $part_qoh);

            if ($result) 
            {
                // Success
                $_SESSION["message"] = "Part updated.";
                redirect_to("view_parts.php");
            }
            else
            {
                // Failure
                $message = "Part update failed.";
            }
        }
    }
    else
    {
        redirect_to("view_parts.php");
    }

?>

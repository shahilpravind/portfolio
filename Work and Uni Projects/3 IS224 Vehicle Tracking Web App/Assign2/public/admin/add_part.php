<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require("../../includes/classes/Parts.php") ?>


<?php

    $partsManager = new Parts();

    if (($_POST["submit"]))
    {
        global $dbconn;

        // get form data
        $part_code = $dbconn->mysql_prep($_POST["part_code"]);
        $log_num = $dbconn->mysql_prep($_POST["log_num"]);
        $logline_num = $dbconn->mysql_prep($_POST["longline_num"]);
        $part_desc = $dbconn->mysql_prep($_POST["part_desc"]);
        $part_cost = (double) $_POST["part_cost"];
        $part_qoh = (int) $_POST["part_qoh"];

        // validation
        $required_fields = array("part_code", "log_num", "logline_num", "part_desc", "part_cost", "part_qoh");
        validate_presences($required_fields);

        if (!empty($errors))
        {
            $_SESSION['errors'] = $errors;
            redirect_to("form_add_part.php");
        }

        $result = $partsManager->add_part($part_code, $log_num, $logline_num, $part_desc, $part_cost, $part_qoh);

        if ($result)
        {
            // Success
            $_SESSION['message'] = "Part added successfully.";
            redirect_to("view_parts.php");
        }
        else
        {
            // Failure
            $_SESSION['message'] = "Part could not be added.";
            redirect_to("form_add_part.php");
        }
    }
    else
    {
        // Adding a part is a post request
        redirect_to("form_add_part.php");
    }

?>


<?php
    if (isset($dbconn))
    {
        $dbconn->db_disconnect();
    }
?>

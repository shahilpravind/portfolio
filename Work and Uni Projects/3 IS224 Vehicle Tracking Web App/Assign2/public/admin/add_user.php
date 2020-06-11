<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/classes/UserManagement.php") ?>


<?php

    $userManager = new UserManagement();

    if (isset($_POST["submit"]))
    {
        global $dbconn;

        // get form data
        $uname = $dbconn->mysql_prep($_POST["uname"]);
        $upass = $dbconn->mysql_prep($_POST["upass"]);
        $utype = $dbconn->mysql_prep($_POST["utype"]);

        // validation
        $required_fields = array("uname", "upass", "utype");
        validate_presences($required_fields);

        if (!empty($errors))
        {
            $_SESSION['errors'] = $errors;
            redirect_to("form_add_user.php");
        }

        $result = $userManager->add_user($uname, $upass, $utype);

        if ($result)
        {
            // Success
            $_SESSION['message'] = "User added successfully.";
            redirect_to("view_users.php");
        }
        else
        {
            // Failure
            $_SESSION['message'] = "User could not be added.";
            redirect_to("form_add_user.php");
        }
    }
    else
    {
        redirect_to("form_add_user.php");
    }

?>


<?php
    if (isset($dbconn))
    {
        $dbconn->db_disconnect();
    }
?>

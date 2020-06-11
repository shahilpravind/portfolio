<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php") ?>
<?php require_once("../../includes/validation_functions.php") ?>

<?php require_once("../../includes/classes/UserManagement.php") ?>


<?php

    if (isset($_POST['submit']))
    {
        global $dbconn;
        $userManager = new UserManagement();

        $required_fields = array("user_id", "username", "usertype");
        validate_presences($required_fields);

        if (empty($errors))
        {
            $user_id = $_POST["user_id"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $usertype = $_POST["usertype"];

            $result = $userManager->update_user($user_id, $username, $password, $usertype);

            if ($result) 
            {
                // Success
                $_SESSION["message"] = "User updated.";
                redirect_to("view_users.php");
            }
            else
            {
                // Failure
                $message = "User update failed.";
            }
        }
    }
    else
    {
        redirect_to("view_users.php");
    }

?>

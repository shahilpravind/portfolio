<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php"); ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/classes/UserManagement.php") ?>


<?php
    $userManager = new UserManagement();

    $id = $_GET['id'];
    $user = $userManager->get_users($id);
    
    if (!$user) 
    {
        // vehicle not in database
        redirect_to("view_users.php");
    }

    $result = $userManager->delete_user($_GET["id"]);

    if ($result)
    {
        // Success
        $_SESSION["message"] = "User deleted.";
        redirect_to("view_users.php");
    } 
    else 
    {
        // Failure
        $_SESSION["message"] = "User could not be deleted.";
        redirect_to("view_users.php");
    }
  
?>

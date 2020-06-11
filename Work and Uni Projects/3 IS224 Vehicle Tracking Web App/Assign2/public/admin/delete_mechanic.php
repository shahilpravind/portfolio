<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/functions.php"); ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require("../../includes/classes/Mechanic.php") ?>


<?php
    $mechanicManager = new Mechanic();

    $emp_id = $_GET['eid'];
    $mechanic = $mechanicManager->get_mechanic_data($emp_id);
    
    if (!$mechanic) 
    {
        // mechanic not in database
        redirect_to("view_mechanics.php");
    }

    $result = $mechanicManager->delete_mechanic($_GET["eid"]);

    if ($result)
    {
        // Success
        $_SESSION["message"] = "Mechanic deleted.";
        redirect_to("view_mechanics.php");
    } 
    else 
    {
        // Failure
        $_SESSION["message"] = "Mechanic could not be deleted.";
        redirect_to("view_mechanics.php");
    }
  
?>

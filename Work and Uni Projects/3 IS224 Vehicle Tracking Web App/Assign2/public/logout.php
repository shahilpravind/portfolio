<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php require("../includes/classes/LoginManager.php"); ?>


<?php

    $loginManager = new LoginManager();
    $loginManager->logout();
    
    redirect_to("login.php");

?>


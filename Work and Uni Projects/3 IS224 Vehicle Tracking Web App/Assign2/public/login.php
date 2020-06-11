<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php require_once("../includes/classes/DBConn.php"); ?>
<?php require_once("../includes/classes/LoginManager.php"); ?>


<?php
    if (isset($_POST['submit']))
    {
        // get form data
        $username = $_POST['username'];
        $password = $_POST['password'];

        // validation
        $required_fields = array("username", "password");
        validate_presences($required_fields);

        if (empty($errors))
        {
            $loginManager = new LoginManager();
            $found_user = $loginManager->login($username, $password);
        }

        if ($found_user)
        {
            // login success
            $_SESSION['user_type'] = $found_user['usertype_desc'];
            $_SESSION['user_id'] = $found_user['username'];

            if ($_SESSION['user_type'] == "Admin")
                redirect_to("admin/view_vehicles.php");
            elseif ($_SESSION['user_type'] == "Mechanic")
                redirect_to("mechanic/view_signout.php");
            else
                redirect_to("employee/view_vehicles.php");
        }
        else
        {
            $_SESSION['message'] = "Username and/or password not found.";
        }
    }
?>


<?php include("../includes/layouts/header_login.php"); ?>

<div class="wrapper">
    <form action="login.php" method="post" class="form-signin">
        <h2 class="form-signin-heading"> Sky University Login </h2>
        
        <?php echo message(); ?>
        <?php echo form_errors($errors); ?>

        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus />

        <input type="password" class="form-control" name="password" placeholder="Password" required="" />

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"> Login </button>
    </form>
</div>
    


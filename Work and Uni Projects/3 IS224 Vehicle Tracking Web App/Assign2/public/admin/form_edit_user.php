<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php require("../../includes/classes/UserManagement.php"); ?>


<?php
    $userManager = new UserManagement();
    $current_user = NULL;

    if (isset($_GET['id'])) 
    {
        $current_user = $userManager->get_users($_GET['id']);
        $current_user = mysqli_fetch_assoc($current_user);
    }

    if (!$current_user) 
        redirect_to("view_users.php");
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

    <h1> Edit User: <?php echo $_GET['id']; ?> </h1>

    <form action="edit_user.php" method="post">
        <p> User ID:
            <input type="text" name="user_id" value="<?php echo htmlentities($current_user['user_id']); ?>" readonly />
        </p>

        <p> Username:
            <input type="text" name="username" value="<?php echo htmlentities($current_user['username']); ?>" />
        </p>

        <p> Password:
            <input type="password" name="password" value="" />
        </p>

        <p> User Type:
        <select name="usertype">
            <option value="Admin"> Admin </option>
            <option value="Mechanic"> Mechanic </option>
            <option value="Employee"> Employee </option>
        </select>
        </p>

        <p> 
            <input type="submit" name="submit" value="Edit" />  

            <input type="button" onclick="location.href='view_users.php';" value="Cancel" />
        </p>
    </form>
</div>


<?php include("../../includes/layouts/footer.php") ?>

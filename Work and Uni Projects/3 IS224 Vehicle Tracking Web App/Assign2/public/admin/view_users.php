<?php require_once("../../includes/session.php") ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/classes/UserManagement.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>


<?php
    $loginManager = new UserManagement();

    $user_set = $loginManager->get_users();

    $report = "";

    if (!empty($user_set))
    {
        $report = "<table class=\"table table-bordered table-striped\">";
        $report .= "<thead>";
        $report .= "<th style=\"text-align: center;\"> User ID </th>";
        $report .= "<th style=\"text-align: center;\"> Username </th>";
        $report .= "<th style=\"text-align: center;\"> User Type </th>";
        $report .= "<th style=\"text-align: center;\"> Edit </th>";
        $report .= "<th style=\"text-align: center;\"> Delete </th>";
        $report .= "</thead>";

        while ($user = mysqli_fetch_assoc($user_set))
        {
            $report .= "<tr>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($user['user_id']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($user['username']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($user['usertype_desc']) . "</td>";

            $report .= "<td style=\"text-align: center;\"> ";
            $report .= "<a href=\"form_edit_user.php?id=" . urlencode($user["user_id"]) . "\">Edit User</a>";
            $report .= "</td>";

            $report .= "<td style=\"text-align: center;\"> ";
            $report .= "<a href=\"delete_user.php?id=" . urlencode($user["user_id"]) . "\">Delete User</a>";
            $report .= "</td>";

            $report .= "</tr>";
        }

        mysqli_free_result($user_set);

        $report .= "</table>";
    }
    else
    {
        $report = "No users found";
    }

?>


<div id="main">

    <h1 class="page-header"> Registered Users </h1>
    <br />

    <?php echo $report; ?>
</div>


<?php include("../../includes/layouts/footer.php") ?>

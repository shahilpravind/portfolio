<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/classes/DBConn.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>


<?php

    global $dbconn;
    $query = "SELECT * FROM employee";

    $emp_set = $dbconn->db_query($query);

    $report = "";

    if (!empty($emp_set))
    {
        $report = "<table class=\"table table-striped table-bordered\">";
        $report .= "<thead>";
        $report .= "<th style=\"text-align: center;\"> Employee ID </th>";
        $report .= "<th style=\"text-align: center;\"> First Name </th>";
        $report .= "<th style=\"text-align: center;\"> Last Name </th>";
        $report .= "</thead>";

        while ($emp = mysqli_fetch_assoc($emp_set))
        {
            $report .= "<tr>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($emp['emp_id']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($emp['emp_fname']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($emp['emp_lname']) . "</td>";
            $report .= "</tr>";
        }

        mysqli_free_result($emp_set);

        $report .= "</table>";
    }
    else
    {
        $report = "No employees found";
    }

?>


<div id="main">
    <h1> Employees </h1>

    <?php echo $report; ?>
</div>


<?php include("../../includes/layouts/footer.php") ?>

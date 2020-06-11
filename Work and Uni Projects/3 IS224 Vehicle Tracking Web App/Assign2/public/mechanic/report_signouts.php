<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/session.php") ?>

<?php require("../../includes/classes/SignOut.php") ?>
<?php include("../../includes/layouts/header_mechanic.php") ?>


<?php
    $signoutManager = new Sign_Out();
    $signout_set = $signoutManager->get_signout_data();

    $report = "";

    if (!empty($signout_set))
    {
        $report = "<table class=\"table table-bordered table-striped\">";
        $report .= "<thead>";
        $report .= "<th style=\"text-align: center;\"> SignOut Number </th>";
        $report .= "<th style=\"text-align: center;\"> Employee ID </th>";
        $report .= "<th style=\"text-align: center;\"> Part Code </th>";
        $report .= "<th style=\"text-align: center;\"> Log Num </th>";
		$report .= "<th style=\"text-align: center;\"> SignOut Date </th>";
		$report .= "<th style=\"text-align: center;\"> SignOut Units </th>";
        $report .= "</thead>";

        while ($signout = mysqli_fetch_assoc($signout_set))
        {
            $report .= "<tr>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($signout['signout_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($signout['emp_id']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($signout['part_code']) . "</td>";
			$report .= "<td style=\"text-align: center;\"> " . htmlentities($signout['log_num']) . "</td>";
			$report .= "<td style=\"text-align: center;\"> " . htmlentities($signout['signout_date']) . "</td>";
			$report .= "<td style=\"text-align: center;\"> " . htmlentities($signout['signout_units']) . "</td>";
            $report .= "</tr>";
        }

        mysqli_free_result($signout_set);

        $report .= "</table>";
    }
    else
    {
        $report = "No signout details found";
    }

?>


<div id="main">
    <h1> SignOut Report </h1>

    <?php echo $report; ?>
</div>


<?php include("../../includes/layouts/footer.php") ?>

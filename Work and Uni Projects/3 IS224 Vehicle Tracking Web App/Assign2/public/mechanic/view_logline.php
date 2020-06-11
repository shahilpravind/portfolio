<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/session.php") ?>

<?php require("../../includes/classes/LogLine.php") ?>
<?php include("../../includes/layouts/header_mechanic.php") ?>


<?php
    $loglineManager = new Log_Line();
    $logline_set = $loglineManager->get_logline_data();

    $report = "";

    if (!empty($logline_set))
    {
        $report = "<table class=\"table table-bordered table-striped\">";
        $report .= "<thead>";
        $report .= "<th style=\"text-align: center;\"> Log Number </th>";
        $report .= "<th style=\"text-align: center;\"> Logline Number </th>";
        $report .= "<th style=\"text-align: center;\"> Enployee ID </th>";
        $report .= "<th style=\"text-align: center;\"> LogLine Date </th>";
		$report .= "<th style=\"text-align: center;\"> LogLine Time </th>";
		$report .= "<th style=\"text-align: center;\"> LogLine Action </th>";
		$report .= "<th style=\"text-align: center;\"> LogLine Units</th>";
		$report .= "<th style=\"text-align: center;\"> Edit </th>";
		$report .= "<th style=\"text-align: center;\"> Delete </th>";
        $report .= "</thead>";

        while ($logline = mysqli_fetch_assoc($logline_set))
        {
            $report .= "<tr>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['log_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['logline_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['emp_id']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['logline_date']) . "</td>";
			$report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['logline_time']) . "</td>";
			$report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['logline_action']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['logline_units']) . "</td>";
			$report .= "<td style=\"text-align: center;\"> ";
            $report .= "<a href=\"form_edit_logline.php?ln=" . urlencode($logline["log_num"] ) . "&lln=" . urlencode($logline["logline_num"] ) ."\">Edit LogLine</a>";
            $report .= "</td>";

            $report .= "<td style=\"text-align: center;\"> ";
            $report .= "<a href=\"delete_logline.php?log_num=" . urlencode($logline["log_num"]) . "&logline_num=" . urlencode( $logline["logline_num"]) . "\">Delete Logline</a>";
            $report .= "</td>";

            $report .= "</tr>";
        }

        mysqli_free_result($logline_set);

        $report .= "</table>";
    }
    else
    {
        $report = "No LogLine found";
    }

?>


<div id="main">
    <h1> LogLine Report </h1>

    <?php echo $report; ?>
</div>


<?php include("../../includes/layouts/footer.php") ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/session.php") ?>

<?php require("../../includes/classes/LogAction.php") ?>
<?php include("../../includes/layouts/header_mechanic.php") ?>


<?php
    $logactionManager = new LogAction();
    $logaction_set = $logactionManager->get_log_action_data();

    $report = "";

    if (!empty($logaction_set))
    {
        $report = "<table class=\"table table-bordered table-striped\">";
        $report .= "<thead>";
        $report .= "<th style=\"text-align: center;\"> LogAction Number </th>";
        $report .= "<th style=\"text-align: center;\"> Log Number </th>";
        $report .= "<th style=\"text-align: center;\"> Employee ID </th>";
        $report .= "<th style=\"text-align: center;\"> LogAction Type </th>";
		$report .= "<th style=\"text-align: center;\"> LogAction Date </th>";
		$report .= "<th style=\"text-align: center;\"> Edit </th>";
		$report .= "<th style=\"text-align: center;\"> Delete </th>";
        $report .= "</thead>";

        while ($logaction = mysqli_fetch_assoc($logaction_set))
        {
            $report .= "<tr>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logaction['logact_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logaction['log_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logaction['emp_id']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logaction['logact_type']) . "</td>";
			$report .= "<td style=\"text-align: center;\"> " . htmlentities($logaction['logact_date']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> ";
            $report .= "<a href=\"form_edit_logaction.php?lac=" . urlencode($logaction["logact_num"] ) ."\">Edit LogAction</a>";
            $report .= "</td>";

            $report .= "<td style=\"text-align: center;\"> ";
            $report .= "<a href=\"delete_logaction.php?logact_num=" . urlencode($logaction["logact_num"])  . "\">Delete LogAction</a>";
            $report .= "</td>";

			$report .= "</tr>";
        }

        mysqli_free_result($logaction_set);

        $report .= "</table>";
    }
    else
    {
        $report = "No LogAction found";
    }

?>


<div id="main">
    <h1> LogAction Report </h1>

    <?php echo $report; ?>
</div>


<?php include("../../includes/layouts/footer.php") ?>

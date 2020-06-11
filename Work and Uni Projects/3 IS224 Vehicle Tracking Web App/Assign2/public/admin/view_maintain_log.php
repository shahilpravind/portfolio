<?php require_once("../../includes/session.php") ?>
<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/classes/MaintainLog.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>


<?php
    $logManager = new MaintainLog();
    $log_set = $logManager->get_log_data();

    $report = "";

    if (!empty($log_set))
    {
        $report = "<table class=\"table table-bordered table-striped\">";
        $report .= "<thead>";
        $report .= "<th style=\"text-align: center;\"> Log Number </th>";
        $report .= "<th style=\"text-align: center;\"> Vehicle Number </th>";
        $report .= "<th style=\"text-align: center;\"> Log Date </th>";
        $report .= "<th style=\"text-align: center;\"> Log Complaint </th>";
        $report .= "<th style=\"text-align: center;\"> Edit </th>";
        $report .= "<th style=\"text-align: center;\"> Delete </th>";
        $report .= "</thead>";

        while ($mlog = mysqli_fetch_assoc($log_set))
        {
            $report .= "<tr>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($mlog['log_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($mlog['veh_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($mlog['log_date']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($mlog['log_complaint']) . "</td>";

            $report .= "<td style=\"text-align: center;\"> ";
            $report .= "<a href=\"form_edit_log.php?log_num=" . urlencode($mlog["log_num"]) . "\">Edit Maintenance Log</a>";
            $report .= "</td>";

            $report .= "<td style=\"text-align: center;\"> ";
            $report .= "<a href=\"delete_log.php?log_num=" . urlencode($mlog["log_num"]) . "\">Delete Maintenance Log</a>";
            $report .= "</td>";

            $report .= "</tr>";
        }

        mysqli_free_result($log_set);

        $report .= "</table>";
    }
    else
    {
        $report = "No maintenance log entries found";
    }

?>


<div id="main">
    <h1> Maintenance Log </h1>

    <?php echo $report; ?>
</div>


<?php include("../../includes/layouts/footer.php") ?>

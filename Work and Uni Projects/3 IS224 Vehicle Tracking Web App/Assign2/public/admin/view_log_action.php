<?php require_once("../../includes/session.php") ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/classes/LogAction.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>


<?php
    $logActionManager = new LogAction();
    $log_action_set = $logActionManager->get_log_action_data();

    $report = "";

    if (!empty($log_action_set))
    {
        $report = "<table class=\"table table-bordered table-striped\">";
        $report .= "<thead>";
        $report .= "<th style=\"text-align: center;\"> Log Action Number </th>";
        $report .= "<th style=\"text-align: center;\"> Log Number </th>";
        $report .= "<th style=\"text-align: center;\"> Employee ID </th>";
        $report .= "<th style=\"text-align: center;\"> Log Action Type </th>";
        $report .= "<th style=\"text-align: center;\"> Log Action Date </th>";
        $report .= "<th style=\"text-align: center;\"> Edit </th>";
        $report .= "</thead>";

        while ($log_act = mysqli_fetch_assoc($log_action_set))
        {
            $report .= "<tr>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($log_act['logact_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($log_act['log_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($log_act['emp_id']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($log_act['logact_type']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($log_act['logact_date']) . "</td>";

            $report .= "<td style=\"text-align: center;\"> ";
            $report .= "<a href=\"form_edit_log_action.php?logact_num=" . urlencode($log_act["logact_num"]) . "\">Edit Maintenance Log Action</a>";
            $report .= "</td>";

            $report .= "</tr>";
        }

        mysqli_free_result($log_action_set);

        $report .= "</table>";
    }
    else
    {
        $report = "No maintenance log action entries found";
    }

?>


<div id="main">
    <h1> Maintenance Log Action </h1>

    <?php echo $report; ?>
</div>


<?php include("../../includes/layouts/footer.php") ?>

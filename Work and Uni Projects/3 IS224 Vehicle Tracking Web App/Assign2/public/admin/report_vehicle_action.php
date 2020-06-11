<?php require_once("../../includes/session.php") ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/classes/LogAction.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>


<?php
    $logActionManager = new LogAction();

    $action_set = $logActionManager->get_action_summary();

    $report = "";

    if (!empty($action_set))
    {
        $report = "<table class=\"table table-bordered table-striped\">";
        $report .= "<thead>";
        $report .= "<th style=\"text-align: center;\"> Vehicle Number </th>";
        $report .= "<th style=\"text-align: center;\"> Log Complaint </th>";
        $report .= "<th style=\"text-align: center;\"> Initial Log Date </th>";
        $report .= "<th style=\"text-align: center;\"> Date Completed </th>";
        $report .= "<th style=\"text-align: center;\"> Mechanic </th>";
        $report .= "<th style=\"text-align: center;\"> Employee ID </th>";
        $report .= "</thead>";

        while ($action = mysqli_fetch_assoc($action_set))
        {
            $report .= "<tr>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($action['veh_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($action['log_complaint']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($action['log_date']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($action['logact_date']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($action['emp_name']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($action['emp_id']) . "</td>";

            $report .= "</tr>";
        }

        mysqli_free_result($action_set);

        $report .= "</table>";
    }
    else
    {
        $report = "No action maintenance action entries found";
    }

?>


<div id="main">

    <h1 class="page-header"> Vehicle Maintenance Action Summary Report </h1>
    <br />

    <?php echo $report; ?>
</div>


<?php include("../../includes/layouts/footer.php") ?>

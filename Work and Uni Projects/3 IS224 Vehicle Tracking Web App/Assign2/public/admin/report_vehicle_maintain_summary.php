<?php require_once("../../includes/session.php") ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/classes/LogLine.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>


<?php
    $logLineManager = new Log_Line();

    $logline_set = $logLineManager->get_maintenance_summary();

    $report = "";

    if (!empty($logline_set))
    {
        $report = "<table class=\"table table-bordered table-striped\">";
        $report .= "<thead>";
        $report .= "<th style=\"text-align: center;\"> Log Line Number </th>";
        $report .= "<th style=\"text-align: center;\"> Log Number </th>";
        $report .= "<th style=\"text-align: center;\"> Log Date </th>";
        $report .= "<th style=\"text-align: center;\"> Log Time </th>";
        $report .= "<th style=\"text-align: center;\"> Log Line Action </th>";
        $report .= "<th style=\"text-align: center;\"> Part Code </th>";
        $report .= "<th style=\"text-align: center;\"> Part Description </th>";
        $report .= "<th style=\"text-align: center;\"> Part Cost </th>";
        $report .= "<th style=\"text-align: center;\"> Log Units </th>";
        $report .= "<th style=\"text-align: center;\"> Employee ID </th>";
        $report .= "<th style=\"text-align: center;\"> Employee Name </th>";
        $report .= "</thead>";

        while ($logline = mysqli_fetch_assoc($logline_set))
        {
            $report .= "<tr>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['logline_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['log_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['logline_date']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['logline_time']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['logline_action']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['part_code']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['part_description']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['part_cost']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['logline_units']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['emp_id']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($logline['emp_name']) . "</td>";

            $report .= "</tr>";
        }

        mysqli_free_result($logline_set);

        $report .= "</table>";
    }
    else
    {
        $report = "No maintenance entries found";
    }

?>


<div id="main">

    <h1 class="page-header"> Vehicle Maintenance Information Summary Report </h1>
    <br />

    <?php echo $report; ?>
</div>


<?php include("../../includes/layouts/footer.php") ?>

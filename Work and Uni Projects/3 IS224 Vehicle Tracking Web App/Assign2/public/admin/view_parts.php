<?php require_once("../../includes/session.php") ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/classes/Parts.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>


<?php
    $partsManager = new Parts();
    $parts_set = $partsManager->get_parts_data();

    $report = "";

    if (!empty($parts_set))
    {
        $report = "<table class=\"table table-bordered table-striped\">";
        $report .= "<thead>";
        $report .= "<th style=\"text-align: center;\"> Part Code </th>";
        $report .= "<th style=\"text-align: center;\"> Log Number </th>";
        $report .= "<th style=\"text-align: center;\"> Log Line Number </th>";
        $report .= "<th style=\"text-align: center;\"> Part Description </th>";
        $report .= "<th style=\"text-align: center;\"> Part Cost </th>";
        $report .= "<th style=\"text-align: center;\"> Part Quantity on Hand </th>";
        $report .= "<th style=\"text-align: center;\"> Edit </th>";
        $report .= "</thead>";

        while ($part = mysqli_fetch_assoc($parts_set))
        {
            $report .= "<tr>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($part['part_code']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($part['log_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($part['logline_num']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($part['part_description']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($part['part_cost']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($part['part_qoh']) . "</td>";

            $report .= "<td style=\"text-align: center;\"> ";
            $report .= "<a href=\"form_edit_part.php?part_code=" . urlencode($part["part_code"]) . "\">Edit Part</a>";
            $report .= "</td>";

            $report .= "</tr>";
        }

        mysqli_free_result($parts_set);

        $report .= "</table>";
    }
    else
    {
        $report = "No parts found";
    }

?>


<div id="main">
    <h1> Parts Inventory </h1>

    <?php echo $report; ?>
</div>


<?php include("../../includes/layouts/footer.php") ?>

<?php require_once("../../includes/session.php") ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/classes/Mechanic.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>


<?php
    $mechanicManager = new Mechanic();
    $mechanic_set = $mechanicManager->get_autho_mechanics();

    $report = "";

    if (!empty($mechanic_set))
    {
        $report = "<table class=\"table table-bordered table-striped\">";
        $report .= "<thead>";
        $report .= "<th style=\"text-align: center;\"> Employee ID </th>";
        $report .= "<th style=\"text-align: center;\"> Mechanic Name </th>";
        $report .= "<th style=\"text-align: center;\"> Mechanic Inspection </th>";
        $report .= "<th style=\"text-align: center;\"> Mechanic Date Check </th>";
        $report .= "<th style=\"text-align: center;\"> Edit </th>";
        $report .= "</thead>";

        while ($mechanic = mysqli_fetch_assoc($mechanic_set))
        {
            $report .= "<tr>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($mechanic['emp_id']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($mechanic['name']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($mechanic['mech_inspect']) . "</td>";
            $report .= "<td style=\"text-align: center;\"> " . htmlentities($mechanic['mech_date_chk']) . "</td>";
            
            $report .= "<td style=\"text-align: center;\"> ";
            $report .= "<a href=\"form_edit_mechanic.php?eid=" . urlencode($mechanic["emp_id"]) . "\">Edit Mechanic</a>";
            $report .= "</td>";

            $report .= "</tr>";
        }

        mysqli_free_result($mechanic_set);

        $report .= "</table>";
    }
    else
    {
        $report = "No mechanics found";
    }

?>


<div id="main">
    <h1> Authorised Inspection Mechanics </h1>

    <?php echo $report; ?>
</div>


<?php include("../../includes/layouts/footer.php") ?>

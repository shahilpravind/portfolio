<?php require_once("../../includes/session.php") ?>

<?php require_once("../../includes/classes/DBConn.php") ?>
<?php require_once("../../includes/classes/Mechanic.php") ?>

<?php include("../../includes/layouts/header_admin.php") ?>


<?php
    $mechanicManager = new Mechanic();

    if (isset($_GET['btnSearch']) && !empty($_GET['mech_search']))
        $mechanic_set = $mechanicManager->search_mechanics($_GET['mech_search']);
    else
        $mechanic_set = $mechanicManager->get_mechanic_data();

    $report = "";

    if (!empty($mechanic_set))
    {
        $report = "<table class=\"table table-bordered table-striped\">";
        $report .= "<thead>";
        $report .= "<th style=\"text-align: center;\"> Employee ID </th>";
        $report .= "<th style=\"text-align: center;\"> Mechanic Name </th>";
        $report .= "<th style=\"text-align: center;\"> Mechanic Inspection Authorisation </th>";
        $report .= "<th style=\"text-align: center;\"> Mechanic Date Check </th>";
        $report .= "<th style=\"text-align: center;\"> Edit </th>";
        $report .= "<th style=\"text-align: center;\"> Delete </th>";
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

            $report .= "<td style=\"text-align: center;\"> ";
            $report .= "<a href=\"delete_mechanic.php?eid=" . urlencode($mechanic["emp_id"]) . "\">Delete Mechanic</a>";
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

    <form name="MechSearch" action="view_mechanics.php" method="get">
        <div class="input-group" style="width:50%; margin:auto;">
            <input type="text" class="form-control" name="mech_search" placeholder="Search mechanic by name..." />

            <span class="input-group-btn">
                <button type="submit" class="btn btn-default" name="btnSearch" value="Submit"><span class="glyphicon glyphicon-search"></span></button></div>
            </span>
        </div>
    </form>
    <br />

    <h1> Mechanics </h1>

    <?php echo $report; ?>
</div>


<?php include("../../includes/layouts/footer.php") ?>

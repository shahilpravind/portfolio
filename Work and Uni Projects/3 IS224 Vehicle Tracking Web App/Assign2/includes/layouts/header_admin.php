<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/session.php") ?>

<?php confirm_admin_logged_in(); ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title> Sky University </title>

        <link href="../../includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../../includes/bootstrap/css/dashboard.css" rel="stylesheet" />
        <link href="../../includes/bootstrap/css/custom.css" rel="stylesheet" />
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">Sky University</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        
                        <li>
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> User Management <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="view_users.php"> View Users </a></li>
                                        <li><a href="form_add_user.php"> Add a User </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li><a href="../Help.pdf">Help</a></li>
                        
                        <li>
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo "Username: " . $_SESSION['user_id']; ?> <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="" disabled> <?php echo $_SESSION['user_type']; ?> </a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="../logout.php">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active"><a disabled> Vehicle <span class="sr-only">(current)</span></a></li>
                        <li><a href="view_vehicles.php">View Vehicles</a></li>
                        <li><a href="form_add_vehicle.php">Add a Vehicle</a></li>
                        <li><a href="report_vehicles.php">Vehicle Report</a></li>
                    </ul>

                    <ul class="nav nav-sidebar">
                        <li class="active"><a disabled> Employees <span class="sr-only">(current)</span></a></li>
                        <li><a href="view_employees.php">View Employees</a></li>
                        <li><a href="view_mechanics.php">View Mechanics</a></li>
                        <li><a href="form_add_mechanic.php">Add a Mechanic</a></li>
                        <li><a href="view_autho_mechanics.php">Inspection Authorized Mechanics</a></li>
                    </ul>

                    <ul class="nav nav-sidebar">
                        <li class="active"><a disabled> Maintenance Logs <span class="sr-only">(current)</span></a></li>
                        <li><a href="view_maintain_log.php">View Maintenance Logs</a></li>
                        <li><a href="form_add_log.php">Add a Log</a></li>
                        <li><a href="report_vehicle_maintain_summary.php">Vehicle Maintenance Information Report</a></li>
                    </ul>

                    <ul class="nav nav-sidebar">
                        <li class="active"><a disabled> Maintenance Log Action <span class="sr-only">(current)</span></a></li>
                        <li><a href="view_log_action.php">View Maintenance Log Actions</a></li>
                        <li><a href="form_add_log_action.php">Add a Log Action</a></li>
                        <li><a href="report_vehicle_action.php">Vehicle Maintenance Action Report</a></li>
                    </ul>

                    <ul class="nav nav-sidebar">
                        <li class="active"><a disabled> Parts Inventory <span class="sr-only">(current)</span></a></li>
                        <li><a href="view_parts.php">View Parts Inventory</a></li>
                        <li><a href="form_add_part.php">Add a Part</a></li>
                        <li><a href="report_parts.php">Parts Inventory Report</a></li>
                    </ul>

                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="" disabled> Sign Out <span class="sr-only">(current)</span></a></li>
                        <li><a href="report_signouts.php">Sign Outs Report</a></li>
                    </ul>
                </div>
                
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                

        
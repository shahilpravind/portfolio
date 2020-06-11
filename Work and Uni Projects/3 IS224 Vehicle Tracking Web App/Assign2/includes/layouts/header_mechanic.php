<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/session.php") ?>

<?php confirm_mech_logged_in(); ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title> Sky University </title>

        <link href="../../includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../../includes/bootstrap/css/main.css" rel="stylesheet" />
        <link href="../../includes/bootstrap/css/custom.css" rel="stylesheet" />
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Sky University</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parts Signout <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="view_signout.php">View Signouts</a></li>
                            <li><a href="form_add_signout.php">Add a Part Signout</a></li>
                            <li><a href="report_signouts.php">Signouts Report</a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Log Action <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="view_logaction.php">View Vehicles under Maintenance</a></li>
                            <li><a href="add_logaction.php">Add Maintenance Log Action</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Vehicle Log Line <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="view_logline.php">View Vehicle Logline</a></li>
                            <li><a href="form_add_logline.php">Add a Vehicle Logline</a></li>
                        </ul>
                    </li>

                    <li><a href="report_vehicle_maintain_summary.php">Vehicle Maintenance Report</a></li>
                    
                    <li>
                        <ul class="nav navbar-nav navbar-right">
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
            </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">

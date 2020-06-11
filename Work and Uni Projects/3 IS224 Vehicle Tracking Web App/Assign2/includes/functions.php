<?php

    function redirect_to($new_loc)
    {
        header("Location: " . $new_loc);
        exit;
    }

    function form_errors($errors=array()) 
    {
        $output = "";
        
        if (!empty($errors)) 
        {
		  $output .= "<div class=\"error\">";
		  $output .= "Please fix the following errors:";
          $output .= "<ul>";
          
          foreach ($errors as $key => $error) 
          {
		    $output .= "<li>";
            $output .= htmlentities($error);
            $output .= "</li>";
          }
          
		  $output .= "</ul>";
		  $output .= "</div>";
		}
		return $output;
    }

    function confirm_admin_logged_in()
    {
        $logged = (isset($_SESSION['user_id']) && $_SESSION['user_type'] == "Admin") ? true : false;

        if (!$logged)
            redirect_to("../login.php");
    }

    function confirm_mech_logged_in()
    {
        $logged = (isset($_SESSION['user_id']) && $_SESSION['user_type'] == "Mechanic") ? true : false;

        if (!$logged)
            redirect_to("../login.php");
    }

    function confirm_emp_logged_in()
    {
        $logged = (isset($_SESSION['user_id']) && $_SESSION['user_type'] == "Employee") ? true : false;

        if (!$logged)
            redirect_to("../login.php");
    }

?>

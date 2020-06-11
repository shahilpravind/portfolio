<?php

    session_start();

    function message()
    {
        if ( isset($_SESSION['message']) )
        {
            $output = "<div class=\"message\">";
            $output .= htmlentities($_SESSION['message']);
            $output .= "</div>";

            // clear message
            $_SESSION["message"] = null;

            return $output;
        }
    }

    function errors()
    {
        if ( isset($_SESSION['errors']) )
        {
            $errors = $_SESSION['errors'];

            // clear error message
            $_SESSION['errors'] = null;

            return $errors;
        }
    }

    function end_session()
    {
        session_unset();  // remove all session variables
        session_destroy();  // end session
    }

?>


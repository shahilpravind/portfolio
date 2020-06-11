<?php require_once("DBConn.php") ?>

<?php

    class LogAction
    {
        public function add_log_action($lan, $ln, $eid, $lat, $lad)
        {
            global $dbconn;
            
            $query = "INSERT INTO log_action (";
            $query .= "logact_num, log_num, emp_id, logact_type, logact_date";
            $query .= ") VALUES (";
            $query .= "'{$lan}', '{$ln}', '{$eid}', '{$lat}', '{$lad}'";
            $query .= ")";

            $result = $dbconn->db_query($query);

            return $result;
        }

        public function get_log_action_data($lad="")
        {
            global $dbconn;
            $query = "SELECT * FROM log_action ";

            if (!empty($lad))
                $query .= "WHERE logact_num = '{$lad}'";

            $log_set = $dbconn->db_query($query);
            return $log_set;
        }

        public function get_action_summary()
        {
            global $dbconn;
            $query = "SELECT log_details.veh_num, log_details.log_complaint, log_details.log_date, log_action.logact_date, CONCAT(employee.emp_fname, \" \", employee.emp_lname) AS emp_name, log_action.emp_id ";
            $query .= "FROM ((log_action ";
            $query .= "INNER JOIN log_details ON log_action.log_num = log_details.log_num)";
            $query .= "INNER JOIN employee ON log_action.emp_id = employee.emp_id)";

            $log_set = $dbconn->db_query($query);
            return $log_set;
        }

        public function update_log_action($lan, $ln, $eid, $lat, $lad)
        {
            global $dbconn;

            $query = "UPDATE log_action SET ";
            $query .= "log_num = '{$ln}', ";
            $query .= "emp_id = '{$eid}', ";
            $query .= "logact_type = '{$lat}' ";
            $query .= "logact_date = '{$lad}' ";
            $query .= "WHERE logact_num = '{$lan}' ";
            $query .= "LIMIT 1";

            $result = $dbconn->db_query($query);

            if ($result && mysqli_affected_rows($dbconn->get_connection()) >= 0)
                return true;
            else 
                return false;
        }
    }

?>

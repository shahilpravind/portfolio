<?php require_once("../../includes/classes/DBConn.php") ?>

<?php

    class Log_Line
    {
        public function add_logline($lln, $ln, $eid, $lld, $llt, $lla, $llu)
        {
            global $dbconn;
            
            $query = "INSERT INTO log_line (";
            $query .= "logline_num, log_num, emp_id, logline_date, logline_time, logline_action, logline_units";
            $query .= ") VALUES (";
            $query .= "'{$lln}', '{$ln}', '{$eid}', '{$lld}', '{$llt}', '{$lla}', '{$llu}'";
            $query .= ")";

            $result = $dbconn->db_query($query);

            return $result;
        }

       public function get_logline_data($ln="", $lln = "")
        {
            global $dbconn;
            $query = "SELECT * FROM log_line ";

            if (!empty($ln) AND !empty($lln))
                $query .= "WHERE log_num = '{$ln}' AND logline_num = '{$lln}'";

            $logline_set = $dbconn->db_query($query);
            return $logline_set;
        }

        public function get_maintenance_summary()
        {
            global $dbconn;

            $query = "SELECT log_line.logline_num, log_line.log_num, log_line.logline_date, log_line.logline_time, log_line.logline_action, part.part_code, part.part_description, part.part_cost, log_line.logline_units, log_line.emp_id, CONCAT(employee.emp_fname, \" \", employee.emp_lname) AS emp_name ";
            $query .= "FROM ((log_line ";
            $query .= "INNER JOIN part ON log_line.logline_num = part.logline_num)";
            $query .= "INNER JOIN employee ON log_line.emp_id = employee.emp_id)";

            $result_set = $dbconn->db_query($query);
            return $result_set;
        }
		
		public function update_logline($ln, $lln, $eid, $lld, $llt, $lla, $llu)
        {
            global $dbconn;

            $query = "UPDATE log_line SET ";
            $query .= "emp_id = '{$eid}', ";
            $query .= "logline_date = '{$lld}', ";
            $query .= "logline_time = '{$llt}', ";
			$query .= "logline_action = '{$lla}', ";
			$query .= "logline_units = '{$llu}' ";
            $query .= "WHERE log_num = '{$ln}' AND logline_num = '{$lln}' ";
            $query .= "LIMIT 1";

            $result = $dbconn->db_query($query);

            if ($result && mysqli_affected_rows($dbconn->get_connection()) >= 0)
                return true;
            else 
                return false;
        }

        public function delete_logline($ln, $lln)
        {
            global $dbconn;

            $query = "DELETE FROM log_line WHERE log_num = '{$ln} AND logline_num = {$lln}' LIMIT 1";
            $result = $dbconn->db_query($query);

            if ($result && mysqli_affected_rows($dbconn->get_connection()) == 1) 
                return true; 
            else 
                return false;
        }
    }
    

?>

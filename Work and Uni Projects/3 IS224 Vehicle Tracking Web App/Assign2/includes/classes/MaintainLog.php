<?php require_once("DBConn.php") ?>

<?php

    class MaintainLog
    {
        public function add_log($ln, $vn, $ld, $lc)
        {
            global $dbconn;
            
            $query = "INSERT INTO log_details (";
            $query .= "log_num, veh_num, log_date, log_complaint";
            $query .= ") VALUES (";
            $query .= "'{$ln}', '{$vn}', '{$ld}', '{$lc}'";
            $query .= ")";

            $result = $dbconn->db_query($query);

            return $result;
        }

        public function get_log_data($ln="")
        {
            global $dbconn;
            $query = "SELECT * FROM log_details ";

            if (!empty($ln))
                $query .= "WHERE log_num = '{$ln}'";

            $log_set = $dbconn->db_query($query);
            return $log_set;
        }

        public function update_log($ln, $vn, $ld, $lc)
        {
            global $dbconn;

            $query = "UPDATE log_details SET ";
            $query .= "veh_num = '{$vn}', ";
            $query .= "log_date = '{$ld}', ";
            $query .= "log_complaint = '{$lc}' ";
            $query .= "WHERE log_num = '{$ln}' ";
            $query .= "LIMIT 1";

            $result = $dbconn->db_query($query);

            if ($result && mysqli_affected_rows($dbconn->get_connection()) >= 0)
                return true;
            else 
                return false;
        }

        public function delete_log($ln)
        {
            global $dbconn;

            $query = "DELETE FROM log_details WHERE log_num = '{$ln}' LIMIT 1";
            $result = $dbconn->db_query($query);

            if ($result && mysqli_affected_rows($dbconn->get_connection()) == 1) 
                return true; 
            else 
                return false;
        }
    }

?>

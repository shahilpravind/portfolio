<?php require_once("DBConn.php") ?>

<?php

    class Parts
    {
        public function add_part($pcode, $lnum, $lline, $pdesc, $pcost, $pqoh)
        {
            global $dbconn;
            
            $query = "INSERT INTO part (";
            $query .= "part_code, log_num, logline_num, part_description, part_cost, part_qoh";
            $query .= ") VALUES (";
            $query .= "'{$pcode}', '{$lnum}', '{$lline}', '{$pdesc}', '{$pcost}', '{$pqoh}'";
            $query .= ")";

            $result = $dbconn->db_query($query);
            return $result;
        }

        public function get_parts_data($pc="")
        {
            global $dbconn;
            $query = "SELECT * FROM part ";

            if (!empty($pc))
                $query .= "WHERE part_code = '{$pc}'";

            $parts_set = $dbconn->db_query($query);
            return $parts_set;
        }

        public function get_parts_report_data()
        {
            global $dbconn;

            $query = "SELECT part.part_code, part.log_num, log_details.log_complaint, part.logline_num, log_line.logline_units, part.part_description, part.part_cost, part.part_qoh ";
            $query .= "FROM ((part ";
            $query .= "INNER JOIN log_details ON part.log_num = log_details.log_num)";
            $query .= "INNER JOIN log_line ON part.logline_num = log_line.logline_num)";

            $result_set = $dbconn->db_query($query);
            return $result_set;
        }

        public function update_part($pcode, $lnum, $lline, $pdesc, $pcost, $pqoh)
        {
            global $dbconn;

            $query = "UPDATE part SET ";
            $query .= "log_num = '{$lnum}', ";
            $query .= "logline_num = '{$lline}', ";
            $query .= "part_description = '{$pdesc},' ";
            $query .= "part_cost = '{$pcost}', ";
            $query .= "part_qoh = '{$pqoh}' ";
            $query .= "WHERE part_code = '{$pcode}' ";
            $query .= "LIMIT 1";

            $result = $dbconn->db_query($query);

            if ($result && mysqli_affected_rows($dbconn->get_connection()) >= 0)
                return true;
            else 
                return false;
        }
    }

?>

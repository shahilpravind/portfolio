<?php require_once("../../includes/classes/DBConn.php") ?>

<?php

    class Sign_Out
    {
        public function add_sign_out($sn, $eid, $pc, $ln, $sd, $su)
        {
            global $dbconn;
            
            $query = "INSERT INTO sign_out (";
            $query .= "signout_num, emp_id, part_code, log_num, signout_date,signout_units";
            $query .= ") VALUES (";
            $query .= "'{$sn}', '{$eid}', '{$pc}', '{$ln}', '{$sd}', '{$su}'";
            $query .= ")";

            $result = $dbconn->db_query($query);

            return $result;
        }

        public function get_signout_data($son = "")
        {
            global $dbconn;
            $query = "SELECT * FROM sign_out";
			
			
            if (!empty($son))
                $query .= "WHERE signout_num = '{$son}'";

            $signout_set = $dbconn->db_query($query);

            return $signout_set;
        }
		public function update_signout($son,$sd,$su)
		{
				global $dbconn;
				
				$query = "UPDATE sign_out SET ";
				$query .= "signout_date = '{$sd}', ";
				$query .= "signout_units = '{$su}', ";
				$query .= "WHERE signout_num = '{$son}' ";
				$query .= "LIMIT 1";

				$result = $dbconn->db_query($query);

				if ($result && mysqli_affected_rows($dbconn->get_connection()) >= 0)
					return true;
				else 
					return false;
		}
		  public function delete_signout($son)
        {
            global $dbconn;

            $query = "DELETE FROM sign_out WHERE signout_num = '{$son}' LIMIT 1";
            $result = $dbconn->db_query($query);

            if ($result && mysqli_affected_rows($dbconn->get_connection()) == 1) 
                return true; 
            else 
                return false;
        }
    }

?>

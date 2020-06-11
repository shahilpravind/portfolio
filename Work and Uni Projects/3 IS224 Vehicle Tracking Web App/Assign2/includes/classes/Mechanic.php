<?php require_once("DBConn.php") ?>

<?php

    class Mechanic
    {
        public function add_mechanic($eid, $mi, $mdc)
        {
            global $dbconn;
            
            $query = "INSERT INTO mechanic (";
            $query .= "emp_id, mech_inspect, mech_date_chk";
            $query .= ") VALUES (";
            $query .= "'{$eid}', '{$mi}', '{$mdc}'";
            $query .= ")";

            $result = $dbconn->db_query($query);

            return $result;
        }

        public function get_mechanic_data($eid="")
        {
            global $dbconn;

            $query = "SELECT mechanic.emp_id, CONCAT(employee.emp_fname, ' ', employee.emp_lname) AS 'name', mechanic.mech_inspect, mechanic.mech_date_chk ";
            $query .= "FROM mechanic LEFT JOIN employee ON mechanic.emp_id = employee.emp_id ";

            if (!empty($eid))
                $query .= "WHERE employee.emp_id = '{$eid}'";
            $query .= " ORDER BY mechanic.emp_id";

            $mechanic_set = $dbconn->db_query($query);
            return $mechanic_set;
        }

        public function get_autho_mechanics()
        {
            global $dbconn;

            $query = "SELECT mechanic.emp_id, CONCAT(employee.emp_fname, ' ', employee.emp_lname) AS 'name', mechanic.mech_inspect, mechanic.mech_date_chk ";
            $query .= "FROM mechanic LEFT JOIN employee ON mechanic.emp_id = employee.emp_id ";            $query .= "WHERE mech_inspect = 'Y'";
            $query .= " ORDER BY mechanic.emp_id";

            $mechanic_set = $dbconn->db_query($query);
            return $mechanic_set;
        }

        public function search_mechanics($search_key="")
        {
            global $dbconn;

            $query = "SELECT mechanic.emp_id, CONCAT(employee.emp_fname, ' ', employee.emp_lname) AS 'name', mechanic.mech_inspect, mechanic.mech_date_chk ";
            $query .= "FROM mechanic INNER JOIN employee ON mechanic.emp_id = employee.emp_id ";
            $query .= "WHERE employee.emp_fname LIKE '%{$search_key}%' OR employee.emp_lname LIKE '%{$search_key}%'";
            $query .= " ORDER BY mechanic.emp_id";

            $mechanic_set = $dbconn->db_query($query);
            return $mechanic_set;
        }

        public function update_mechanic($eid, $mi, $mdc)
        {
            global $dbconn;

            $query = "UPDATE mechanic SET ";
            $query .= "mech_inspect = '{$mi}', ";
            $query .= "mech_date_chk = '{$mdc}' ";
            $query .= "WHERE emp_id = '{$eid}' ";
            $query .= "LIMIT 1";

            $result = $dbconn->db_query($query);

            if ($result && mysqli_affected_rows($dbconn->get_connection()) >= 0)
                return true;
            else 
                return false;
        }

        public function delete_mechanic($eid)
        {
            global $dbconn;

            $query = "DELETE FROM mechanic WHERE emp_id = '{$eid}' LIMIT 1";
            $result = $dbconn->db_query($query);

            if ($result && mysqli_affected_rows($dbconn->get_connection()) == 1) 
                return true; 
            else 
                return false;
        }
    }

?>


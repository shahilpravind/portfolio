<?php require_once("DBConn.php") ?>

<?php

    class Vehicle
    {
        public function add_vehicle($vn, $vd, $vm, $va)
        {
            global $dbconn;
            
            $query = "INSERT INTO vehicle (";
            $query .= "veh_num, veh_description, veh_miles, veh_available";
            $query .= ") VALUES (";
            $query .= "'{$vn}', '{$vd}', '{$vm}', '{$va}'";
            $query .= ")";

            $result = $dbconn->db_query($query);

            return $result;
        }

        public function get_vehicle_data($vn="")
        {
            global $dbconn;
            $query = "SELECT * FROM vehicle ";

            if (!empty($vn))
                $query .= "WHERE veh_num = '{$vn}'";

            $vehicle_set = $dbconn->db_query($query);
            return $vehicle_set;
        }

        public function get_available_vehicles()
        {
            global $dbconn;
            $query = "SELECT * FROM vehicle WHERE veh_available = 'Y'";

            $vehicle_set = $dbconn->db_query($query);
            return $vehicle_set;
        }

        public function search_vehicle($search_key="")
        {
            global $dbconn;
            
            $search_key = $dbconn->mysql_prep($search_key);

            $query = "SELECT * FROM vehicle ";

            if (!empty($search_key))
                $query .= "WHERE veh_description LIKE '%{$search_key}%'";

            $vehicle_set = $dbconn->db_query($query);
            return $vehicle_set;
        }

        public function update_vehicle($vn, $vd, $vm, $va)
        {
            global $dbconn;

            $query = "UPDATE vehicle SET ";
            $query .= "veh_description = '{$vd}', ";
            $query .= "veh_miles = '{$vm}', ";
            $query .= "veh_available = '{$va}' ";
            $query .= "WHERE veh_num = '{$vn}' ";
            $query .= "LIMIT 1";

            $result = $dbconn->db_query($query);

            if ($result && mysqli_affected_rows($dbconn->get_connection()) >= 0)
                return true;
            else 
                return false;
        }

        public function delete_vehicle($vn)
        {
            global $dbconn;

            $query = "DELETE FROM vehicle WHERE veh_num = '{$vn}' LIMIT 1";
            $result = $dbconn->db_query($query);

            if ($result && mysqli_affected_rows($dbconn->get_connection()) == 1) 
                return true; 
            else 
                return false;
        }
    }

?>

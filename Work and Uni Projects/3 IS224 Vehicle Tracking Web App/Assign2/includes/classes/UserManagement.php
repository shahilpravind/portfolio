<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/classes/DBConn.php"); ?>


<?php

    class UserManagement
    {
        private function generate_salt($length) 
        {
            // md5 => 32 characters
            $unique_random_string = md5(uniqid(mt_rand(), true));

            // valid characters for salt => [a-zA-Z0-9./]
            $base64_string = base64_encode($unique_random_string);

            // + not allowed
            $modified_base64_string = str_replace('+', '.', $base64_string);

            // reduce to correct length
            $salt = substr($modified_base64_string, 0, $length);

            return $salt;
        }

        private function password_encrypt($password) 
        {
            $hash_format = "$2y$10$";  // blowfish, cost 10
            $salt_length = 22;	// blowfish salt >= 22
        
            $salt = $this->generate_salt($salt_length);
            $format_and_salt = $hash_format . $salt;
            $hash = crypt($password, $format_and_salt);
        
            return $hash;
        }

        public function add_user($name, $pass, $type)
        {
            global $dbconn;

            $type_query = "SELECT usertype_id FROM user_type WHERE usertype_desc = '{$type}'";
            $result = $dbconn->db_query($type_query);

            if (!empty($result))
            {
                $usertype = mysqli_fetch_assoc($result);
                $type_id = $usertype['usertype_id'];
            }
            else
            {
                $_SESSION['message'] = "Invalid user type specified.";
                return null;
            }

            $hashed_pass = $this->password_encrypt($pass);

            $query = "INSERT INTO users(username, password, usertype_id) VALUES ";
            $query .= "('{$name}', '{$hashed_pass}', '{$type_id}')";

            $result = $dbconn->db_query($query);
            return $result;
        }

        public function get_users($id="")
        {
            global $dbconn;

            $query = "SELECT users.user_id, users.username, user_type.usertype_desc ";
            $query .= "FROM users INNER JOIN user_type ON users.usertype_id = user_type.usertype_id";

            if (!empty($id))
                $query .= " WHERE users.user_id = '{$id}'";

            $result_set = $dbconn->db_query($query);
            return $result_set;
        }

        public function update_user($id, $name, $pass, $type)
        {
            global $dbconn;

            $type_query = "SELECT usertype_id FROM user_type WHERE usertype_desc = '{$type}'";
            $result = $dbconn->db_query($type_query);

            if (!empty($result))
            {
                $usertype = mysqli_fetch_assoc($result);
                $type_id = $usertype['usertype_id'];
            }
            else
            {
                $_SESSION['message'] = "Invalid user type specified.";
                return null;
            }

            if (empty($pass))
            {
                $query = "UPDATE users SET ";
                $query .= "username = '{$name}', ";
                $query .= "usertype_id = '{$type_id}' ";
                $query .= "WHERE user_id = '{$id}' ";
                $query .= "LIMIT 1";
            }
            else
            {
                $hashed_pass = $this->password_encrypt($pass);
                
                $query = "UPDATE users SET ";
                $query .= "username = '{$name}', ";
                $query .= "password = '{$hashed_pass}', ";
                $query .= "usertype_id = '{$type_id}' ";
                $query .= "WHERE user_id = '{$id}' ";
                $query .= "LIMIT 1";
            }

            $result = $dbconn->db_query($query);

            if ($result && mysqli_affected_rows($dbconn->get_connection()) >= 0)
                return true;
            else 
                return false;
        }

        public function delete_user($id)
        {
            global $dbconn;

            $query = "DELETE FROM users WHERE user_id = '{$id}' LIMIT 1";
            $result = $dbconn->db_query($query);

            if ($result && mysqli_affected_rows($dbconn->get_connection()) == 1) 
                return true; 
            else 
                return false;
        }
    }

?>


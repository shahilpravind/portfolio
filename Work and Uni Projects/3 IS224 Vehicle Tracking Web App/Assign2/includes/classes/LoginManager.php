<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/classes/DBConn.php"); ?>


<?php

    class LoginManager
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
        
            $salt = generate_salt($salt_length);
            $format_and_salt = $hash_format . $salt;
            $hash = crypt($password, $format_and_salt);
        
            return $hash;
        }

        private function password_check($password, $existing_hash) 
        {
            // existing hash contains format and salt at start
            $hash = crypt($password, $existing_hash);
            
            if ($hash === $existing_hash)
                return true;
            else
                return false;
        }


        public function login($name, $pass)
        {
            global $dbconn;

            $name = $dbconn->mysql_prep($name);
            $pass = $dbconn->mysql_prep($pass);

            $query = "SELECT users.user_id, users.username, users.password, user_type.usertype_desc ";
            $query .= "FROM users INNER JOIN user_type ON users.usertype_id = user_type.usertype_id ";
            $query .= "WHERE users.username = '{$name}'";

            $user_set = $dbconn->db_query($query);

            while ($user = mysqli_fetch_assoc($user_set))
            {
                // found user, check password
                if ($this->password_check($pass, $user['password']))
                    return $user;
            }

            //return false;
        }

        public function logout()
        {
            if (isset($_SESSION['user_type']))
                unset($_SESSION['user_type']);
            if (isset($_SESSION['user_id']))
                unset($_SESSION['user_id']);
        }
    }

?>


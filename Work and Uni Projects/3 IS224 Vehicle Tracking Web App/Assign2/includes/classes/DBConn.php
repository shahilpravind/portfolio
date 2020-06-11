<?php

    class DBConn
    {
        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbpass = "";
        private $dbname = "tranquility";

        private $connection = NULL;

        function __construct()
        {
            $connection = $this->db_connect();
        }

        public function get_connection()
        {
            return $this->connection;
        }

        public function db_connect()
        {
            // attempt db connection
            $this->connection = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

            // test for success
            if (mysqli_connect_errno())
            {
                die("Database connection failed: " . mysqli_connect.error() . " (" . mysqli_connect_errno() . ")");
            }
        }

        public function db_query($qry)
        {
            $result_set = mysqli_query($this->connection, $qry);

            if (!$result_set)
            {
               die("Database query failed.");
            }

            return $result_set;
        }

        public function mysql_prep($string)
        {
            $escaped_string = mysqli_real_escape_string($this->connection, $string);
            return $escaped_string;
        }

        public function release_data($result_set)
        {
            if ($result_set)
                mysqli_free_result($result_set);
        }

        public function db_disconnect()
        {
            if (isset($this->connection))
                mysqli_close($this->connection);
        }
    }

    $dbconn = new DBConn();

?>

<?php
    class DB{
        public $con;
        protected $serverName = "localhost";
        protected $username = "root";
        protected $password = "";
        protected $dbname = "wogomin";

        function __construct()
        {
            $this->con = mysqli_connect($this->serverName, $this->username, $this->password);
            mysqli_select_db($this->con, $this->dbname);
            mysqli_query($this->con, "SET NAMES 'utf8'");
        }

        public function getData($sql){
            $result = mysqli_query($this->con, $sql);
            $data = array();
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            return $data;
        }

        public function updateData($table, $column, $value, $where, $value2){
            $sql = 'update '.$table.' set '.$column.' = "'.$value .'" where '.$where.' = "'.$value2.'"';
            mysqli_query($this->con, $sql);
        }

        public function insertData($sql){
            $check = mysqli_query($this->con, $sql);
            if ($check === false) {
                return false;
            }
            return true;
        }
    }
?>
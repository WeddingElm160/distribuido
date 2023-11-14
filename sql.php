<?php 
    class sql{
        public  $conn;
        private $user = "urkb8hqi7978wjog";
        private $pass = "wYl8Rx1djXeqmXeX4xMZ";
        private $serv = "btdgoivymksf36xcqqjo-mysql.services.clever-cloud.com";
        private $db = "btdgoivymksf36xcqqjo";
        // private $charset = "utf8mb4";

        public function __construct(){
            // cambiar
            // $user = "root";
            // $pass = "";
            // $serv = "localhost";
            // $db = "pokemon";
            $charset = "utf8mb4";

            try{
                $dataSourceName = "mysql:host=".$this->serv.";dbname=".$this->db.";charset=".$charset;
                // $this->conn = new PDO("mysql:host=". $serv .";dbname=". $db . $user .$pass);
                $this->conn = new PDO($dataSourceName, $this->user, $this->pass);

                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // $this -> conn ->exec("SET NAMES utf8mbs4");
            }catch(PDOException $ex){
                die("PDO Connection Error " . $ex->getMessage());
            }
        }
        public function select($sql){
            $result = $this->conn->query($sql);
            return $result;
        }
        public function execute($sql){
            $statement = $this->conn->prepare($sql);
            $statement->execute();   
        }
    }


?>
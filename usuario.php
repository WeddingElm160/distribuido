<?php
    class usuario
    {
        public $conn;

        public function __construct()
        {
            $this->conn = new sql();
        }

        public function insert($nom,$pass,$img,$tipo)
        {
            $sql = "insert into usuario values(null, '" . $nom ."','" . $pass. "','" . $img. "','" .$tipo. "')";
            $this->conn->select($sql);
        }
        public function delete($id)
        {
            $sql = "DELETE FROM usuario WHERE id = '" . $id . "'";
            $this->conn->select($sql);
        }

        public function update($id,$nom,$pass,$img,$tipo)
        {
            $sql = "update usuario set nom = '" .$nom. "', pass= md5(CONCAT('@@@###','".$pass."', '@@@###')),img='" .$img ."', type= '" .$tipo . "' where id = '" . $id . "'";
            $this->conn->select($sql);

        }

        public function selest()
        {
            $sql = "select * from usuario";
            $result = $this->conn->select($sql);
            
            $extra = "";
            echo '{"datos":[';
            while($row = $result->fetch())
            {
                echo $extra. "{";
                echo '"id":"'.$row["id"]. "\",\n";
                echo '"nom":"'.$row["nom"]. "\",\n";
                echo '"pass":"'. $row["pass"]. "\",\n";
                echo '"img":"'. $row["img"]. "\",\n";
                echo '"type":"'. $row["type"]. "\"\n";
                echo "}";
                $extra = $extra == ""?",":$extra;

            }
            echo "]}";
        }
    }

?>
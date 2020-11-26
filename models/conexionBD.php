<?php
    class conectar {
        private $servidor = "127.0.0.1:3306";
        private $database = "tareas_electrica";
        private $username = "root";
        private $password = "";

        public function conexion() {
            $conexion = mysqli_connect($this->servidor, $this->username, $this->password, $this->database);

            return $conexion;
        }
    }
?>

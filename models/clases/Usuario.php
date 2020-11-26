<?php
    class Usuario {
        private $usuario;
        private $password;

        public function setNombre($usuario, $con) {
            $this->usuario = $usuario;
        }

        public function getNombre($con) {
            return $this->usuario;
        }

        public function setPassword($password, $con) {
            $this->password = $password;
        }

        public function existeUsuario($usuario, $password, $con) {
            mysqli_set_charset($con,'utf8');
            $sql = "SELECT * from usuarios where usuario= '$usuario' and pass='$password'";

            $resultado = mysqli_query($con, $sql);

            return mysqli_num_rows($resultado);
        }

        public function metodoPrueba() {
            return "Metodo de prueba";
        }

        
    }

?>
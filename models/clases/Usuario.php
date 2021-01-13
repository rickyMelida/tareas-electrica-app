<?php
    abstract class Usuario {
        private $usuario;
        private $password;
        private $rol;

        public function setNombre($usuario) {
            $this->usuario = $usuario;
        }

        public function getNombre($con) {
            return $this->usuario;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function getRol() {
            return $this->rol;
        }

        // public function existeUsuario($user, $pass, $con) {
        //     $this->setNombre($user);
        //     $this->setPassword($pass);
            
        //     mysqli_set_charset($con,'utf8');
        //     $sql = "SELECT * from usuarios where usuario= '$user' and pass='$pass'";

        //     $resultado = mysqli_query($con, $sql);
            
        //     return mysqli_num_rows($resultado);
        // }

    }

?>
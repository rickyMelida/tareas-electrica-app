<?php
    require_once("../../core/db_abstract_model.php");

	class User extends DBAbstractModel {

		private $user;
        private $pass;
		private $rol;
		

        public function setName($usuario) {
            $this->user = $usuario;
        }

        public function getName() {
            return $this->user;
        }

        public function setPass($pass) {
            $this->pass = $pass;
        }

        public function getRol() {
            return $this->rol;
        }

        public function existUser($user, $pass) {
            $this->setName($user);
			$this->setPass($pass);	
			$con = parent::open_connection();
            
            mysqli_set_charset($con,'utf8');
            $sql = "SELECT * from usuarios where usuario= '$user' and pass='$pass'";

            $result = mysqli_query($con, $sql);
            
            return mysqli_num_rows($result);
        }
    }

?>

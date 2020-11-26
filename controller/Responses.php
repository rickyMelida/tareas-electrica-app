<?php
    class Responses {
        public function authUser($res) {
            if($res) {
                header('Location: ../../views/src/principal.php');
                echo "<script>alert('EXcelente');</script>";
            }else {
                echo "<script>alert('Error usuario o contrasenha incorrecta');</script>";
            }
        }
    }

?>
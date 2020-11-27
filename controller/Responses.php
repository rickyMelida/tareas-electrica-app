<?php
    class Responses {
        private $sweetAlert = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        private $mainJS = "<script src='../views/js/design.js'></script>";

        public function authUser($res) {
            if($res) {
                echo $this->$sweetAlert. "<br>" .$this->mainJS."<script> usuarioAutenticado(); window.open('principal.php', '_self');</script>";
                // header('Location: ../../views/src/principal.php');
            }else {
                echo "<script>alert('Error usuario o contrasenha incorrecta');</script>";
            }
        }
    }

?>
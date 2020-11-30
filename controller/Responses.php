<?php
    class Responses {
        private $sweetAlert = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        private $mainJS = "<script src='../views/js/design.js'></script>";

        public function authUser($res) {
            if($res) {
                $output = ['status' => '200', "mensaje" => 'success'];
            }else {
                $output = ['status' => '404', "mensaje" => 'error'];
            }

            return $output;
        }
    }

?>
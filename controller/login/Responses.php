<?php
    class Responses {

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
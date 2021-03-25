<?php
    abstract class DBAbstractModel {
        private static $server = "127.0.0.1:3306";
        private static $database = "tareas_electrica";
        private static $username = "root";
        private static $password = "5181789781Ri-";

        protected function open_connection() {
            $conn = mysqli_connect(self::$server, self::$username, self::$password, self::$database);

            return $conn;
        }
    }
?>

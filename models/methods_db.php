<?php
    class Methods_DB {
        private $conn;

        public function create($quey, $data) {
            return $result = mysqli_query($con, $sql);
        }
    }

?>
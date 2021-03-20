<?php
    class Images {
        private $before_type;
        private $after_type;
        private $before_name;
        private $after_name;
        private $before_folder;
        private $after_folder;

        public function getBeforeType() {
            return $this->before_type;
        }

        public function setBeforeType($before_type) {
            $this->before_type = $before_type;
        }

        public function getAfterType() {
            return $this->after_type;
        }

        public function setAfterType($after_type) {
            $this->after_type = $after_type;
        }

        public function getBeforeName() {
            return $this->before_name;
        }

        public function setBeforeName($before_name) {
            $this->before_name = $before_name;
        }

        public function getAfterName() {
            return $this->after_name;
        }

        public function setAfterName($after_name) {
            $this->after_name = $after_name;
        }

        public function getBeforeFolder() {
            return $this->before_folder;
        }

        public function setBeforeFolder($before_folder) {
            $route_folder = $_SERVER['DOCUMENT_ROOT'].'/tareas-electrica-app/tareas/'.$before_folder.'/';
            
            $this->before_folder = $route_folder;
        }

        public function getAfterFolder() {
            return $this->after_folder;
        }

        public function setAfterFolfer($after_folder) {
            $route_folder  = $_SERVER['DOCUMENT_ROOT'].'/tareas-electrica-app/tareas/'.$after_folder.'/';
            $this->after_folder = $route_folder;
        }

    }


?>
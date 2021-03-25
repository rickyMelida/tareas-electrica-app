<?php
    require_once("../../core/db_abstract_model.php");
	
	class Responses extends DBAbstractModel {

		public function authUser($res) {
			if($res) {
				$output = ['status' => '200', "message" => 'success'];
			}else {
				$output = ['status' => '404', "message" => 'error'];
			}

			return $output;
		}

		public function connDB() {
			$res = ['status' => '500', "message" => 'error'];

			if(parent::open_connection()) {
				$res = [ 'status' => '200', 'message' => 'success' ];
			}
			return $res;
		}
    }

?>

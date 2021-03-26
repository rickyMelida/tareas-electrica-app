<?php
    require_once("../../core/db_abstract_model.php");
	
	class Responses extends DBAbstractModel {

		public function authUser($res) {
			if($res) {
				$output = ['status' => '200', "message" => 'Autenticación correcta!', 'value' => true];
			}else {
				$output = ['status' => '404', "message" => 'Usuario no registrado!', 'value' => false];
			}

			return $output;
		}

		public function connDB() {
			$res = ['status' => '500', "message" => 'error', 'value' => true];

			if(parent::open_connection()) {
				$res = [ 'status' => '200', 'message' => 'success', 'value' => false ];
			}
			return $res;
		}

		public function serverResponse($res) {
			$result = ['status' => '500', "message" => 'error', 'value' => true];

			if($res) {
				$result = [ 'status' => '200', 'message' => 'success', 'value' => false];
			}
			return $result;
		}
    }

?>

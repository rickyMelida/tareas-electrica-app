<?php

	require_once '../core/db_abstract_model.php';

	class Technical extends DBAbstractModel{
		private $name;
		private $position;
		private $turn;

		public function __construct($name, $position, $turn) {
			$this->name = $name;
			$this->position = $position;
			$this->turn = $turn;
		}

		public function getNameWithUserName() {
			$con = parent::open_connection();

			$query = "SELECT nombre from tecnicos inner join usuarios on tecnicos.id_tecnico=usuarios.tecns where usuario='$userName'";
			$result = mysqli_query($con, $query);

			return mysqli_fetch_all($result, MYSQLI_ASSOC);
			return $con;
		}

		public function setName($name) {
			$this->name = $name;
		}

		public function getPosition() {
			return $this->position;
		}

		public function setPosition($position) {
			$this->position = $position;
		}

		public function getTurn() {
			return $this->turn;
		}

		public function setTurn($turn) {
			$this->turn = $turn;
		}
	
	}

?>

<?php
	class Technical {
		private $name;
		private $position;
		private $turn;

		public function __construct($name, $position, $turn) {
			$this->name = $name;
			$this->position = $position;
			$this->turn = $turn;
		}

		public function getName() {
			
			return $this->name;
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

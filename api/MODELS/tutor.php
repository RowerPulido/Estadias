<?php
	class Tutor
	{
		//atributes
		private $matricula;
		private $name;
		private $first_Name;
		private $school;

		//getters and setters
		public function get_matricula() { return $this->matricula; }
		public function set_matricula($value) { $this->matricula = $value; }
		public function get_name() { return $this->name; }
		public function set_name($value) { $this->name = $value; }
		public function get_firstName() { return $this->first_Name; }
		public function set_firstName($value) { $this->first_Name = $value; }
		public function get_school() { return $this->school; }
		public function set_school($value) { $this->school = $value; }

		//constructor
		public function __construct()
		{
			if (func_num_args() == 0)
			{
				$this->matricula = '';
				$this->name = '';
				$this->first_Name = '';
				$this->school = '';
			}
		}
		public static function set_tutor($setMatricula, $setName, $setFirstName, $setSchool)
		{
			//get connection
			$connection = get_connection();
			//query
			$query = 'insert into Estadias.Tutor values(?,?,?,?)';
			//command
			$command = $connection->prepare($query);
			if ($command === false)
			{
				echo 'Error in query : '.$query;
				die;
			}
			//link parametters
			$command->bind_param('isss',$setMatricula, $setName, $setFirstName, $setSchool);
			//execute command
			$command->execute();
		}
	}
?>
<?php
	class Proyecto
	{
		//atributes
		private $name;
		private $name_Student;
		private $matricula_student;
		private $time;
		//getters and setters
		public function get_name() { return $this->name; }
		public function set_name($value) { $this->name = $value; }
		public function get_nameStudent() { return $this->name_Student; }
		public function set_nameStudent($value) { $this->name_Student = $value; }
		public function get_matriculaStudent() { return $this->matricula_student; }
		public function set_matricula($value) { $this->matricula_student = $value; }
		public function get_time() { return $this->time; }
		public function set_time($value) { $this->time = $value; }
		//constructor
		public function __construct()
		{
			if (func_num_args() == 0)
			{
				$this->name = '';
				$this->name_Student = '';
				$this->matricula_student = '';
				$this->time = '';
			}
		}
		public static function set_proyecto($setName, $setNameStudent, $setMatriculaStudent, $setTime)
		{
			//get connection
			$connection = get_connection();
			//query
			$query = 'insert into Estadias.Proyecto values(?,?,?,?)';
			//command
			$command = $connection->prepare($query);
			if ($command === false)
			{
				echo 'Error in query : '.$query;
				die;
			}
			//link parametters
			$command->bind_param('ssis',$setName, $setNameStudent, $setMatriculaStudent, $setTime);
			//execute command
			$command->execute();
		}
	}
?>
<?php
	class Asesor
	{
		//atributes
		private $name;
		private $first_Name;
		private $phone;
		private $email;
		//private $nif;

		//getters and setters
		public function get_matricula() { return $this->matricula; }
		public function set_matricula($value) { $this->matricula = $value; }
		public function get_name() { return $this->name; }
		public function set_name($value) { $this->name = $value; }
		public function get_firstName() { return $this->first_Name; }
		public function set_firstName($value) { $this->first_Name = $value; }
		public function get_phone() { return $this->phone; }
		public function set_phone($value) { $this->phone = $value; }

		//constructor
		public function __construct()
		{
			if (func_num_args() == 0)
			{
				$this->name = '';
				$this->first_Name = '';
				$this->phone = '';
				$this->email = '';
			}
		}
		public static function set_asesor($setName, $setFirstName, $setPhone, $setEmail)
		{
			//get connection
			$connection = get_connection();
			//query
			$query = 'insert into Estadias.Asesor values(?,?,?,?)';
			//command
			$command = $connection->prepare($query);
			if ($command === false)
			{
				echo 'Error in query : '.$query;
				die;
			}
			//link parametters
			$command->bind_param('ssss',$setName, $setFirstName, $setPhone, $setEmail);
			//execute command
			$command->execute();
		}
	}
?>
<?php
	require_once('MODELS/connection_sql_server.php');
	class Asesor
	{
		//atributes
		private $id;
		private $name;
		private $first_Name;
		private $last_name;
		private $empresa;
		private $email;
		//private $nif;

		//getters and setters
		public function get_id() { return $this->id; }
		public function set_id($value) { $this->id = $value; }
		public function get_name() { return $this->name; }
		public function set_name($value) { $this->name = $value; }
		public function get_firstName() { return $this->first_Name; }
		public function set_firstName($value) { $this->first_Name = $value; }
		public function get_lastName() { return $this->last_name; }
		public function set_lastName($value) { $this->last_name = $value; }		
		public function get_empresa() { return $this->empresa; }
		public function set_empresa($value) { $this->empresa = $value; }
		public function get_email() { return $this->email; }
		public function set_email($value) { $this->email = $value; }

		//constructor
		public function __construct()
		{
			if (func_num_args() == 0)
			{
				$this->id = '';
				$this->name = '';
				$this->first_Name = '';
				$this->last_name = '';
				$this->empresa = '';
				$this->email = '';
			}
		}
		public static function set_asesor()
		{
			//get connection
			$connection = new SqlServerConnection();
			//query
			$query = sprintf('insert into asesor_empresarila values(?,?,?,?)');
			$connection->execute_non_query($query, array($this->id,
														 $this->name,
														 $this->first_Name,
														 $this->last_name,
														 $this->empresa,
														 $this->email));
			$connection->close();
		}
	}
?>
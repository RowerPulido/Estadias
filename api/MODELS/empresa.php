<?php
	require_once('connection.php');

	class Empresa
	{
		//atributes
		private $nif;
		private $name;
		private $position;

		//getters and setters
		public function get_nif() { return $this->nif; }
		public function set_nif($value) { $this->nif = $value; }
		public function get_name() { return $this->name; }
		public function set_name($value) { $this->name = $value; }
		public function get_position() { return $this->position; }
		public function set_position($value) { $this->position = $value; }

		//constructor
		public function __construct()
		{
			//0 arguments
			if (func_num_args() == 0) 
			{
				$this->nif = '';
				$this->name = '';
				$this->position = '';
			}
			
			if (func_num_args() == 3)
			{
				//read arguments
				$arguments = func_get_args();
				$this->nif = $arguments[0];
				$this->name = $arguments[1];
				$this->position = $arguments[2];
			}
		}
		public static function get_empresa()
		{
			//create lis of states
			$list = array();
			//get connection
			$connection = get_connection();
			//query
			$query = 'select id, nombre, giro from empresas;';
			//command
			$command = $connection->prepare($query);
			if ($command === false)
			{
				echo 'Error in query : '.$query;
				die;
			}
			//execute command
			$command->execute();
			//link columns to variables
			$command->bind_result($nif, $name,$position);
			//read data
			while($command->fetch())
			{
				//add empresas to list
				array_push($list, new Empresa($nif, $name,$position));
			}
			//return list of empresas
			return $list;
		}
		public static function set_empresa()
		{
			//get connection
			$connection = get_connection();
			//query
			$query = 'insert into Empresa values(?,?,?)';
			//command
			$command = $connection->prepare($query);
			if ($command === false)
			{
				echo 'Error in query : '.$query;
				die;
			}
			//link columns to variables
			$command->bind_param($nif, $name, $position);
			//execute command
			$command->execute();
		}
	}

?>
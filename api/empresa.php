<?php
	require_once('MODELS/connection_sql_server.php');

	class Empresa
	{
		//atributes
		private $nif;
		private $name;
		private $position;
		private $tel;
		private $direccion;
		private $email;
		//getters and setters
		public function get_nif() { return $this->nif; }
		public function set_nif($value) { $this->nif = $value; }
		public function get_name() { return $this->name; }
		public function set_name($value) { $this->name = $value; }
		public function get_position() { return $this->position; }
		public function set_position($value) { $this->position = $value; }
		public function get_tel() { return $this->tel; }
		public function set_tel($value) { $this->tel = $value; }
		public function get_direccion() { return $this->direccion; }
		public function set_direccion($value) { $this->direccion = $value; }
		public function get_email() { return $this->email; }
		public function set_email($value) { $this->email = $value; }


		//constructor
		public function __construct()
		{
			//0 arguments
			if (func_num_args() == 0) 
			{
				$this->nif = '';
				$this->name = '';
				$this->position = '';
				$this->tel = '';
				$this->direccion= '';
				$this->email = '';
			}
			
			if (func_num_args() == 6)
			{
				//read arguments
				$arguments = func_get_args();
				$this->nif = $arguments[0];
				$this->name = $arguments[1];
				$this->position = $arguments[2];
				$this->tel = $arguments[3];
				$this->direccion = $arguments[4];
				$this->email = $arguments[5];

			}
		}
		public static function get_empresa()
		{
			$list = array();
			//get connection
			$connection = new SqlServerConnection();
			try
			{
				//query
				$query = sprintf('select id, nombre, giro, telefono, direccion, email from empresas;');
				//command
				$data = $connection->execute_query($query);
				$found = odbc_num_rows($data) > 0;
				if (!$found)
				{
					echo 'Error in query : '.$query;
					die;
				}
				while(odbc_fetch_array($data))
				{
					//add empresas to list
					array_push($list, new Empresa(odbc_result($data, 'id'),
												  odbc_result($data, 'nombre'),
												  odbc_result($data, 'giro'),
												  odbc_result($data, 'telefono'),
												  odbc_result($data, 'direccion'),
												  odbc_result($data, 'email')));
				}
			}
			finally
			{
				$connection->close();
			}
			return $list;
		}
		public static function set_empresa()
		{
			//get connection
			$connection = new SqlServerConnection();
			//query
			$query = sprintf('insert into Empresa values(?,?,?,?,?,?)');
			$connection->execute_non_query($query, array($this->id,$this->name,$this->position,$this->tel,$this->direccion,$this->email));
			$connection->close();
		}
	}

?>
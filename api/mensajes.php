<?php
	/**
	* 
	*/
	require_once('MODELS/connection_sql_server.php');
	class Mensajes 
	{
		private $id;
		private $texto;
		private $destinatario;
		private $remitente;
		private $fecha_limite;
		
		public function get_text(){ return $this->texto; }
		public function set_text($value) { $this->texto = $value; }
		public function get_destinatario(){ return $this->destinatario; }
		public function set_destinatario($value) { $this->destinatario = $value; }
		public function get_remitente(){ return $this->remitente; }
		public function set_remitente($value) { $this->remitente = $value; }
		public function get_fechaLimite(){ return $this->fecha_limite; }
		public function set_fechaLimite($value) { $this->fecha_limite = $value; }

		function __construct()
		{
			if (func_num_args() == 0) 
			{
				$this->texto = '';
				$this->destinatario = '';
				$this->remitente = '';
				$this->fecha_limite = '';
			}
			if (func_num_args() == 1) 
			{
				
			}
		}
		public static function getMensaje($idUser)
		{
			$connection = new SqlServerConnection();
			$query = sprintf('select texto, remitente from [Usuario.mensajes] where remitente=\''.$idUser."' and fecha_limite < GETDATE()'");
			$data = $connection->execute_query($query);
			odbc_result($data, 'text');
			odbc_result($data, 'remitente');
		}
	}

?>
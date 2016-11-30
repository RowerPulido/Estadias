<?php
require_once('MODELS/connection_sql_server.php');
require_once('proyectoo.php');
	class Proyecto
	{
		//atributes
		private $id;
		private $nombre;
		private $descripcion;
		private $matricula;
		private $empresa_id;
		private $asesor_empresarial_id;
		private $objetivos;
		private $totalHoras;
		//getters and setters
		public function get_id() { return $this->id; }
		public function set_id($value) { $this->id = $value; }
		public function get_nombre_proyecto() { return $this->nombre; }
		public function set_nombre_proyecto($value) { $this->nombre = $value; }
		public function get_descripcion() { return $this->descripcion; }
		public function set_descripcion($value) { $this->descripcion = $value; }
		public function get_matricula() { return $this->matricula_student; }
		public function set_matricula($value) { $this->matricula_student = $value; }
		public function get_empresa_id() { return $this->empresa_id; }
		public function set_empresa_id($value) { $this->empresa_id = $value; }
		public function get_asesor() { return $this->asesor_empresarial_id; }
		public function set_asesor($value) { $this->asesor_empresarial_id = $value; }
		public function get_objetivos() { return $this->objetivos; }
		public function set_objetivos($value) { $this->objetivos = $value; }
		public function get_totalHoras() { return $this->totalHoras; }
		public function set_totalHoras($value) { $this->totalHoras = $value; }

		//constructor
		public function __construct()
		{
			if (func_num_args() == 0)
			{
				$this->id='';
				$this->name = '';
				$this->descripcion = '';
				$this->matricula_student = '';
				$this->empresa_id='';
				$this->asesor_empresarial_id='';
				$this->objetivos = '';
				$this->totalHoras = '';
			}
			if (func_num_args() == 4)
			{
				$args = func_get_args();
				$this->name = $args[0];
				$this->descripcion = $args[1];
				$this->empresa_id=$args[2];
				$this->asesor_empresarial_id=$args[3];
			}
			if (func_num_args() == 7)
			{
				$args = func_get_args();
				$this->id=$args[0];
				$this->name = $args[1];
				$this->descripcion = $args[2];
				$this->empresa_id=$args[3];
				$this->asesor_empresarial_id=$args[4];
				$this->objetivos = $args[5];
				$this->objetivos = $args[6];
			}
			
		}
		public static function set_proyecto($setName, $setNameStudent, $setMatriculaStudent, $setTime)
		{
			//get connection
			$connection = new SqlServerConnection();
			//query
			$query = sprintf('insert into Estadias.Proyecto values(?,?,?,?)');
			$connection->execute_non_query($query, array($setName,$setNameStudent,$setMatriculaStudent,$setTime));
			$connection->close();
		}
		
		public static function get_info_por_alumno($matricula)
		{
			$list = array();
			//get connection
			$connection = new SqlServerConnection();
			try
			{
				//query
				$query = sprintf('select p.nombre, p.descripcion, e.nombre, ae.nombre from proyectos p , asesor_empresarial ae , empresas e where p.alumno = \''.$matricula.'" and e.id = p.empresa and ae.id = p.asesor_empresarial');
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
				   array_push($list, new Proyecto($nombre, $descripcion, $empresa_id, $asesor_empresarial_id));
				   array_push($list, new Proyecto(odbc_result($list, 'nombre'),
				   								   odbc_result($list, 'descripcion'),
				   								   odbc_result($list, 'nombre'),
				   								   odbc_result($list, 'nombres'),
				   								   odbc_result($list, 'nombre'),
				   								   odbc_result($list, 'nombres'),))
				}
			}
			return $list;		
		}
		// METODO MAL
		public static function get_info_por_grupo($grupo)
		{
			$list = array();
			//get connection
			$connection = get_connection();
			//query
			$query = 'select p.nombre, p.descripcion, e.nombre, ae.nombres
			from proyectos p join asesor_empresarial ae join empresas e on p.grupo = "'.$grupo.'" and e.id = p.empresa and ae.id = p.asesor_empresarial';
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
			$command->bind_result($nombre, $descripcion, $empresa_id, $asesor_empresarial_id);
			//read data
			while($command->fetch())
			{
			   array_push($list, new Proyecto($nombre, $descripcion, $empresa_id, $asesor_empresarial_id));
			}
			return $list;		
		}
		
		public static function toJson($matricula)
		{
			$json='';
			$first1 = true;
			foreach(Proyecto::get_info_por_alumno($matricula) as $p)
			{
				if (!$first1) $json .= ','; else $first1 = false;
				$json = '
					{
						"nombre" : "'.$p->get_nombre_proyecto().'",
						"descripcion" : "'.$p->get_descripcion().'",
						"empresa" : "'.$p->get_empresa_id().'",
						"asesor_empresarial" : "'.$p->get_asesor().'"
					}';
			}
			if(!$first) $json.= '"No hay documentos por mostrar"';
		}
		
	}
?>
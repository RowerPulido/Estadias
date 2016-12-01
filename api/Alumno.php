<?php
require_once('MODELS/connection_sql_server.php');
	class Alumno
	{
		private $nombre;
		private $apellidoPaterno;
		private $apellidoMaterno;
		private $matricula;
		private $grupo;
		private $imagen;
		private $nombre_documento;
		private $estado;

		public function get_nombre(){ return $this->nombre; }
		public function set_nombre($value) { $this->nombre = $value; }

		public function get_apellidoPaterno(){ return $this->apellidoPaterno; }
		public function set_apellidoPaterno($value) { $this->apellidoPaterno = $value; }

		public function get_apellidoMaterno(){ return $this->apellidoMaterno; }
		public function set_apellidoMaterno($value) { $this->apellidoMaterno = $value; }

		public function get_matricula(){ return $this->matricula; }
		public function set_matricula($value) { $this->matricula = $value; }

		public function get_grupo(){ return $this->grupo; }
		public function set_grupo($value) { $this->grupo = $value; }
		
		public function get_imagen(){ return $this->imagen; }
		public function set_imagen($value) { $this->imagen = $value; }
		
		public function get_nombre_documento(){ return $this->nombre_documento; }
		public function set_nombre_documento($value) { $this->nombre_documento = $value; }
		
		public function get_estado(){ return $this->estado; }
		public function set_estado($value) { $this->estado = $value; }

		public function __construct()
		{
				//0 arguments
			if (func_num_args() == 0) 
			{
				$this->nombre = '';
				$this->apellidoPaterno = '';
				$this->apellidoMaterno = '';
				$this->matricula= '';
				$this->grupo= '';
				$this->imagen='';
			}
			if (func_num_args() == 1) 
			{
				$this->matricula= $args[0];
				get_alumno($this->matricula);
			}
			if(func_num_args() == 2)
			{
				$args = func_get_args();
				$this->nombre_documento=$args[0];
				$this->estado=$args[1];
			}
			if (func_num_args() == 5) 
			{
				$args = func_get_args();
				
				$this->nombre=$args[0];
				$this->apellidoPaterno=$args[1];
				$this->apellidoMaterno=$args[2];
				$this->grupo=$args[3];
				$this->imagen=$args[4];
				
			}
			if (func_num_args() == 6) 
			{
				$args = func_get_args();
				
				$this->nombre=$args[0];
				$this->apellidoPaterno=$args[1];
				$this->apellidoMaterno=$args[2];
				$this->matricula=$args[3];
				$this->grupo=$args[4];
				$this->imagen=$args[5];
			}
			
			if (func_num_args() == 7) 
			{
				$args = func_get_args();
				$this->nombre=$args[0];
				$this->apellidoPaterno=$args[1];
				$this->apellidoMaterno=$args[2];
				$this->grupo=$args[3];
				$this->imagen=$args[4];
				$this->nombre_documento=$args[5];
				$this->estado=$args[6];
			}
			
			if (func_num_args() == 8) 
			{
				$args = func_get_args();
				$this->nombre=$args[0];
				$this->apellidoPaterno=$args[1];
				$this->apellidoMaterno=$args[2];
				$this->matricula=$args[3];
				$this->grupo=$args[4];
				$this->imagen=$args[5];
				$this->nombre_documento=$args[6];
				$this->estado=$args[7];
				
			}
			
		}
		public static function get_all_Alumnos()
		{
			
			$list = array();
			//get connection
			$connection = new SqlServerConnection();
			//query
            try{
                $query = sprintf('select nombres, paterno, materno, matricula, grupo, imagen from 
                	[Alumno.Alumnos];');
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
                    array_push($list,new Alumno(odbc_result($data,'nombres'),
                                                odbc_result($data,'paterno'),
                                                odbc_result($data,'materno'),
                                                odbc_result($data,'matricula'),
                                                odbc_result($data,'grupo'),
                                                odbc_result($data, 'imagen')));
                }
            }
            finally
            {
				$connection->close();
            }
			return $list;
		}
     
   	 	public static function get_Alumno($matricula)
		{
			$list = array();
			//get connection
			$connection = new SqlServerConnection();
			try
			{
				//query
				$query = sprintf('select nombres, paterno, materno, matricula, grupo, imagen from 
					[Alumno.Alumnos] where matricula=\''.$matricula."'");
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
			       //add states to list
			       array_push($list,new Alumno(odbc_result($data,'nombres'),
	                                                odbc_result($data,'paterno'),
	                                                odbc_result($data,'materno'),
	                                                odbc_result($data,'matricula'),
	                                                odbc_result($data,'grupo'),
	                                                odbc_result($data, 'imagen')));
				}
			}
			finally
			{
				$connection->close();
			}
			return $list;
		}		  
		public static function get_Alumno_by_group($group)
		{
			$list = array();
			//get connection
			$connection = new SqlServerConnection();
			try
			{
				//query
				$query = sprintf('SELECT nombres, paterno, materno, matricula, grupo, imagen from 
					[Alumno.Alumnos] where grupo = \''.$group."'");
				//command
				$data = $connection->execute_query($query);
				$found = odbc_num_rows($data) > 0;
				if (!$found)
				{
				   echo 'Error in query : '.$query;
				   die;
				}
				//read data
				while(odbc_fetch_array($data))
				{
				   array_push($list,new Alumno(odbc_result($data,'nombres'),
                                                odbc_result($data,'paterno'),
                                                odbc_result($data,'materno'),
                                                odbc_result($data,'matricula'),
                                                odbc_result($data,'grupo'),
                                                odbc_result($data, 'imagen')));
				}
			}
			finally
			{
				$connection->close();
			}
			return $list;				  
		}
		
		public static function get_todos_alumnos_documentos()
		{
			$list = array();
			//get connection
			$connection = new SqlServerConnection();
			try
			{
				//query
				$query = sprintf('select a.nombres, a.paterno, a.materno, a.matricula ,a.grupo, a.imagen, t.name, d.status from [Alumno.alumnos] a, [Documento.documentos] d, 
					[Documento.typesofdocs] t where a.matricula = d.alumno and d.typeDocs = t.id');
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
				   array_push($list, new Alumno(odbc_result($data, 'nombres'),
				   								odbc_result($data, 'paterno'),
				   								odbc_result($data, 'materno'),
				   								odbc_result($data, 'matricula'),
				   								odbc_result($data, 'grupo'),
				   								odbc_result($data, 'imagen'),
				   								odbc_result($data, 'name'),
				   								odbc_result($data, 'status')));
				}
			}
			finally
			{
				$connection->close();
			}
			return $list;				  
		}
		
		
		public static function get_documentos_por_alumno($estado)
		{
			$list = array();
			//get connection
			$connection = new SqlServerConnection();
			try
			{
				//query
				$query = sprintf('select a.nombres, a.paterno, a.materno, a.matricula ,a.grupo, a.imagen, t.name, d.status from [Alumno.alumnos] a, [Documento.documentos] d, 
					[Documento.typesofdocs] t where a.matricula = d.alumno and d.id = t.id and d.status =\''.$estado."'");
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
					array_push($list, new Alumno(odbc_result($data, 'nombres'),
												 odbc_result($data, 'paterno'),
												 odbc_result($data, 'materno'),
												 odbc_result($data, 'matricula'),
												 odbc_result($data, 'grupo'),
												 odbc_result($data, 'imagen'),
												 odbc_result($data, 'name'),
												 odbc_result($data, 'satus')));
				}
			}
			finally
			{
				$connection->close();
			}
			return $list;		
		}
		public static function get_documentos_por_grupo($grupo)
		{
			$list = array();
			//get connection
			$connection = new SqlServerConnection();
			try
			{
				//query
				$query = sprintf('select a.nombres, a.paterno, a.maternvar, a.matricula ,a.grupo, a.imagen,t.name, d.status from [Alumno.alumnos] a, [Documento.documentos] d, 
					[Documento.typesofdocs] t where a.matricula = d.alumno and d.id = t.id and a.grupo=\''.$grupo."'");
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
				   array_push($list, new Alumno(odbc_result($data, 'nombres'),
												 odbc_result($data, 'paterno'),
												 odbc_result($data, 'materno'),
												 odbc_result($data, 'matricula'),
												 odbc_result($data, 'grupo'),
												 odbc_result($data, 'imagen'),
												 odbc_result($data, 'name'),
												 odbc_result($data, 'satus')));
				}
			}
			finally
			{
				$connection->close();
			}
			return $list;		
		}	
	}
?>
<?php
	class Doc
	{
		private $id;
		private $estado;
		private $nombre;
		private $ruta;
		private $fecha_upd;
		private $tipo;
		private $matricula;
		private $fecha_limit;
		
		public function get_id() { return $this->id; }
		public function set_id($valor) { $this->id = $valor; }
		
		public function get_estado() { return $this->estado; }
		public function set_estado($valor) { $this->estado = $valor; }
		
		public function get_nombre() { return $this->nombre; }
		public function set_nombre($valor) { $this->nombre = $valor; }
		
		public function get_ruta() { return $this->ruta; }
		public function set_ruta($valor) { $this->ruta = $valor; }
		
		public function get_tipo() { return $this->tipo; }
		public function set_tipo($valor) { $this->tipo = $valor; }
        
		public function get_fecha() { return $this->fecha_upd; }
		public function set_fecha($valor) { $this->fecha_upd = $valor; }		
		
		public function get_mat() { return $this->matricula; }
		public function set_mat($valor) { $this->matricula = $valor; }
		
		public function get_fecha_limit() { return $this->fecha_upd; }
		public function set_fecha_limit($valor) { $this->fecha_upd = $valor; }		
		
		public function __construct()
		{
			if(func_num_args()==0)
			{				
				$this->id=0;
				$this->tipo='';
				$this->nombre='';
			}
			if(func_num_args()==3)
			{				
				$args = func_get_args();
				$this->id=$args[0];
				$this->nombre=$args[1];
				$this->estado=$args[2];
			
			}
			
			if(func_num_args()==6)
			{                			
                require_once('connection.php');
	
                $connection=get_connection();
	
                $query = 'insert into docs values (?,?,?,?,?,?);';
                
                $command = $connection->prepare($query);
                
				$arguments = func_get_args();
	            
				$command->bind_param('iissds',$arguments[0],$arguments[1],$arguments[2],$arguments[3],$arguments[4],$arguments[5]);
	
			    if($command===false)
			    {
				    echo 'Error in query : '.$query;
				    die;
			    }	
			    $command->execute();
                
				$this->id = $arguments[0];
				$this->estado = $arguments[3];
				$this->matricula = $arguments[2];
				$this->ruta = $arguments[5];
				$this->fecha_upd = $arguments[4];
				$this->tipo = $arguments[1];
			}
			if(func_num_args()==7)
			{
				$arguments = func_get_args();			
				
				$this->id=$arguments[0];
				$this->nombre=$arguments[1];
				$this->tipo=$arguments[6];
				$this->ruta=$arguments[2];
				$this->estado=$arguments[3];
				$this->fecha_upd=$arguments[4];
				$this->matricula=$arguments[5];
			}
			if(func_num_args()==5)
			{
				$arguments = func_get_args();			
				
				$this->id=$arguments[0];
				$this->nombre=$arguments[1];	
				$this->estado=$arguments[2];
				$this->fecha_upd=$arguments[3];
				$this->ruta=$arguments[4];
			}
		}
        
        public function get_docs()
		{
            require_once('connection.php');
			//create lis of states
			$list = array();
			//get connection
			$connection = get_connection();
			//query
			$query = 'select d.id, name, ubicacion, status, fecha_actualizacion, alumno, type from documentos d join typesofdocs tod on d.type = tod.id;';
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
			$command->bind_result($id, $nombre, $ruta, $estado, $fecha_upd, $matricula, $tipo);
			//read data
			while($command->fetch())
			{
				array_push($list, new Doc($id, $nombre, $ruta, $estado, $fecha_upd, $matricula, $tipo));
			}
			//return list of cities
			return $list;
		}
		
		public function get_docs_alum($matricula)
		{
            require_once('connection.php');
			//create lis of states
			$list = array();
			//get connection
			$connection = get_connection();
			//query
			$query = 'select d.id, name, ubicacion, status, fecha_actualizacion from documentos d join typesofdocs tod on d.type = tod.id where alumno = ?;';
			//command
			$command = $connection->prepare($query);
			if ($command === false)
			{
				echo 'Error in query : '.$query;
				die;
			}
			
			$command->bind_param('s', $matricula);
			//execute command
			$command->execute();
			//link columns to variables
			$command->bind_result($id, $nombre, $ruta, $estado, $fecha_upd);
			//read data
			while($command->fetch())
			{
				array_push($list, new Doc($id, $nombre, $ruta, $estado, $fecha_upd));
			}
			//return list of cities
			return $list;
		}
		public function get_info($matricula)
		{
			require_once('connection.php');
			//create lis of states
			$list = array();
			//get connection
			$connection = get_connection();
			//query
			$query = 'select d.id, tod.name, d.status from documentos d join typesofdocs tod on d.type = tod.id where alumno = ?;';
			//command
			$command = $connection->prepare($query);
			if ($command === false)
			{
				echo 'Error in query : '.$query;
				die;
			}
			
			$command->bind_param('s', $matricula);
			//execute command
			$command->execute();
			//link columns to variables
			$command->bind_result($id, $nombre, $estado);
			//read data
			while($command->fetch())
			{
				array_push($list, new Doc($id, $nombre, $estado));
			}
			//return list of cities
			return $list;
		}
		public function get_info_por_alumno($matricula)
		{
			require_once('connection.php');
			//create lis of states
			$list = array();
			//get connection
			$connection = get_connection();
			//query
			$query = 'select d.id, tod.name, d.status, d.fecha_actualizacion, d.ubicacion from documentos d join typesofdocs tod on d.type = tod.id where d.alumno = ?;';
			//command
			$command = $connection->prepare($query);
			if ($command === false)
			{
				echo 'Error in query : '.$query;
				die;
			}
			
			$command->bind_param('s', $matricula);
			//execute command
			$command->execute();
			//link columns to variables
			$command->bind_result($id, $nombre, $estado, $fecha_upd, $ruta);
			//read data
			while($command->fetch())
			{
				array_push($list, new Doc($id, $nombre, $estado, $fecha_upd, $ruta));
			}
			//return list of cities
			return $list;
		}
	}	
?>
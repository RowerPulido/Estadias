<?php 

	require_once('connection_sql_server.php');

	Class Actividades{

		private $nombre;
		private $inicio;
		private $fin;

		public function set_nombre($value){$this->nombre=$value;}
		public function set_inicio($value){$this->inicio=$value;}
		public function set_fin($value){$this->fin=$value;}

		public function get_nombre(){return $this->nombre;}
		public function get_inicio(){return $this->inicio;}
		public function get_fin(){return $this->fin;}

		public function __construct(){

			if (func_num_args()==0) {
				# code...
			}

			if (func_num_args()==3) {
				$args=func_get_args();

				$this->nombre=$args[0];
				$this->inicio=$args[1];
				$this->fin=$args[2];
			}
		}

		public function getActsFromAlum($matricula){

			$list=array();

			$connection= new SqlServerConnection();
			$query=sprintf("select a.nombre,a.inicio,a.fin,p.alumno
				from estadia.Estadias e
				join estadia.proyectos p
				on e.proyecto=p.id
				join Estadia.Actividades a
				on a.proyecto=p.id
				where p.alumno='".$matricula."'
				order by a.inicio;");
			
			$data=$connection->execute_query($query);

			$found=odbc_num_rows($data)>0;
			if (!$found) {
				echo '"status" : 404, "descripcion" : "'.$query.'" }';
				die;
			}
			while(odbc_fetch_array($data))
			{
				array_push($list,new Actividades(
								odbc_result($data,'nombre'),
								odbc_result($data,'inicio'),
								odbc_result($data,'fin')));
			}

			$connection->close();
			return $list;
		}
	}

 ?>
<?php
require_once('MODELS/connection_sql_server.php');
	class Grupo
	{
		private $id;
		private $carrera;
		private $tutor;
		
		public function get_id(){ return $this->id; }
		public function set_id($value) { $this->id = $value; }

		public function get_carrera(){ return $this->carrera; }
		public function set_carrera($value) { $this->carrera = $value; }

		public function get_tutor(){ return $this->tutor; }
		public function set_tutor($value) { $this->tutor = $value; }

		public function __construct()
		{
				//0 arguments
			if (func_num_args() == 0) 
			{
				$this->id = '';
				$this->carrera = '';
				$this->tutor = '';				
			}
			if (func_num_args() == 1) 
			{
				$this->id= $args[0];
				get_grupo($this->id);
			}
			
			if (func_num_args() == 3) 
			{
				$args = func_get_args();
				$this->id=$args[0];
				$this->carrera=$args[1];
				$this->tutor=$args[2];				
			}
			
		}
		public static function get_all_Grupos()
		{
			
			$list = array();
			//get connection
			$connection = new SqlServerConnection();
			//query
            try{
                $query = sprintf('select id, carrera, tutor from Alumno.grupos;');
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
                    array_push($list,new Grupo(odbc_result($data,'id'),
                                                odbc_result($data,'carrera'),
                                                odbc_result($data,'tutor')));
                }
            }
            finally
            {
				$connection->close();
            }
			return $list;
		}
     
   	 	public static function get_Grupo($id)
		{
			$list = array();
			//get connection
			$connection = new SqlServerConnection();
			try
			{
				//query
                $query = sprintf('select id, carrera, tutor from Alumno.grupos where id = '.$id);
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
			       array_push($list,new Grupo(odbc_result($data,'id'),
	                                                odbc_result($data,'carrera'),
	                                                odbc_result($data,'tutor')));
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
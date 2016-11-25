<?php
header('Access-Control-Allow-Origin:*');
require_once('MODELS/connection_sql_server.php');

class Usertype
{
	private $id_type;
	private $description;

	public function set_id_type($value){$this->id_type=$value;}
	public function get_id_type(){return $this->id_type;}
	public function set_description($value){$this->description=$value;}
	public function get_description(){return $this->description;}

	function __construct()
	{
		if(func_num_args()==0)
		{
			$this->id_type='';
			$this->description='';
		}

		if (func_num_args()==1) 
		{
			$args=func_get_args();
			$connection = new SqlServerConnection();
			try
			{
			$query=sprintf('select id , description from typeofuser where id= \''.$args[0]."'");
			$data=$connection->execute_query($query);
			$found = odbc_num_rows($data) > 0;
			if (!$found)
			{
				echo 'Error in query : '.$query;
				die;
			}
			$this->id_type = odbc_result($data, 'id');
			$this->description = odbc_result($data, 'description');
			}
			finally
			{
				$connection->close();
			}
		} 
		
	}
}
?>

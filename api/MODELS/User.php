<?php 
header('Access-Control-Allow-Origin:*');
require_once('connection_sql_server.php');
require_once('UserType.php');
class User
{
	//Atributos
	private $id;
	private $user_type;
	private $password;

	
	//getters & setters
	public function get_id(){return $this->id;}
	public function set_id($value){$this->id=$value;}
	public function get_user_type(){return $this->user_type;}
	public function set_user_type($value){$this->user_type=$value;}
	public function set_password($value){$this->password=$value;}	

	public function __construct()
	{
		//0 arguments
		if (func_num_args() == 0)
		{
			$this->id='';
		}
		if (func_num_args()==2) {
			$args=func_get_args();
			$pswd=$args[1];
			$id=$args[0];
			//connection
			$connection= new SqlServerConnection();
			try
			{
				//query
				$query=sprintf('select id,type from usuarios where id=\''.$id.'" and password=\''.$pswd."'");
				//command
				$data= $connection->execute_query($query);
				$found = odbc_num_rows($data) > 0;
				if (!$found)
				{
					echo 'Error in query : '.$query;
					die;
				}
					$this->id=odbc_result($data, 'id');
					$user_tupe =new Usertype( dbc_result($data, 'type'));
					$this->user_type=$user_type;
				
			}
			finally
			{
				$connection->close();
			}
		} 
}
}
 ?>
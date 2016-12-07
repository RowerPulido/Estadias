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
	private $name;
	
	//getters & setters
	public function get_id(){return $this->id;}
	public function set_id($value){$this->id=$value;}
	public function get_user_type(){return $this->user_type;}
	public function set_user_type($value){$this->user_type=$value;}
	public function set_password($value){$this->password=$value;}	
	
	public function set_name($value){$this->name=$value;}
	public function get_name(){return $this->name;}
	
	public function __construct()
	{
		//0 arguments
		if (func_num_args() == 0)
		{
			$this->id='';
		}
		if (func_num_args()==2) {
			$args=func_get_args();
			$id=$args[0];
			$pswd=$args[1];
			//connection
			$connection= new SqlServerConnection();
			try
			{
				//query
				$query=sprintf('select id,tipo from Usuario.usuarios where id=\''.$id.'\' and password=HashBytes('."'sha1'".",".'\''.$pswd."');");
				
				//command
				$data= $connection->execute_query($query);
				$found = odbc_num_rows($data) > 0;
				if (!$found)
				{
					echo 'Error in query CLASE USER : '.$query;
					die;
				}
				$this->id = odbc_result($data, 'id');
				$this->user_type = new Usertype(odbc_result($data, 'tipo'));
			}
			finally
			{
				$connection->close();
			}
		}
		if (func_num_args()==3) 
		{
			$args=func_get_args();
			$id=$args[0];
			$pswd=$args[1];
			$user_type=$args[2];
			$connection= new SqlServerConnection();
			try
			{
				//query
				$query=sprintf('insert into Usuario.usuarios values (?,HashBytes('."'SHA1'".','.'?'.'),?);');
				$connection->execute_non_query($query,array($id,$pswd,$user_type));
				$connection->close();
			}
			finally
			{
				$connection->close();
			}
		}
	}
	public function idAndName(){
		$args=func_get_args();
		$this->id=$args[0];
		$this->name=$args[1];
		
	}
	public function get_all_users(){
		$connection=new SqlServerConnection();
		$query="select id,nombre from allusers";
		$list=array();
		$data = $connection->execute_query($query);
        $found = odbc_num_rows($data) > 0;
        if (!$found)
        {
           echo 'Error in query : '.$query;
           die;
        }
        while(odbc_fetch_array($data))
       {
			$u= new User();
			$u->idAndName(odbc_result($data,'id'), odbc_result($data,'nombre'));
           array_push($list,$u);
      	}
        
		$connection->close();
  
		return $list;
	}
	public function get_users_est(){
		$connection= new SqlServerConnection();
		$query="select matricula ,nombre from alusWithEst";
		$list=array();
		$data=$connection->execute_query($query);
		$found=odbc_num_rows($data)>0;
		if(!$found)
		{
			echo 'Error in query : '.$query;
			die;
		}
		while(odbc_fetch_array($data)){
			$u=new User();
			$u->idAndName(odbc_result($data,'matricula'),odbc_result($data,'nombre'));
			array_push($list,$u);
		}
		$connection->close();
		
		return $list;
	}
}
 ?>
<?php 
header('Access-Control-Allow-Origin:*');
require_once('connection.php');
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
			//query
			$query='select usr_id,usr_type from users where usr_id=? and usr_password=md5(?)';
			//connection
			$connection=get_connection();
			//command
			$command= $connection->prepare($query);
			if ($command === false)
			{
				echo 'Error in query : '.$query;
				die;
			}
			$command->bind_param('ss',$id,$pswd);
			//execute command
			$command->execute();
			//link columns to variables
			$command->bind_result($id,$type);
			//suelta resultados
			$command->fetch();
			//close command
			mysqli_stmt_close($command);
			$connection->close();
			$this->id=$id;
			$this->password=$args[1];
			$command->fetch();
			//close command
			mysqli_stmt_close($command);
			$connection->close();

			$user_type=new Usertype($type);
			$this->user_type=$user_type;
		} 
}
}
 ?>
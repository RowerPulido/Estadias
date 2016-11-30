<?php
header('Access-Control-Allow-Origin:*');
require_once('connection.php');

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
			$query='select usertype_id, description from usertype where usertype_id= ?';
			
			$connection=get_connection();

			$command=$connection->prepare($query);
			if ($command === false)
			{
				echo 'Error in query : '.$query;
				die;
			}
			$command->bind_param('s',$args[0]);
			$command->execute();
			$command->bind_result($this->id_type, $this->description);
			$command->fetch();
			mysqli_stmt_close($command);
			$connection->close();
		} 
		
	}
}
?>

<?php 
header('Access-Control-Allow-Origin:*');
require_once('MODELS/connection.php');
require_once('MODELS/User.php');
/*
	STATUS:
	0 -> SIN ERRORES
	1 -> USUARIO INEXISTENTE
	2-> ERROR en el query
 */

$user= $_POST['usr_id'];
$pswd=$_POST['usr_psw'];
$connection=get_connection();

$query='select usr_id, usr_password from users where usr_id = ? and usr_password=md5(?)';
$command=$connection->prepare($query);
if ($command === false)
			{
				$result='{"status" : 2 , "Descrition" : "Error in query : '.$query .'"}';
				echo $result;
				die;
			}

$command->bind_param('ss',$user,$pswd);
$command->execute();
$command->bind_result($id,$password);
$command->fetch();
$command->close();

	if ($id== '' && $password == '') 
	{
		echo $result='{"status" : 1 , "Descrition" : "User Not Found" }';
				die;
	}

$u= new User($id,$pswd);
echo '
	{ "status" : "0" ,
		 "User":
		 {
		 	"UserID" : "'.$u->get_id().'",
		 	"UserType" : 
		 					{
		 						"ID" : "'.$u->get_user_type()->get_id_type().'",
		 						"Description" : "'.$u->get_user_type()->get_description().'"
		 					}	
		 } 
	}';
 ?>

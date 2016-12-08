<?php 
<<<<<<< HEAD
header('Access-Control-Allow-Origin:*');
=======
header('Access-Control-Allow-Origin: *');
require_once('MODELS/connection_sql_server.php');
>>>>>>> parent of 590a9b9... asda
$id=$_POST['id'];
$matricula=$_POST['matricula'];
$target_path = "../docs/".$matricula.'/';
$target_path = $target_path .$id.'-'.$matricula.'.pdf';
if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
	{
	 echo '{"status" : 0,
	 		"Message" : "Upload Succesful",
<<<<<<< HEAD
	 		"Filename" : "'.$id.'-'.$matricula.'.pdf'.'"}';
=======
	 		"Filename" : "'.$id.'-'.$matricula.'.pdf" } ';

		$connection= new SqlServerConnection();
		$query = sprintf('update documento.documentos
					set status = '."'RECIBIDO'".'
					where id='.$id.' and alumno=\''.$matricula."'");
		$connection->execute_query($query);
		$connection->close();
>>>>>>> parent of 590a9b9... asda
	}
	else
	{
	echo '{ "status" : 1 , "Message" : "FAILED LOAD"}';
	}
 ?>
<?php 
header('Access-Control-Allow-Origin:*');
$id=$_POST['id'];
$matricula=$_POST['matricula'];
$target_path = "../docs/".$matricula.'/';
$target_path = $target_path .$id.'-'.$matricula.'.pdf';
if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
	{
	 echo '{"status" : 0,
	 		"Message" : "Upload Succesful",
	 		"Filename" : "'.$id.'-'.$matricula.'.pdf'.'"}';
	}
	else
	{
	echo '{ "status" : 1 , "Message" : "FAILED LOAD"}';
	}
 ?>
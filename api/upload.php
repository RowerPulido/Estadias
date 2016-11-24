<?php 
$target_path = "docs/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
	{
	 echo '{"status" : 0,
	 		"Message" : "Upload Succesful",
	 		"Filename" : "'.basename( $_FILES['uploadedfile']['name']).'"}';
	}
	else
	{
	echo '{ "status" : 1 , "Message" : "FAILED LOAD"}';
	}
 ?>
<?php
	require_once('MODELS/connection_sql_server.php');
	
	header('Access-Control-Allow-Origin:*');
	
	$correo = $_POST['email'];
	$tel = $_POST['tel'];
	$contra = $_POST['pass'];
	$contraSes = '123';
	$matricula = '12312';

	if(isset($correo) && isset($tel) && isset($contra) && isset($contraSes) && isset($matricula) ) 
	{
		if ($correo == '' && $tel =='' && $contra=='') 
		{
			echo $result='{"status" : 3 , "descripccion" : "Invalid parameters" }';
			die;
		}
		if ($contra == $contraSes) 
		{
			$connection = new SqlServerConnection();
			echo $result='{"status": 0, "descripccion" : "Datos Guardados"}';
			$query=sprintf('update contactoAlumno set email= ?, telefono= ? where idAlumno= ?;');
			$connection->execute_non_query($query,array($correo,$tel,$matricula));
			$connection->close();
		}
		else
		{
			echo $result='{"status" : 2, "descripccion" : "Constrasenas no coinciden"}';
			die;
		}
	}
	else
	{
		echo $result='{"status" : 3 , "descripccion" : "Invalid parameters" }';
				die;
	}
?>
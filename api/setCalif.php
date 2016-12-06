<?php
	require_once('MODELS/connection_sql_server.php');
	header('Access-Control-Allow-Origin:*');

	$pass = $_POST['pass'];
	$calif = $_POST['calif'];
	$passSess = $_POST['passSessPASS'];
	$matricula = $_POST['matriculaPASS'];
	$matAlum = $_POST['matriculaAlum'];
	if (isset($pass) && isset($calif) && isset($matricula) && isset($passSess) && isset($matAlum)) 
	{
		if ($pass=='' && $calif=='' && $matricula=='' && $passSess=='' && $matAlum=='') 
		{
			echo $result='{"status" : 4 , "descripccion" : "Invalid parameters" }';
				die;
		}
		if ($pass == $passSess) 
		{
			$connection = new SqlServerConnection();
			echo $result='{"status": 0, "descripccion" : "Calificacion ."}';
			$query = sprintf("insert into Calificacion.calificaciones values(?,?,0,0,0,0);");
			$connection->execute_non_query($query,array($matAlum,$calif));

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
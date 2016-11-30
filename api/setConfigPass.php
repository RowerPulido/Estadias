<?php
	require_once('MODELS/connection_sql_server.php');
	header('Access-Control-Allow-Origin:*');

	$pasActual = $_POST['passActual'];
	$pasRep = $_POST['passRep'];
	$pasNueva = $_POST['passNueva'];
	$passSess = $_POST['passSessPASS'];
	$matricula = $_POST['matriculaPASS'];
	if (isset($pasActual) && isset($pasRep) && isset($pasNueva) && isset($matricula) && isset($passSess)) 
	{
		if ($pasActual=='' && $pasRep=='' && $pasNueva=='' && $matricula=='' && $passSess=='') 
		{
			echo $result='{"status" : 4 , "descripccion" : "Invalid parameters" }';
				die;
		}
		if ($pasActual == $passSess && $pasRep == $passSess ) 
		{
			$connection = new SqlServerConnection();
			echo $result='{"status": 0, "descripccion" : "Contrasena Cambiada.."}';
			$query = sprintf('update usuarios set constrasenia= ? where id= ?;');
			$connection->execute_non_query($query,array($pasNueva,$matricula));
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
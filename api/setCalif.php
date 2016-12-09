<?php
	require_once('MODELS/connection_sql_server.php');
	header('Access-Control-Allow-Origin:*');

	$matricula = $_POST['mat'];
    $reng = $_POST['reng'];
	$calif1 = $_POST['in1'.$reng];
    /*
	$calif2 = $_POST['in2'.$reng];
	$calif3 = $_POST['in3'.$reng];
	$calif4 = $_POST['in4'.$reng];
    */

	if (isset($reng) && isset($calif1) && isset($matricula)) 
	{
		if ($reng=='' && $calif1=='' && $matricula=='') 
		{
			echo $result='{"status" : 4 , "descripccion" : "Invalid parameters" }';
				die;
		}
		$connection = new SqlServerConnection();
		echo $result='{"status": 0, "descripccion" : "Calificacion ."}';
		$query = sprintf("insert into Calificacion.calificaciones values(?,?,0,0,0,0);");
		$connection->execute_non_query($query,array($matricula,$calif1));

		$connection->close();
    }
	else
	{
		echo $result='{"status" : 3 , "descripccion" : "Invalid parameters" }';
				die;
	}
	
?>
<?php
	require_once('MODELS/connection_sql_server.php');
	header('Access-Control-Allow-Origin:*');

	$matricula = $_GET['matricula'];
	if (isset($matricula)) 
	{
		$connection = new SqlServerConnection();
		$query = sprintf(' select email,tel from tutores where id = \''.$matricula."';");
		$data = $connection->execute_query($query);
		$email = odbc_result($data, 'email');
		$telefono = odbc_result($data, 'tel');

		if($email=='' && $telefono=='' )
		{
			echo $result='{"status" : 1 , "Description" : "Data Not Found" }';
			die;
		}
		echo '
			{ "status": 0,
			  "email" : "'.$email.'",
			  "telefono":"'.$telefono.'"
			}';
	}
	else
	{
		echo $result='{"status" : 3 , "Descrition" : "Invalid parameters" }';
				die;
	}
?>
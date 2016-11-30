<?php
	require_once('MODELS/connection_sql_server.php');

	$matricula = $_GET['matricula'];

	if (isset($matricula)) 
	{
		$connection = new SqlServerConnection();
		$query = sprintf('select p1,p2,p3,p4,final from calificaciones where matricula=\''.$matricula."';");
		$data = $connection->execute_query($query);
		$p1 = odbc_result($data, 'p1');
		$p2 = odbc_result($data, 'p2');
		$p3 = odbc_result($data, 'p3');
		$p4 = odbc_result($data, 'p4');
		$final = odbc_result($data, 'final');
		if($p1=='' && $p2 == '' && $p3=='' && $final=='' )
		{
			echo $result='{"status" : 1 , "Description" : "Data Not Found" }';
			die;
		}
		echo '
			 {"status":0,
			  "parcial_1":'.$p1.',
			  "parcial_2":'.$p2.',
			  "parcial_3":'.$p3.',
			  "parcial_4":'.$p4.',
			  "final":'.$final.'
			}';
			
	}
	else
	{
		echo $result='{"status" : 3 , "Descrition" : "Invalid parameters" }';
				die;
	}
?>
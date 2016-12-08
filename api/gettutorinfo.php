<?php
	require_once('MODELS/connection_sql_server.php');
	header('Access-Control-Allow-Origin:*');

	$matricula = $_GET['matricula'];
	if (isset($matricula)) 
	{
		$connection = new SqlServerConnection();
		$query = sprintf('select t.numbres, t.paterno, t.materno, t.email, t.tel from Alumno.Tutores t join Alumno.grupos g on t.id = g.tutor join Alumno.Alumnos a on a.grupo = g.id where a.matricula=\''.$matricula.'\';');
		$data = $connection->execute_query($query);
		$nombre = odbc_result($data, 'numbres');
		$paterno = odbc_result($data, 'paterno');
		$materno = odbc_result($data, 'materno');
		$telefono = odbc_result($data, 'tel');
		$email = odbc_result($data, 'email');

		if($nombre=='' && $paterno=='' && $materno=='' && $email=='' && $telefono=='' )
		{
			echo $result='{"status" : 1 , "Description" : "Data Not Found" }';
			die;
		}
		echo '
			{ "status": 0,
			  "nombre" : "'.$nombre.'",
			  "paterno" : "'.$paterno.'",
			  "materno" : "'.$materno.'",
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
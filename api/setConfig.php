<?php
	require_once('MODELS/connection_sql_server.php');
	header('Access-Control-Allow-Origin:*');
	
	$correo = $_POST['email'];
	$tel = $_POST['tel'];
	$contra = $_POST['pass'];
	$contraSes = $_POST['passSess'];
	$matricula = $_POST['matricula'];
	$tipouser = $_POST['tipouser'];
	if(isset($correo) && isset($tel) && isset($contra) && isset($contraSes) && isset($matricula) && isset($tipouser) ) 
	{
		if ($correo == '' && $tel =='' && $contra=='' && $contraSes =='' && $matricula =='' && $tipouser == '') 
		{
			echo $result='{"status" : 3 , "descripccion" : "Invalid parameters" }';
			die;
		}
		if ($contra == $contraSes) 
		{
			if ($tipouser == 'ALU')
			{
				$connection = new SqlServerConnection();
				echo $result='{"status": 0, "descripccion" : "Datos Guardados Alumnos"}';
				$query=sprintf('update contactoAlumno set email= ?, telefono= ? where idAlumno= ?;');
				$connection->execute_non_query($query,array($correo,$tel,$matricula));
				$connection->close();
			}
				if ($tipouser == 'TUT') 
				{
					$connection = new SqlServerConnection();
					echo $result='{"status": 1, "descripccion" : "Datos Guardados Tutores"}';
					$query=sprintf('update tutores set email= ?, tel= ? where id= ?;');
					$connection->execute_non_query($query,array($correo,$tel,$matricula));
					$connection->close();
				}
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
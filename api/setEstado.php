<?php
	require_once('MODELS/connection_sql_server.php');
	header('Access-Control-Allow-Origin:*');

	$estado = $_POST['selects'];
    $matricula = $_POST['mat'];
	$doc = $_POST['doc'];

	if (isset($estado) && isset($matricula) && isset($doc)) 
	{
		if ($estado=='' && $matricula=='' && $doc=='') 
		{
			echo $result='{"status" : 4 , "descripccion" : "Invalid parameters" }';
				die;
		}
		$connection = new SqlServerConnection();
		echo $result='{"status": 0, "descripccion" : "Estado de Documento Cambiado"}';
		$query = sprintf("update Documento.Documentos set status=? where alumno = ? and typeDocs= ?;");
		$connection->execute_non_query($query,array($estado,$matricula,$doc));

		$connection->close();
    }
	else
	{
		echo $result='{"status" : 3 , "descripccion" : "Invalid parameters" }';
				die;
	}
	
?>
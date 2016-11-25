<?php
	//allow external access
	header('Access-Control-Allow-Origin:*');
	//use empresa
	require_once('MODELS/connection_sql_server.php');
	require_once('Alumno.php');
	$found=false;
	//start json
	$json = '{ "status" : 0, "alumnos" : [';
	//read data
	$first = true;
	foreach (Alumno::get_todos_alumnos_documentos() as $e) 
	{
		$found=true;
		if (!$first) $json .= ','; else $first = false;
		$json .= '{
                    "nombre" : "'.$e->get_nombre().'",
					"apellidoPaterno" : "'.$e->get_apellidoPaterno().'",
					"apellidoMaterno" : "'.$e->get_apellidoMaterno().'",
					"matricula" : "'.$e->get_matricula().'",
					"grupo" : "'.$e->get_grupo().'",
					"imagen" : "'.$e->get_imagen().'",
					"nombre_documento" : "'.$e->get_nombre_documento().'",
					"estado" : "'.$e->get_estado().'"
				}';
	}
	//end json
	$json .= '] }';
	if(!$found){echo '{ "status" : 1 , "message" : "students not found"}';die; }
	//display json
	echo $json;

?>
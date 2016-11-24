<?php
	//allow external access
	header('Access-Control-Allow-Origin:*');
	//use empresa
	require_once('connection.php');
	require_once('Alumno.php');
	$found=false;
	if(isset($_GET['group']) && $_GET['group']!='')
	{
		//start json
		$json = '{ "status" : 0, 
		"grupo" : "'.$_GET['group'].'",
		"alumnos" : [';
		//read data
		$first = true;
		foreach (Alumno::get_alumno_by_group($_GET['group']) as $e) 
		{
			$found=true;
			if (!$first) $json .= ','; else $first = false;
			$json .= '{
						"nombre" : "'.$e->get_nombre().'",
						"apellidoPaterno" : "'.$e->get_apellidoPaterno().'",
						"apellidoMaterno" : "'.$e->get_apellidoMaterno().'",
						"matricula" : "'.$e->get_matricula().'",
						"imagen" : "'.$e->get_imagen().'"
					}';
		}
		if(!$found){echo '{ "status" : 1 , "message" : "group not found"}';die; }
		//end json
		$json .= '] }';
		//display json
		echo $json;
	}
	echo '{ "status" : 2 , "message" : "invalid parameters"}';
?>
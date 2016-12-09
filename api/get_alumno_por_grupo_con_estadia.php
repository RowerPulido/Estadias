<?php
	header('Access-Control-Allow-Origin:*');
	require_once('Alumno.php');
	$tutor = $_GET['tutor'];
	$found=false;
	$json = '{ "status" : 0, "alumnos" : [';
	$first = true;
	foreach (Alumno::get_alumno_por_grupo_con_estadia($tutor) as $e) 
	{
		$found=true;
		if (!$first) $json .= ','; else $first = false;
		$json .= '{
                    "nombre" : "'.$e->get_nombre().'",
					"apellidoPaterno" : "'.$e->get_apellidoPaterno().'",
					"apellidoMaterno" : "'.$e->get_apellidoMaterno().'",
					"matricula" : "'.$e->get_matricula().'",
					"estado_estadia" : "'.$e->get_estado().'"
				}';
	}
	//end json
	$json .= '] }';
	if(!$found){echo '{ "status" : 1 , "message" : "students not found"}';die; }
	//display json
	echo $json;
?>

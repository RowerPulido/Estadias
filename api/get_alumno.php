<?php
	//allow external access
	header('Access-Control-Allow-Origin:*');
	//use empresa
	require_once('Alumno.php');
	require_once('connection.php');
	//start json
	if(isset($_GET['matricula']))
	{
	$json = '{ "status" : 0, "alumno" : [';
	//read data
	$first = true;
	$found=false;
	foreach (Alumno::get_Alumno($_GET['matricula']) as $e) 
	{
		$found=true;
		if (!$first) $json .= ','; else $first = false;
		$json .= '{
					"nombre" : "'.$e->get_nombre().'",
					"apellidoPaterno" : "'.$e->get_apellidoPaterno().'",
					"apellidoMaterno" : "'.$e->get_apellidoMaterno().'",
					"grupo" : "'.$e->get_grupo().'",
					"imagen" : "'.$e->get_imagen().'"
				}';
	}
	//end json
	$json .= '] }';
	//display json
		
		if(!$found){echo '{ "status" : 2 , "message" : "User not found"}';die; }
	echo $json;
	}
	   else
	   {
		   echo '{ "status" : 1 , "message" : "parameters not found"}';
	   }
/*$a= new Alumno();
$list=$a->get_Alumno('1234567890');
foreach(Alumno::get_Alumno(1234567890) as $e)
	{
		'{"nombre" : '.$e->get_nombre().'}';
	}*/
?>
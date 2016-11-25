<?php
	//allow external access
	header('Access-Control-Allow-Origin:*');
	//use empresa
	require_once('MODELS/connection_sql_server.php');
	require_once('Alumno.php');
	require_once('class_doc.php');
	$found=false;
	if(isset($_GET['matricula']) && $_GET['matricula']!='')
	{
		//start json
		$json = '{ "status" : 0,
		"matricula" : "'.$_GET['matricula'].'",
		';
		//read data
		$first = true;
		$first1 = true;
		
		foreach (Alumno::get_Alumno($_GET['matricula']) as $e) 
		{
			$found=true;
			if (!$first) $json .= ','; else $first = false;
			$json .= '
						"nombre" : "'.$e->get_nombre().'",
						"apellidoPaterno" : "'.$e->get_apellidoPaterno().'",
						"apellidoMaterno" : "'.$e->get_apellidoMaterno().'",
						"imagen" : "'.$e->get_imagen().'",
						"Documentos" : [';
										
										foreach(Doc::get_info_por_alumno($_GET['matricula']) as $d)
										{
											if (!$first1) $json .= ','; else $first1 = false;
											
											$json.='
												{
													"id" : "'.$d->get_id().'",
													"nombre" : "'.$d->get_nombre().'",
													"estado" : "'.$d->get_estado().'",
													"fecha_de_subida" : "'.$d->get_fecha().'",
													"ruta" : "'.$d->get_ruta().'"
												}';
										}
			$json.=']';
		$first1=true;			
		};
		$json .= ' }';
		
		if(!$found){echo '{ "status" : 1 , "message" : "Alumno no encontrado"}';die; }
		//end json
		
		//display json
		echo $json;
	}
	else
		echo '{ "status" : 2 , "message" : "invalid parameters"}';
?>
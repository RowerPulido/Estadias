<?php
	//allow external access
	header('Access-Control-Allow-Origin:*');
	//use empresa
	require_once('MODELS/connection_sql_server.php');
	require_once('Alumno.php');
	require_once('class_doc.php');
	$found=false;
	if(isset($_GET['grupo']) && $_GET['grupo']!='')
	{
		//start json
		$json = '{ "status" : 0, 
		"grupo" : "'.$_GET['grupo'].'",
		"alumnos" : [';
		//read data
		$first = true;
		$first1 = true;
		
		foreach (Alumno::get_Alumno_by_group($_GET['grupo']) as $e) 
		{
			$found=true;
			$found_doc = false;
			if (!$first) $json .= ','; else $first = false;
			$json .= '{
						"nombre" : "'.$e->get_nombre().'",
						"apellidoPaterno" : "'.$e->get_apellidoPaterno().'",
						"apellidoMaterno" : "'.$e->get_apellidoMaterno().'",
						"matricula" : "'.$e->get_matricula().'",
						"imagen" : "'.$e->get_imagen().'",
						"Documentos" : [';
								
										foreach(Doc::get_info($e->get_matricula())as $d)
										{
											if (!$first1) $json .= ','; else $first1 = false;
											$found_doc=true;
											$json.='
												{
													"id" : "'.$d->get_id().'",
													"nombre" : "'.$d->get_nombre().'",
													"estado" : "'.$d->get_estado().'"
												}';
										}
			if(!$found_doc) $json.= '"No hay documentos por mostrar"';
			$json.=']}';
		$first1=true;			
		};
		
		if(!$found){echo '{ "status" : 1 , "message" : "Grupo no encontrado"}';die; }
		//end json
		$json .= ' ]}';
		//display json
		echo $json;
	}
	else
		echo '{ "status" : 2 , "message" : "invalid parameters"}';
?>
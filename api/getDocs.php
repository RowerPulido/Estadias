<?php
	//allow external access
	header('Access-Control-Allow-Origin:*');	
	header('assept-encode:aplication/json');
	//use states
	require_once('class_doc.php');
	$found=false;
	//start json
	$json = '{ "status" : 0 , "documentos" : [ ';
	//read data
	$first = true;
	foreach(Doc::get_docs() as $d)
	{$found=true;
		if (!$first) $json .= ','; else $first = false;
		$json .= '{
					"id" : "'.$d->get_id().'",
					"nombre" : "'.$d->get_nombre().'",
					"estado" : "'.$d->get_estado().'",
					"ruta" : "'.$d->get_ruta().'",
					"fecha" : "'.$d->get_fecha().'",
					"matricula" : "'.$d->get_mat().'"
					}';
	}
	//end json
	$json .= '] }';
	if(!$found){echo '{ "status" : 2 , "message" : "DOCS not found"}';die; }
	//display json
	echo $json;
?>




<?php 
header('Access-Control-Allow-Origin:*');
	header('assept-encode:aplication/json');
	require_once('class_doc.php');

	$matricula=$_GET['matricula'];

	$found=false;
	$json='{ "status" : 0 , "docs" : [';

	$first=true;

	foreach (Doc::getDocsOfAlum($matricula) as $d) {
		if(!$first)$json.=',';else $first = false;
		$json.='{
			"id" : "'.$d->get_id().'",
			"name" : "'.$d->get_nombre().'",
			"status" : "'.$d->get_estado().'",
			"ubicacion" : "'.$d->get_ruta().'",
			"matricula" : "'.$d->get_mat().'"
		}';
	}
	$json.= '] }';
	if ($found) {
		# code...
		echo '{ "status" : 1 , "message" : "no se han encontrado para el" }';
	}

	echo $json;
 ?>
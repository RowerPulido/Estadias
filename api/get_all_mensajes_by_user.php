<?php 
	header('Access-Control-Allow-Origin:*');

	require_once('MODELS/mensajes.php');
	require_once('MODELS/connection_sql_server.php');

	$idUser=$_GET['userID'];
	$found=false;

	$json='{ "status" : 0 , "mensajes" : [';
	$first=true;
	foreach (Mensajes::getAllMyMessages($idUser) as $m) {
		
		$found=true;
		if (!$first) $json.=','; else $first=false;
		$json.='{
					"texto" : "'.$m->get_text().'",
					"remitente" : "'.$m->get_remitente().'"
		}';
	}
	$json.='] }';
	if(!$found){echo '{ "status" : 1 , "description" : "no messages found" }';die;}
	echo $json;
 ?>
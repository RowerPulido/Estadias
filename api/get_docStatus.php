<?php
	//allow external access
	header('Access-Control-Allow-Origin:*');
	//use empresa
	require_once('MODELS/connection_sql_server.php');
	require_once('class_doc.php');
	$matricula = $_GET['matricula'];
	$found=false;
	//start json
	$json = '{ "status" : 0, "Doc" : [';
	//read data
	$first = true;
	foreach (Doc::get_info($matricula) as $e) 
	{
		$found=true;
		if (!$first) $json .= ','; else $first = false;
		$json .= '{
                    "id" : "'.$e->get_id().'",
					"nombre" : "'.$e->get_nombre().'",
					"estado" : "'.$e->get_estado().'"			
				}';
	}
	//end json
	$json .= '] }';
	if(!$found){echo '{ "status" : 1 , "message" : "students not found"}';die; }
	//display json
	echo $json;

?>
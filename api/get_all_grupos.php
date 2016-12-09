<?php
	//allow external access
	header('Access-Control-Allow-Origin:*');
	//use empresa
	require_once('MODELS/connection_sql_server.php');
	require_once('Grupo.php');
	$found=false;
	//start json
	$json = '{ "status" : 0, "grupos" : [';
	//read data
	$first = true;
	foreach (Grupo::get_all_Grupos() as $g) 
	{
		$found=true;
		if (!$first) $json .= ','; else $first = false;
		$json .= '{
                    "id" : "'.$g->get_id().'",
					"carrera" : "'.$g->get_carrera().'",
					"tutor" : "'.$g->get_tutor().'"
					
				}';
	}
	//end json
	$json .= '] }';
	if(!$found){echo '{ "status" : 1 , "message" : "groups not found"}';die; }
	//display json
	echo $json;

?>
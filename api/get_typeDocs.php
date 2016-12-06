<?php
	//allow external access
	header('Access-Control-Allow-Origin:*');
	//use empresa
	require_once('MODELS/connection_sql_server.php');
	require_once('class_doc.php');
	$found=false;
	//start json
	$json = '{ "status" : 0, "Doc" : [';
	//read data
	$first = true;
	foreach (Doc::get_typeDocs() as $g) 
	{
		$found=true;
		if (!$first) $json .= ','; else $first = false;
		$json .= '{
                    "id" : "'.$g->get_id().'",
					"nombre" : "'.$g->get_nombre().'"
				}';
	}
	//end json
	$json .= '] }';
	if(!$found){echo '{ "status" : 1 , "message" : "docs not found"}';die; }
	//display json
	echo $json;
?>
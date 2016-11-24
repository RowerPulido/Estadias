<?php
	//allow external access
	header('Access-Control-Allow-Origin:*');
	//use empresa
	require_once('models/empresa.php');
	//start json
	$json = '{ "status" : 0, "Empresas" : [';
	//read data
	$first = true;
    $found=false;
	foreach (Empresa::get_empresa() as $e) 
	{
		
		if (!$first) $json .= ','; else $first = false;
		$json .= '{
					"NIF" : "'.$e->get_nif().'",
					"name" : "'.$e->get_name().'",
					"position" : "'.$e->get_position().'"
				}';
		$found=true;
	}
	//end json
	$json .= '] }';
	//display json
if(!$found){echo '{ "status" : 1 , "message" : "enterprises not found"}';die; }
	echo $json;
?>

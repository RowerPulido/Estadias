<?php	
header('Access-Control-Allow-Origin:*');
require_once('MODELS/connection_sql_server.php');
require_once('MODELS/User.php');


	$json='{ "status" : 0 , "users" : [';
	$first=true;
	foreach (User::get_users_est() as $u) {
		
		$found=true;
		if (!$first) $json.=','; else $first=false;
		$json.='{
					"id" : "'.$u->get_id().'",
					"nombre" : "'.$u->get_name().'"
		}';
	}
	$json.='] }';
	if(!$found){echo '{ "status" : 1 , "description" : "no users found" }';die;}
	echo $json;

?>
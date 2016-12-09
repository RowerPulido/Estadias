<?php 
	require_once('class_doc.php');
	require_once('MODELS/actividades.php');
	header('Access-Control-Allow-Origin:*');
	$matricula=$_GET['matricula'];
try{
	$json='{ "status" : 0 ,
			 "alumno" : "'.$matricula.'" ,
			  "actividades" : [ ';
	$first=true;
	foreach(Actividades::getActsFromAlum($matricula) as $a){
		if (!$first) $json.=',';else $first=false;

		$json.=
		'{

			"nombre" : "'.$a->get_nombre().'" ,
			"inicio" : "'.$a->get_inicio().'" ,
			"fin" : "'.$a->get_fin().'"
		}';	
	}
	$json.=' ] ,
	 "documentos" : [';
	 $first=true;
	foreach(Doc::getDocsOfAlum($matricula) as $d){
		if (!$first) $json.=',';else $first=false;
		$json.=
		'{
			"id" : "'.$d->get_id().'",
			"nombre" : "'.$d->get_nombre().'" ,
			"status" : "'.$d->get_estado().'"
			}';
	}
	$json.=' ] }';
	
	echo $json;
}

catch(Exception $ex){
	echo '"status" : 1 , "descripcion" : "error" }';
}
?>
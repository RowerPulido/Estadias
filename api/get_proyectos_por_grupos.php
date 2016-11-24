<?php
	//allow external access
	header('Access-Control-Allow-Origin:*');
	//use empresa
	require_once('connection.php');
	require_once('proyectoo.php');
	require_once('alumno.php');
	$found=false;
	if(isset($_GET['grupo']) && $_GET['grupo']!='')
	{
		//start json
		$json = '{ "status" : 0,
		"matricula" : "'.$_GET['grupo'].'",';
		//read data
		$first = true;
		$first1 = true;
		
		foreach (Alumno::get_Alumno($_GET['grupo']) as $e) 
		{
			$found=true;
			if (!$first) $json .= ','; else $first = false;
			$json .= '
						"nombre" : "'.$e->get_nombre().'",
						"apellidoPaterno" : "'.$e->get_apellidoPaterno().'",
						"apellidoMaterno" : "'.$e->get_apellidoMaterno().'",
						"grupo" : "'.$e->get_grupo().'",
						"imagen" : "'.$e->get_imagen().'",
						"Proyecto" : [';
										
										foreach(Proyecto::get_info_por_grupo($_GET['grupo']) as $p)
										{
											if (!$first1) $json .= ','; else $first1 = false;
											
											$json.='
												{
													"nombre" : "'.$p->get_nombre_proyecto().'",
													"descripcion" : "'.$p->get_descripcion().'",
													"empresa" : "'.$p->get_empresa_id().'",
													"asesor_empresarial" : "'.$p->get_asesor().'"
												}';
										}
							$json.=']';
		$first1=true;			
		};
		$json .= ' }';
		
		if(!$found){echo '{ "status" : 1 , "message" : "Alumno no encontrado"}';die; }
		//end json
		
		//display json
		echo $json;
	}
	else
		echo '{ "status" : 2 , "message" : "invalid parameters"}';
?>
<?php
	require_once('MODELS/connection_sql_server.php');
	
	$sms=$_GET['txt'];
	$to=$_GET['to'];
	$fLimite=$_GET['flimite'];
	$from=$_GET['from'];

	$connection=new SqlServerConnection();
	$query=sprintf("insert into usuario.mensajes (texto,destinatario,remitente,fecha_limite) values ('".$sms."','".$to."','".$from."','".$fLimite."');");
	$connection->execute_query($query);
		echo '{ "status" : 0 , "descripcion" : " Mensaje Enviado" }';


	$connection->close();
?>
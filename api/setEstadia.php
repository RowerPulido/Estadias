<?php 
require_once('MODELS/connection_sql_server.php');

$matricula=$_POST['matricula'];
$aluDir=$_POST['AlumDir'];
$aluTel=$_POST['AlumTel'];
$aluEmail=$_POST['AlumEmail'];
$empNom=$_POST['empresa'];
$area=$_POST['estArea'];
$nomAse=$_POST['AseNom'];
$patAse=$_POST['AsePat'];
$matAse=$_POST['AseMat'];
$cargoAse=$_POST['AseCar'];
$visita=$_POST['EstVis'];
$hora1=$_POST['EstHr1'];
$hora2=$_POST['EstHr2'];
$apoyo=$_POST['EstEco'];
$proNom=$_POST['proNom'];
$proObj=$_POST['ProObj'];
$inicioEst=$_POST['Inicio'];
$act1=$_POST['Act1'];
$durAct1=$_POST['Act1Dur'];
$act2=$_POST['Act2Dur'];
$durAct2=$_POST['Act2Dur'];
$act3=$_POST['Act3Dur'];
$durAct3=$_POST['Act3Dur'];
$act4=$_POST['Act4Dur'];
$durAct4=$_POST['Act4Dur'];
$act5=$_POST['Act5Dur'];
$durAct5=$_POST['Act5Dur'];

$connection= new SqlServerConnection();

$query=sprintf("exec ADD_ESTADIA ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?");

$connection->execute_procedure($query,array($matricula,$aluDir,$aluTel,$aluEmail,$empNom,$area,$nomAse,$patAse,$matAse,$cargoAse,$visita,$hora1,$hora2,
										   $apoyo,$proNom,$proObj,$inicioEst,$act1,$durAct1,$act2,$durAct2,$act3,$durAct3,$act4,$durAct4,$act5,$durAct5));

include('generateAlta.php');

?>
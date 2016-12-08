<?php
	$tipoDoc = $_GET['id'];
	$matri = $_GET['matricula'];
	header("Content-disposition: attachment; filename=../docs/".$matri."/".$tipoDoc."-".$matri."pdf");
	header("Content-type: application/pdf");
	readfile("../docs/".$matri."/".$tipoDoc."-".$matri."pdf");
?>
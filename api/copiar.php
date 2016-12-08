<?php
	$tipoDoc = $_GET['id'];
	$matri = $_GET['matricula'];
<<<<<<< HEAD
	header("Content-disposition: attachment; filename=../docs/".$matri."/".$tipoDoc."-".$matri."pdf");
	header("Content-type: application/pdf");
	readfile("../docs/".$matri."/".$tipoDoc."-".$matri."pdf");
=======
	header("Content-disposition: attachment; filename=../docs/".$matri."/".$tipoDoc."-".$matri.".pdf");
	header("Content-type: application/pdf");
	readfile("../docs/".$matri."/".$tipoDoc."-".$matri.".pdf");
>>>>>>> parent of 590a9b9... asda
?>
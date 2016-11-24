<?php 

include_once('models/connection.php');
$c= new Connection();

$query2="select * from borrame";

$args[0]=1;
$args[1]=1;
$result= $c->query($query2);
echo $result;/*
$result=$c->query_wor($query2);
echo implode(',', $result);
*/?>
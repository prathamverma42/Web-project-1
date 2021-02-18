<?php

if($_SERVER['REQUEST_METHOD'] == 'GET') header("location: 404.php");

$uid=$_POST["uid"];
$phone=$_POST["phone"];


echo "UID : ".$uid." , PHONE : ".$phone;
?>
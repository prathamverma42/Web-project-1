<?php
session_start();
include_once("connection.php");

$uid=$_SESSION["uid"];
//$uid=$_GET["uid"];
$query="select * from profiles where uid='$uid'";
$ary=[];
$result=mysqli_query($dbcon,$query);
while($row=mysqli_fetch_array($result))
    $ary[]=$row;
echo json_encode($ary);
?>
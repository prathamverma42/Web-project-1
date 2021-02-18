<?php
include_once("connection.php");
$city=$_GET["city"];
$query="select distinct medname from medicines where city='$city'";
$result=mysqli_query($dbcon,$query);
$ary=array();
while($row=mysqli_fetch_array($result))
    $ary[]=$row;
echo json_encode($ary);
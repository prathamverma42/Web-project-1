<?php
include_once("connection.php");
$x=$_GET["medname"];
$y=$_GET["city"];

$query="select * from medicines where city='$y' and medname='$x'";
$table=mysqli_query($dbcon,$query);
$ary=[];
while($row=mysqli_fetch_array($table))
    $ary[]=$row;
echo json_encode($ary);
?>
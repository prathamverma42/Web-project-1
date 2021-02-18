<?php
include_once("connection.php");

$query="select * from users";
$ary=[];
$result=mysqli_query($dbcon,$query);
while($row=mysqli_fetch_array($result))
    $ary[]=$row;

echo json_encode($ary);
?>
<?php
include_once("connection.php");
$uid=$_GET["uid"];
$query="select * from profiles where uid='$uid'";
$result=mysqli_query($dbcon,$query);
$ary=[];
while($row=mysqli_fetch_array($result))
    $ary[]=$row;
echo json_encode($ary);
?>
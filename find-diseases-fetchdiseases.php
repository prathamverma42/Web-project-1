<?php
include_once("connection.php");
$category=$_GET["category"];
$query="select distinct disease from diseases where category='$category'";
$result=mysqli_query($dbcon,$query);
$ary=[];
while($row=mysqli_fetch_array($result))
    $ary[]=$row;
echo json_encode($ary);
?>
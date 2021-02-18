<?php
include_once("connection.php");
$category=$_GET["category"];
$disease=$_GET["disease"];
$query="select * from diseases where category='$category' and disease='$disease'";
$result=mysqli_query($dbcon,$query);
$ary=[];
while($row=mysqli_fetch_array($result))
    $ary[]=$row;
echo json_encode($ary);
?>
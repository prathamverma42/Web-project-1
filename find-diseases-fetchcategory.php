<?php
include_once("connection.php");
$query="select distinct category from diseases";
$ary=array();
$result=mysqli_query($dbcon,$query);
while($row=mysqli_fetch_array($result))
    $ary[]=$row;

echo json_encode($ary);
?>
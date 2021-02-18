<?php
include_once("connection.php");
$query="select distinct city from medicines";
$table=mysqli_query($dbcon,$query);
$ary=[];
while($row=mysqli_fetch_array($table))
    $ary[]=$row;
echo json_encode($ary);
?>
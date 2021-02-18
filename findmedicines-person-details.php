<?php
include_once("connection.php");
$rid=$_GET["rid"];
$query="select * from medicines where rid='$rid'";
$result=mysqli_query($dbcon,$query);
$ary=[];
while($row=mysqli_fetch_array($result))
    $ary[]=$row;
echo json_encode($ary);
?>
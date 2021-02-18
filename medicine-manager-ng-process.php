<?php
include_once("connection.php");
session_start();
$uid=$_SESSION["uid"];
$query="select rid,medname,company,city from medicines where uid='$uid'";
$result=mysqli_query($dbcon,$query);
$ary=array();
while($row=mysqli_fetch_array($result))
    $ary[]=$row;
echo json_encode($ary);
//echo $uid;
?>
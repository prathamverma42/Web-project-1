<?php
session_start();
include_once("connection.php");
$uid=$_SESSION["uid"];
$pwd=$_GET["pwd"];
$query="select * from users where uid='$uid' and binary pwd='$pwd'";
mysqli_query($dbcon,$query);
$count=mysqli_affected_rows($dbcon);
if($count==0)
    echo "0";
else
    echo "1";
?>
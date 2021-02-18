<?php
session_start();
include_once("connection.php");
$uid=$_SESSION["uid"];
$pwd=$_GET["newpwd"];
$query="update users set pwd='$pwd' where uid='$uid'";
mysqli_query($dbcon,$query);
$count=mysqli_affected_rows($dbcon);
if($count==1)
    echo "1";
else
    echo "0";
?>
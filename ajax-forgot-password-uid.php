<?php
include_once("connection.php");
$uid=$_GET["uid"];
$query="select * from users where uid='$uid'";
mysqli_query($dbcon,$query);
$count=mysqli_affected_rows($dbcon);
if($count==1)
    echo "1";
else
    echo "0";
?>
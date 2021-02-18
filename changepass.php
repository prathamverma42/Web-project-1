<?php
include_once("connection.php");
$pwd=$_GET["new1"];
$uid=$_GET["uid"];
$query="update users set pwd='$pwd' where uid='$uid'";
mysqli_query($dbcon,$query);
$count=mysqli_affected_rows($dbcon);
if($count==1)
    echo "1";
else
    echo "0";
?>
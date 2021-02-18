<?php
include_once("connection.php");
$uid=$_GET["uid"];
$query="update users set status=1 where uid='$uid'";
mysqli_query($dbcon,$query);
if(mysqli_affected_rows($dbcon)==0)
    echo "Not Resumed";
else
    echo "Resumed";
?>
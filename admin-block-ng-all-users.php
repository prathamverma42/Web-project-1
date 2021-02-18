<?php
include_once("connection.php");
$uid=$_GET["uid"];
$query="update users set status=0 where uid='$uid'";
mysqli_query($dbcon,$query);
if(mysqli_affected_rows($dbcon)==0)
    echo "Not Blocked";
else
    echo "Blocked";
?>
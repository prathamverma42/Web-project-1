<?php
include_once("connection.php");
$uid=$_GET["uid"];
$query="delete from users where uid='$uid'";
mysqli_query($dbcon,$query);
$count=mysqli_affected_rows($dbcon);
if($count==0)
    echo "Record not found";
else
    echo "Record deleted";
?>
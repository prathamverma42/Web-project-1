<?php
include_once("connection.php");
$rid=$_GET["rid"];
$query="delete from medicines where rid=$rid";
mysqli_query($dbcon,$query);
if(mysqli_affected_rows($dbcon)==1)
    echo "1";
else
    echo "0";
?>
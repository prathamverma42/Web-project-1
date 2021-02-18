<?php

include_once("connection.php");
$uid=$_GET["uid"];
$query="select * from users where uid='$uid'";
$result=mysqli_query($dbcon,$query);
//======================
//why this $result give output in 1 or 0 why not "" ----  $msg=check error
//======================
$count=mysqli_affected_rows($dbcon);
//$count=mysqli_num_rows($result);
//======================
//they show same output
//======================

if($count==0)
    echo "Fine";    
else
    echo "Already Registered";
?>
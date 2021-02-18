<?php

include_once("connection.php");
session_start();
$uid=$_SESSION["uid"];
$category=$_POST["category"];
$dname=$_POST["dname"];
$available=$_POST["available"];
$symptoms=$_POST["symptoms"];
$recomm=$_POST["recomm"];
$sugg=$_POST["sugg"];
$ppic1_name=$_FILES["ppic1"]["name"];
$ppic1_tmpname=$_FILES["ppic1"]["tmp_name"];
$ppic2_name=$_FILES["ppic2"]["name"];
$ppic2_tmpname=$_FILES["ppic2"]["tmp_name"];

$query="insert into diseases values('$uid','$category','$dname','$available','$symptoms','$recomm','$sugg',CURDATE(),'$ppic1_name','$ppic2_name')";
mysqli_query($dbcon,$query);

$count=mysqli_affected_rows($dbcon);
if($count==1)
//    echo "Saved Successfully";
    header("location: path-ahead-dashboard.php?response="."You have succesfully share your information.");
else
    header("location: path-ahead-dashboard.php?response=".$err);
?>
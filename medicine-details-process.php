<?php

include_once("connection.php");
session_start();
$options=$_POST["options"];


if($options=="Donate")
    doDonate($dbcon);
else
    doSell($dbcon);

function doDonate($dbcon)
{

    
$uid=$_SESSION["uid"];
$query="select city from profiles where uid='$uid'";
$result=mysqli_query($dbcon,$query);
while($row=mysqli_fetch_array($result))
{
    $city=$row['city'];
}
    
    $medname=$_POST["medname"];
    $company=$_POST["company"];
    $expdate=$_POST["expdate"];
    $qty=$_POST["qty"];
    $type=$_POST["type"];
    $options=$_POST["options"];
    $query="insert into medicines(rid,uid,medname,company,expdate,qty,type,options,price,oprice,modepay,city) values (default,'$uid','$medname','$company','$expdate','$qty','$type','$options',default,default,default,'$city')";
    mysqli_query($dbcon,$query);
    $count=mysqli_affected_rows($dbcon);
    $msg=mysqli_error($dbcon);
    echo $msg;
    
    /*if($count==1)
                //header("location:path-ahead-dashboard.php?response=Information posted successfully");
    else
               // header("location:path-ahead-dashboard.php?response=").$msg;*/
}

function doSell($dbcon)
{
       
$uid=$_SESSION["uid"];
$query="select city from profiles where uid='$uid'";
$result=mysqli_query($dbcon,$query);
while($row=mysqli_fetch_array($result))
{
    $city=$row['city'];
}
    
    
    
    $medname=$_POST["medname"];
    $company=$_POST["company"];
    $expdate=$_POST["expdate"];
    $qty=$_POST["qty"];
    $type=$_POST["type"];
    $options=$_POST["options"];
    $price=$_POST["price"];
    $oprice=$_POST["oprice"];
    $modepay=$_POST["modepay"];
    $query="insert into medicines(rid,uid,medname,company,expdate,qty,type,options,price,oprice,modepay,city) values (default,'$uid','$medname','$company','$expdate','$qty','$type','$options','$price','$oprice','$modepay','$city')";
    mysqli_query($dbcon,$query);
        $count=mysqli_affected_rows($dbcon);
    if($count==1)
                        header("location:path-ahead-dashboard.php?response=Information posted successfully");
    else
                        header("location:path-ahead-dashboard.php?response=").$msg;
}
?>
<?php
session_start();
include_once("connection.php");
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];

$_SESSION["uid"]=$uid;
$ary=[];
$query="select * from users where uid='$uid' and pwd='$pwd'";
$result=mysqli_query($dbcon,$query);

$count=mysqli_num_rows($result);
/*
if($count==0)
{
    echo "1";
    return;
}
*/
while($row=mysqli_fetch_array($result))
{
    $ary[]=$row;
    $_SESSION["mob"]=$row['mobile'];
}
/*
$arry[]=json_encode($ary);
if($arry[0].status==1)
    echo "3";
else
    echo "2";

*/

if($count==0)
{
    echo "1";
}
else
{
    $query="select * from users where uid='$uid' and status=1";
    mysqli_query($dbcon,$query);
    $count=mysqli_affected_rows($dbcon);
    if($count==0)
        echo "2";
    else
        echo "3";
}


?>
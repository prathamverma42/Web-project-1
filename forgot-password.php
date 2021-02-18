<?php
include_once("SMS_OK_sms.php");
include_once("connection.php");
$uid=$_GET["uid"];
$OTP=$_GET["OTP"];
$query="select * from users where uid='$uid'";
$result=mysqli_query($dbcon,$query);
$ary=[];
while($row=mysqli_fetch_array($result))
{
    $pwd=$row['pwd'];
    $mobile=$row['mobile'];
        $ary[]=$row;

    /*
    $status=$row['status'];*/
    
}
$msg="Your One Time Password (OTP) : $OTP";
//echo $msg;


SendSMS($mobile,$msg);


/*
SensSMS($mobile,"Your OTP is : 123456");
*/
echo json_encode($ary);
//echo $msg;
?>
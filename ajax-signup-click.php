<?php
session_start();
include_once("connection.php");
include_once("SMS_OK_sms.php");
$uid=$_GET["signupuid"];
$_SESSION["uid"]=$_GET["signupuid"];
$pwd=$_GET["signuppwd"];
$mobile=$_GET["signupmobile"];
$_SESSION["mob"]=$_GET["signupmobile"];
if($uid=="" || $pwd=="" || $mobile=="")
{
    echo "Please fill all the Fields";
    return;
}
//echo "Hello$uid  $pwd  $mobile";
$query="insert into users(uid,pwd,mobile) values('$uid','$pwd','$mobile')";
mysqli_query($dbcon,$query);

if(mysqli_error($dbcon)=="")
    echo "You have successfully Signed Up";
else
    echo mysqli_error($dbcon);

$msg="Thanks For Signing Up to Our Website
User Id: $uid
Password: $pwd
Please save this for future use.";

$a=SendSMS($mobile,$msg);
//echo $a;
?>
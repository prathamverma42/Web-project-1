<?php

include_once("connection.php");
session_start();

$uid=$_SESSION["uid"];
$name=$_POST["name"];
$gender=$_POST["gender"];
$contact=$_SESSION["mob"];
$address=$_POST["address"];
$city=$_POST["city"];
$_SESSION["city"]=$city;
$state=$_POST["state"];
$pin=$_POST["pin"];
$acard=$_POST["acard"];
$dob=$_POST["dob"];
$email=$_POST["email"];
$ppic=$_FILES["ppic"]["name"];
$tmpname=$_FILES["ppic"]["tmp_name"];
$change=0;

echo "$uid $name $gender $contact $address $city $state $pin $acard $dob $email $ppic";
return;

if($ppic==""){
    $query="update profiles set name='$name', gender='$gender', contact='$contact',address='$address', city='$city',state='$state',pin='$pin',acard='$acard',dob='$dob',email='$email' where uid='$uid'";  
}
else{
    $query="update profiles set name='$name', gender='$gender', contact='$contact',address='$address', city='$city',state='$state',pin='$pin',acard='$acard',dob='$dob',email='$email',ppic='$ppic' where uid='$uid'";                
    $change=1;
}

mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);

if($msg==""){
}        
else{
    echo $msg;
    return;        
}

if($change==1){
           header("location:path-ahead-dashboard.php?response=Record updated with new pic");
}
else{
    header("location:path-ahead-dashboard.php?response=Record updated without new pic");
}
        
?>

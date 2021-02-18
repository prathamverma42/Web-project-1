<?php
include_once("connection.php");
session_start();
$btn=$_POST["btn"];
if($btn=="Save")
    doSave($dbcon);
else
    doUpdate($dbcon);

function doSave($dbcon)
{
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
    //echo "$uid $name $gender $contact $address $city $state $pin $acard $dob $email $ppic";
    $query="insert into profiles values('$uid','$name','$gender','$contact','$address','$city','$state','$pin','$acard','$dob','$email','$ppic')";
    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
    //echo $msg;
    //$count=mysqli_affected_rows($dbcon);
    //echo $count;
    if($msg=="")
    {
        header("location:path-ahead-dashboard.php?response=You have successfully saved your profile");
        move_uploaded_file($tmpname,"uploads/".$ppic);
        //echo "Saved Successfully";
    }
        
    else
    {
        echo $msg;
     //   header("location:path-ahead-dashboard.php?response").$msg;        
    }

   // header('location: users-dash.php');
}
function doUpdate($dbcon)
{
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
   //echo "$uid $name $gender $contact $address $city $state $pin $acard $dob $email $ppic";
    if($ppic=="")
    {
    $query="update profiles set name='$name', gender='$gender', contact='$contact',address='$address', city='$city',state='$state',pin='$pin',acard='$acard',dob='$dob',email='$email' where uid='$uid'";  
        mysqli_query($dbcon,$query);
    }
    else
    {
    $query="update profiles set name='$name', gender='$gender', contact='$contact',address='$address', city='$city',state='$state',pin='$pin',acard='$acard',dob='$dob',email='$email',ppic='$ppic' where uid='$uid'";                
                 $change=1;
    //move_uploaded_file($tmpname,"uploads/".$ppic);
   //unlink("uploads/".$ppic);
    }
    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
    /*if($msg=="")
    {
//        echo "You have successfully updated your profile";
        //header("location:path-ahead-dashboard.php?response=You have successfully updated your profile");
         
    else
        echo $msg;*/
    if($change==1)
        header("location:path-ahead-dashboard.php?response=Record updated with new pic");
    else
        header("location:path-ahead-dashboard.php?response=Record updated without new pic");
            
   

}

?>
<?php
include_once("connection.php");
$qty=$_GET["qty"];
$options=$_GET["options"];
$rid=$_GET["rid"];
if($options=="Donate")
{
    $query="update medicines set qty='$qty', options='$options', price=default, oprice=default, modepay=default where rid='$rid'";
    mysqli_query($dbcon,$query);
        $msg=mysqli_error($dbcon);

    if($msg=="")
        echo "1";
    else
        echo $msg;
            
}
else
{
    $price=$_GET["price"];
    $oprice=$_GET["oprice"];
    $modepay=$_GET["modepay"];
    $query="update medicines set qty='$qty', options='$options', price='$price', oprice='$oprice', modepay='$modepay' where rid='$rid'";
    mysqli_query($dbcon,$query);
        $msg=mysqli_error($dbcon);
    if($msg=="")
        echo "1";
    else
        echo $msg;
            
    
}
?>

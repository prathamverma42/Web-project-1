<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JS/jquery-1.8.2.min.js"></script>
    <style>
        #dash {
            width: 650px;
            height: 230px;
            border-radius: 10px 10px 10px 10px;
            border: 2px solid black;
            margin: auto;
            margin-top: 110px;
            background-color: white;
        }
        body{
            background-image: url(pics/discordbg.jpg);
        }

        .abc {
            margin-top: 40px;
        }

    </style>
    <script>
        $(document).ready(function(){
           $("#btn").click(function(){
              //alert();
             location.href="users-dash.php";  
           });
        });
    </script>
</head>

<body>
    <div id="dash">
       <br><br>
        <div><center>
<h4>
            <?php
$response=$_GET["response"];
echo $response;

?>
            <br>
            Click button to go to Dashboard</h4>
        </center></div>
        <center>
            <button class="btn btn-primary abc" id="btn">
                Dashboard
            </button>
        </center>

    </div>
</body>

</html>

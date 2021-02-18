<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JS/jquery-1.8.2.min.js"></script>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        #main-div {
            width: 80%;
            height: 450px;
            box-shadow: 0px 0px 10px 1px black;
            margin: auto;
            margin-top: 15%;
        }

        #left {
            width: 70%;
            height: inherit;
            box-shadow: 0px 0xp 10px 5px red;
            z-index: 2;
            float: left;
        }

        #right {
            width: 30%;
            height: inherit;
            box-shadow: 0px 0xp 10px 5px green;
            z-index: 3;
            float: right;
        }
        #logineye{
            float: right;
            margin-top: -34px;
            margin-right: 4px;
            transform: scale(1.2);
            border-radius: 10%;
}

    </style>
</head>

<body>
    <div id="main-div">
        <div id="left">
            <div class="form-group">
                <label>Uid</label>
                <input type="text" class="form-control" id="loginuid" name="loginuid">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="loginpwd" name="loginpwd">
                <button id="logineye"><i class="fa fa-eye" aria-hidden="true"></i></button>
            </div>
        </div>
        <div id="right">

        </div>
    </div>
</body>

</html>

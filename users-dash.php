<!DOCTYPE html>
<html lang="en">
<?php session_start();
    if(!isset($_SESSION["uid"])){
        header("location:index.php");
    }
    ?>

<head>
   
    <meta charset="UTF-8">

    <title>UserDash</title>
    
    <link rel="icon" href="pics/Logo2.png" type="image/icon type" width="50">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="js/jquery-1.8.2.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<style>
    
    #abc {
        font-family: sans-serif;
        color: deepskyblue;
        font-size: 35px;
    }

    #welcomeuid {
        font-size: 25px;
        float: right;
    }

    body {
        margin: 0;
        padding: 0;
        background-image: url(pics/userdashbg1.png);
    }

    #card4 {
        margin: auto;
        font-size: 120px;
        color: mediumseagreen;
        margin-top: 10px;
    }

    #abcd {
        float: right;
        color: white;
        margin-left: auto;
        margin-right: 30px;
        font-size: 30px;
    }

    .card {
        box-shadow: 0px 0px 10px 1px black;
        border-radius: 10px 10px;
                transition: ease all 0.5s;

    }

    .card:hover {
        transform: scale(1.1);
        transition: ease all 0.5s;
        border-radius: 0px 0px;
    }

    .cardbg {
        background-color: ghostwhite;
    }

</style>

<script>
    
    $(document).ready(function() {
        
        $("#oldpwd").blur(function() {
            var pwd = $(this).val();
            $.get("ajax-change-password.php?pwd=" + pwd, function(response) {
                if (response == 0) {
                    $("#chkpwd").html("Password does not Match");
                    $("#chkpwd").css("color", "red");
                    /*j1 = 0;*/
                }
                if (response == 1) {
                    $("#chkpwd").html("");
                }
            });
        });

        $("#pwdbtn").click(function() {
            var oldpwd = $("#oldpwd").val();
            var newpwd = $("#newpwd").val();
            var confirmpwd=$("#confirmpwd").val();
            if(pwdchkvalid==0)
                {
                    alert("Password should full fill all criteria");
                    return;
                }
            if(newpwd!=confirmpwd)
                {
                    alert("Both passwords should match");
                    return;
                }    

            if (oldpwd == "" || newpwd == "") {
                alert("Please fill the fields");
            } else if (oldpwd == newpwd) {
                alert("New password should be different");
                $("#chkerr1").html("");
                $("#chkerr2").html("");
            } else {
                $.get("changepassword.php?newpwd=" + newpwd, function(response) {
                    if (response == 0) {
                        alert("Password not updated");
                    }
                    if (response == 1) {
                        alert("Password updated successfully!");
                        $("#oldpwd").val("");
                        $("#newpwd").val("");
                        $("#confirmpwd").val("");
                        $("#chkerr1").html("");
                        $("#chkerr2").html("");
                        window.location = "users-dash.php";
                    }
                });
            }
        });
        var pwdchkvalid=1;
        $("#newpwd").keyup(function() {
            var a = $("#newpwd").val();
            var b = $("#confirmpwd").val();
                        
            var r = /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
            
            if (r.test(a) == false) {
                var msg="Must contain at least one number, one Uppercase, one Lowercase and must be of length >= 8";
                pwdchkvalid=0;
                $("#chkerr1").html(msg).css("color", "black");
                $("#confirmpwd").prop("disabled", true);
            } else {
                $("#chkerr1").html("").css("color", "green");
                $("#confirmpwd").prop("disabled", false);
                pwdchkvalid=1;
            }

            if (b != "") {
                if (a == b) {
                    $("#chkerr1").html("");
                }
                if (a != b) {
                    $("#chkerr1").html("Not Matched");
                    $("#chkerr1").css("color", "red");
                                        $("#chkerr2").html("");

                }
            }
        });
        
        $("#confirmpwd").keyup(function() {
            var a = $("#newpwd").val();
            var b = $("#confirmpwd").val();
            //alert(a);
            //alert(b);
            if (a != "") {
                if (a == b) {
                    $("#chkerr2").html("");
                }
                if (a != b) {
                    $("#chkerr2").html("Not Matched");
                    $("#chkerr2").css("color", "red");
                                        $("#chkerr1").html("");
                }
            }
        });

        $("#logoutbtnyes").click(function() {
            window.location = "logout.php";
        });

        
    });

</script>

<!-- Commented code in JQUERY -->
 <!--/*
        
        $("#newpwd").keyup(function(){
            var oldpwd=$("#oldpwd").val();
            var newpwd=$("#newpwd").val();
            if(newpwd==oldpwd)
                $("#chkerr1").html("New Password should be different").css("color","red");
            else
                $("#chkerr1").html("");
        });
        
        $("#confirmpwd").keyup(function(){
            var oldpwd=$("#oldpwd").val();
            var newpwd=$("#confirmpwd").val();
            if(newpwd==oldpwd)
                $("#chkerr2").html("New Password should be different").css("color","red");
            else
                $("#chkerr2").html("");
        });
        
        if(resp=="No")
        {
        alert();
        $("#samplemodal").attr("data-dismiss","true");
        }
        var respbool = confirm("R u sure?");
            if (respbool == true) {
                window.location = "logout.php";
            } else {
                alert("Not done");
            }
        });
        */-->
        
<body class="userdash">

    <!--================== NAVBAR ==================-->

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <img src="pics/Logo2.png" width=100px>
        <h2 style="color: white; margin-left: -10px">
            CareAll.com
        </h2>
        <div id="abcd">
            <center>
                <p>
                    Welcome
                    <font color="wheat">
                        <?php  echo $_SESSION["uid"]; ?>
                    </font>
                </p>
            </center>
        </div>
    </nav>

    <!--================== Userdash cards ==================-->
    
    <div class="container userdash mt-5">
        <div class="row mt-5">

            <!--========== CARD-1 ==========-->

            <div class="col-md-3 ">
                <div class="card border border-dark cardbg">
                    <i class="fa fa-user-md" id="card4" aria-hidden="true"></i>
                    <div class="card-body">
                        <h5 class="card-title">Complete Profile</h5>
                        <a href="user-profile-front.php" class="btn btn-info">Go somewhere</a>
                    </div>
                </div>
            </div>

            <!--========== CARD-2 ==========-->

            <div class="col-md-3">
                <div class="card border border-dark cardbg">
                    <i class="fa fa-recycle" id="card4" aria-hidden="true"></i>
                    <div class="card-body">
                        <h5 class="card-title">Unused Medicine</h5>
                        <a href="medicine-details.php" class="btn btn-info">Go somewhere</a>
                    </div>
                </div>
            </div>

            <!--========== CARD-3 ==========-->

            <div class="col-md-3">
                <div class="card border border-dark cardbg">
                    <i class="fa fa-medkit" id="card4" aria-hidden="true"></i>
                    <div class="card-body">
                        <h5 class="card-title">Medicine Manager</h5>
                        <a href="medicine-manager.php" class="btn btn-info">Go somewhere</a>
                    </div>
                </div>
            </div>

            <!--========== CARD-4 ==========-->

            <div class="col-md-3">
                <div class="card border border-dark cardbg">
                    <i class="fa fa-shopping-cart" id="card4" aria-hidden="true"></i>
                    <div class="card-body">
                        <h5 class="card-title">Buy Medicine</h5>
                        <a href="findmedicines.php" class="btn btn-info">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>

        <!--========== CARD-5 ==========-->

        <div class="row mt-5">
            <div class=" col-md-3">
                <div class="card border border-dark cardbg">
                    <i class="fa fa-hospital-o" id="card4" aria-hidden="true"></i>
                    <div class="card-body">
                        <h5 class="card-title">Disease Info</h5>
                        <a href="disease-share-front.php" class="btn btn-info">Go somewhere</a>
                    </div>
                </div>
            </div>

            <!--========== CARD-6 ==========-->

            <div class="col-md-3">
                <div class="card border border-dark cardbg">
                    <i class="fa fa-search" id="card4" aria-hidden="true"></i>
                    <div class="card-body">
                        <h5 class="card-title">Common Disease</h5>
                        <a href="find-common-disease.php" class="btn btn-info">Go somewhere</a>
                    </div>
                </div>
            </div>

            <!--========== CARD-7 ==========-->

            <div class="col-md-3">
                <div class="card border border-dark cardbg">
                    <i class="fa fa-key" id="card4" aria-hidden="true"></i>
                    <div class="card-body">
                        <h5 class="card-title">Change Password</h5>
                        <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#pwdmodal" data-dismiss="modal">Go Somewhere</button>
                    </div>
                </div>
            </div>

            <!--========== CARD-8 ==========-->

            <div class="col-md-3">
                <div class="card border border-dark cardbg">
                    <i class="fa fa-sign-out" id="card4" aria-hidden="true"></i>
                    <div class="card-body">
                        <h5 class="card-title">Logout Session</h5>
                        <button class="btn btn-info" data-toggle="modal" data-target="#samplemodal" data-dismiss="modal">Go somewhere</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--================== PASSWORD MODAL ==================-->

    <div class="modal fade" id="pwdmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control" id="oldpwd" name="oldpwd" required>
                            <span id="chkpwd"></span>
                        </div>
                        <div class="form-group">
                            <label>New password</label>
                            <input type="password" class="form-control" id="newpwd" name="newpwd" required>
                            <span id="chkerr1"></span>
                        </div>
                        <div class="form-group">
                            <label>Confirm password</label>
                            <input type="password" class="form-control" disabled id="confirmpwd" name="confirmpwd" required>
                            <span id="chkerr2"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span id="chknewoldpwd"></span>
                        <button type="button" class="btn btn-outline-info" id="pwdbtn" name="pwdbtn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--================== LOGOUT MODAL ==================-->

    <div class="modal fade" id="samplemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content container">
                <h5 class="modal-title mt-3">
                    LOGOUT
                </h5>
                <br>
                Are you sure you want to logout?
                <br>
                <br>
                <br>
                <div class="modal-footer form-row">
                    <label id="logoutbtn" class="btn btn-outline-dark" value="No" data-dismiss="modal" name="logoutbtn offset-md-2">Cancel</label>
                    <button id="logoutbtnyes" class="btn btn-outline-danger offset-md-1" value="Yes" name="logoutbtnyes">Log Out</button>
                    <br>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en" class="theme-dark">

<head>
    <meta charset="UTF-8">

    <title>CareAll</title>

    <link rel="stylesheet" type="text/css" href="indexpage.css">

    <link rel="icon" href="pics/Logo2.png" type="image/icon type" width="50">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="JS/jquery-1.8.2.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href='https://fonts.googleapis.com/css?family=Alegreya SC' rel='stylesheet'>

    <style>
        body {
            background-color: var(--bodycolor);
        }

    </style>

    <script>
        $(document).ready(function() {
        if (isTogglerVisible()) {
            $($('.themeBtn')[1]).attr('class', 'themeBtn d-none');
            $("#copyrightspan").attr('class', 'd-none');
            $("#copyrightspan").attr('class', 'offset-md-2');
        } else {
            $($('.themeBtn')[0]).attr('class', 'themeBtn d-none');
            $("#copyrightspan").attr('class', 'd-none');
            $("#copyrightspan").attr('class', 'offset-md-3');
        }


         var uidvalid=1;
        //Signup Blur
        $("#signupuid").blur(function() {
            //alert();
            var uid = $("#signupuid").val();
            if(uid=="")
                {
                    return;
                }
            $.get("ajax-signup-blur.php?uid=" + uid, function(response) {
                if (response == "Already Registered") {
                    $("#signupuidspan").html("That username is taken. Try another");
                    $("#signupuidspan").css("color", "red");
                    uidvalid=1;
                } else {
                    //uidvalid=1;
                    $("#signupuidspan").html("");
                    $("#signupuidspan").css("color", "green");
                    uidvalid=0;
                }
            });
        });
        //======================
        //Do we have to give different id to the signup and login input type text/password
        //======================
        //To see password
        $("#signupeye").mouseenter(function() {
            $("#signuppwd").attr("type", "text");
        });
        $("#signupeye").mouseleave(function() {
            $("#signuppwd").prop("type", "password");
        });
        // var signupvalid=0;
        //Signup Click
        $("#signupbtn").click(function() {
            //alert();
            /*  var uid = $("#signupuid").val();
              var pwd = $("#signuppwd").val();
              var mobile = $("#signupmobile").val();
              $.get("ajax-signup-click.php?uid=" + uid + "&pwd=" + pwd + "&mobile=" + mobile, function(response) {
                  //alert(response);
                  $("#signupresponse").html(response).css("color", "green");
              });*/
            if(j1 || j2 || j3 || j4)
                {
                    alert("Please Enter a valid password");
                    return;
                }
            if(uidvalid)
                {
                    alert("Enter a different id");
                    return;
                }
            if(mobilepwd)
                {
                    alert("Enter a valid mobile number");
                    return;
                }
            

            var queryString = $("#signup-form").serialize();
            //==========================
            //How to check the empty entrie with the help of serialize function
            //==========================

            /*if(queryString=="" || !pwdvalid )
                alert("nvklsdnvlaknbk");
            else*/
            //alert(queryString);

            //if(uidvalid && pwdvalid)
            //   signupvalid=1;

            //alert(signupvalid);
            $.get("ajax-signup-click.php?" + queryString, function(response) {
                if (response == "Please fill all the Fields") {
                    //alert(response);
                    alert("Please fill all the Fields");
                    //                    window.location = "path-ahead-signup.php?response=" + response;

                    //$("#signupresponse").html(response).css("color", "red");
                } else
                    window.location = "path-ahead-signup.php?response=" + response;

                //                        $("#signupresponse").html(response).css("color", "green");
            });
            //window.location = "user-profile-frontpage-signup.php";
        });
        //======================
        //model does not stop after alert box click
        //======================
        // var pwdvalid=0;
        //Password validations
        var j1 = 1,
            j2 = 1,
            j3 = 1,
            j4 = 1;
        $("#signuppwd").keyup(function() {
            
            
var myInput = document.getElementById("signuppwd");
var number = document.getElementById("Num-div");
var length = document.getElementById("char-div");

    
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("chk-btn");
    length.classList.add("chk2-btn");
      j1=0;
  } else {
    length.classList.remove("chk2-btn");
    length.classList.add("chk-btn");
      j1=1;
  }
    
  // Validate lowercase letters
  var lowerCaseLetters = /[!@#$%^&*]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
   $("#spcl-div").removeClass("chk-btn").addClass("chk2-btn");
      j2=0;
      
  } else {
         $("#spcl-div").removeClass("chk2-btn").addClass("chk-btn");
      j2=1;
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    $("#Upp-div").removeClass("chk-btn").addClass("chk2-btn");
      j3=0;
  } else {
          $("#Upp-div").removeClass("chk2-btn").addClass("chk-btn");
      j3=1;
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("chk-btn");
    number.classList.add("chk2-btn");
      j4=0;
  } else {
    number.classList.remove("chk2-btn");
    number.classList.add("chk-btn");
      j4=1;
  }
  
            
        });/*
        //Blur Signup Password
        $("#signuppwd").blur(function() {
            if (j1 && j2 && j3 && j4) {
                pwdvalid = 1;
                $("#signupbtn").prop("disabled", false);
                $("#signuppwdspan").html("");
            } else {
                $("#signuppwdspan").html("Please fulfil all conditions");
                $("#signuppwdspan").css("color", "red");
            }
        });*/
        var mobilepwd=1;
        //Signup Mobile password
        $("#signupmobile").keyup(function() {
            //for email:
            //var r=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/   ;

            var r = /^[6-9]{1}[0-9]{9}$/;
            var mob = $(this).val();
            if (mob.length == 0)
                {
/*                    Its blank..*/
                $("#mobspan").html("").css("color", "red");
            mobilepwd=1;
                    
                }
            else if (r.test(mob) == true)
                {
/*                    Its ok*/
                $("#mobspan").html("").css("color", "green");
            mobilepwd=0;
                    
                }
            else
                {
                $("#mobspan").html("Invalid data").css("color", "red");
            mobilepwd=1;
                    
                }
        });
        /*$("#signupmobile").blur(function()
	  {
                 var r = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

					//var r=/^[6-9]{1}[0-9]{9}$/;
					var mob=$("#signupmobile").val();
					
					if(r.test(mob)==false || mob.length>=10 || mob.length<=10)
							{
								$("#mobspan").html("Invalid Mobile number").css("color","red");
							}
						else
						{
						$("#mobspan").html("okay").css("color","green");
						}
				});
            
            */ //login Click
        $("#loginbtn").click(function() {
            // alert();
            var sentuid = $("#loginuid").val();
            var sentpwd = $("#loginpwd").val();
            //alert("Hello"+uid+"bye"+pwd);
            $.getJSON("json-login-click.php?uid=" + sentuid + "&pwd=" + sentpwd, function(response) {

                if (response == "1")
                    alert("Invalid Uid and Password ");
                else if (response == "2")
                    alert("Status Blocked");
                else
                    window.location = "users-dash.php";

            });
        });

        //To see password
        $("#logineye").mouseenter(function() {
            $("#loginpwd").attr("type", "text");
        });
        $("#logineye").mouseleave(function() {
            $("#loginpwd").prop("type", "password");
        });
        $("#forgotmodel").on('shown.bs.modal', function() {
            $("#loginmodal").modal('hide');
        });
        var OTP = '';
        $("#sentotp").click(function() {
            $("#chkfuid").html("");


            var uid = $("#forgotpwduid").val();
            var url = "ajax-forgot-password-uid.php?uid=" + uid;
            $.get(url).then(okFx, notokFx);

            function okFx(response) {
                if (response == 0)
                    $("#chkfuid").html("Enter valid uid").css("color", "red");
                else {

                    var digits = '0123456789';
                    OTP = '';
                    for (let i = 0; i < 6; i++) {
                        OTP += digits[Math.floor(Math.random() * 10)];
                    }

                    alert("Your OTP is : " + OTP);

                    var url1 = "forgot-password.php?uid=" + uid + "&OTP=" + OTP;
                    $.getJSON(url1).then(okFx1, notokFx1);

                    function okFx1(response) {
                        //alert(response);
                        //alert("Password sent successfully to " + response[0].mobile);
                        //alert(JSON.stringify(response));
                    }

                    function notokFx1(response) {
                        alert(response);
                    }
                }

            }

            function notokFx(response) {
                alert(response);
            }

        });

        $("#enteredOTP").keyup(function() {
            var newOTP = $("#enteredOTP").val();
            //alert();
            //alert(newOTP);
            if (newOTP === OTP) {
                //alert();
                $("#newpwd").prop("disabled", false);
            } else {
                $("#newpwd").prop("disabled", true);
            }
        });





        $("#newpwd").keyup(function() {
            var r = /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;

            var pwd = $("#newpwd").val();

            if (r.test(pwd) == false) {
                var msg="Must contain at least one number, one Uppercase, &nbsp; &nbsp;&nbsp; &nbsp; one Lowercase and must be of length >= 8";
                $("#emailHelp1").html(msg).css("color", "black");
                $("#confirmpwd").prop("disabled", true);
            } else {
                $("#emailHelp1").html("").css("color", "green");
                $("#confirmpwd").prop("disabled", false);
            }
        });
        // var forgotpwd=0;
        $("#confirmpwd").keyup(function() {
            var new1 = $("#newpwd").val();
            var old1 = $("#confirmpwd").val();
            if (new1 == old1) {
                $("#emailHelp2").html("").css("color", "green");
                //forgotpwd=1;
            } else {
                $("#emailHelp2").html("Not Matched").css("color", "red");
                //forgotpwd=0;
            }
        });
        $("#sendsmsbtn").click(function() {
                var uid = $("#forgotpwduid").val();
                var new1 = $("#newpwd").val();
                var old1 = $("#confirmpwd").val();
                if (uid == "" || new1 == "" || old1 == "") {
                    alert("Please fill all the fields.");
                    //return;
                }
                if (new1 != old1)
                    alert("Both Passwords should match");
                else {
                    var url = "changepass.php?new1=" + new1 + "&uid=" + uid;
                    $.get(url).then(okFx, notokFx);

                    function okFx(response) {
                        if (response == "1") {
                            var msg = "Password Updated" + "\r\n" + "Click Ok To login";
                            alert(msg);
                            window.location = "index.php";
                        } else {
                            alert("Password not updated");
                        }
                    }
                    function notokFx(error) {
                        alert(error);
                    }
                }

                });
        
        
        
        
        });
        // function to set a given theme/color-scheme
        function setTheme(themeName) {
            localStorage.setItem('theme', themeName);
            document.documentElement.className = themeName;
        }

        // function to toggle between light and dark theme
        function toggleTheme() {
            if (localStorage.getItem('theme') == 'theme-dark') {
                setTheme('theme-light');
            } else {
                setTheme('theme-dark');
            }
        }

        // Immediately invoked function to set the theme on initial load
        (function() {
            if (localStorage.getItem('theme') == 'theme-dark') {
                setTheme('theme-dark');
                document.getElementById('slider-me').checked = false;
            } else {
                setTheme('theme-light');
                document.getElementById('slider-me').checked = true;

            }
        })();
        /*
                        background: white url('https://i.ibb.co/7JfqXxB/sunny.png');
            background: white url('https://i.ibb.co/FxzBYR9/night.png');
        */

        function isOpened() {
            return $("#navbarSupportedContent").is(":visible");

        }

        function isTogglerVisible() {
            return $("#toggler").is(":visible");

        }

        function checktoggler() {
            var tbtns = $('.themeBtn');
            console.log(tbtns);
            if (isTogglerVisible()) {
                $(tbtns[1]).attr('class', 'mr-5 themeBtn d-none');
                $(tbtns[0]).attr('class', 'mr-5 themeBtn');
                $("#copyrightspan").attr('class', 'd-none');
                $("#copyrightspan").attr('class', 'offset-md-2');
            } else {
                $(tbtns[0]).attr('class', 'mr-5 themeBtn d-none');
                $(tbtns[1]).attr('class', 'mr-5 themeBtn');
                $("#copyrightspan").attr('class', 'd-none');
                $("#copyrightspan").attr('class', 'offset-md-3');
            }
        }

    </script>

</head>

<body id="bodybg" onresize="checktoggler()">

    <!--================== NAVBAR ==================-->

    <nav class="navbar navbar-expand-lg navbar-light sticky-top" id="topnav">
        <div class="mr-auto">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <img src="pics/Logo2.png" width=100px><a class="navbar-brand" href="#">
                <h2>CareAll.com</h2>
            </a>

        </div>

        <div class="mr-5 themeBtn" id="topbtn">
            <center>
                <label id="switch" class="switch">
                    <input type="checkbox" onchange="toggleTheme()" id="slider-me">
                    <span class="slider-me round"></span>
                </label>
            </center>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 10px;">
            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link hvr-overline-from-center" id="headref" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link hvr-overline-from-center" id="headref" href="#services">Services <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link hvr-overline-from-center" id="headref" href="#developers">About Us <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link hvr-overline-from-center" id="headref" href="#reachus">Reach Us <span class="sr-only">(current)</span></a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0 ml-auto mr-5">
                <a type="button" class="btn btn-outline-success" id="indexsignup" data-toggle="modal" data-target="#signupmodal">SignUp</a>
                &emsp;
                <button type="button" class="btn btn-outline-primary" id="indexlogin" data-toggle="modal" data-target="#loginmodal">Login</button>
            </form>

        </div>


        <div class="mr-5 themeBtn" id="topbtn">
            <center>
                <label id="switch" class="switch">
                    <input type="checkbox" onchange="toggleTheme()" id="slider-me">
                    <span class="slider-me round"></span>
                </label>
            </center>
        </div>


    </nav>

    <!--================== CAROUSEL PART ==================-->

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="pics/med1.jpg" width="100%" height="700" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="pics/med3.png" width="100%" height="700" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="pics/med2.jpg" width="100%" height="700" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!--================== OUR SERVICES ==================-->

    <div class="row rowcol mt-4">
        <div class="col-md-10 offset-md-1  text-center h3" id="services" style="line-height: 2">OUR SERVICES</div>
    </div>
    <div class="form-row">
        <div class="card-group" id="aboutcards">
            <div class="card col-md-3" id="cardbody">
                <img src="undraw_medical_care_movn%20(1).svg" class="card-img-top" id="cardimg" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Unused Medicine</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card col-md-3" id="cardbody">
                <img src="undraw_medicine_b1ol%20(2).svg" class="card-img-top" id="cardimg" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Common Diseases</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
            <div class="card col-md-3" id="cardbody">
                <img src="undraw_empty_cart_co35%20(2).svg" class="card-img-top" id="cardimg" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Donate/Sell Medicines</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
            </div>
        </div>
    </div>

    <!--===================== MEET THE DEVELOPERS =====================-->

    <div class="row rowcol mt-4">
        <div class="col-md-10 offset-md-1  text-center h3" id="developers" style="line-height: 2">DEVELOPERS</div>
    </div>
    <div class="form-row" id="profilecards">
        <div class="card mt-3" id="bgcard">
            <div class="row g-0">
                <div class="col-md-4 mt-3" id="profileimgcard">
                    <img src="pics/nika1234.jpg" id="pic" width="100%" alt="No Image">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Developed By:-</h5>
                        <p class="card-text" style="line-height:2">
                            Pratham Verma <br>
                            2nd Year COE <br>
                            Thapar University <br>
                            pverma_be19@thapar.edu<br>
                            9888626142
                        </p>
                    </div>
                    <div>
                        &emsp;
                        <a href="https://www.facebook.com/pratham.verma.7370/" target="_blank"><i class="fa fa-facebook-square" style="font-size:32px" id="handles" aria-hidden="true"></i></a>&emsp;
                        <a href="https://www.instagram.com/pratham6864/" target="_blank"><i class="fa fa-instagram" style="font-size:32px" id="handles" aria-hidden="true"></i></a>&emsp;
                        <a href="https://www.linkedin.com/in/pratham-verma-bb44a61a6/" target="_blank"><i class="fa fa-linkedin-square" style="font-size:32px" id="handles" aria-hidden="true"></i></a>&emsp;
                        <a href="https://github.com/prathamverma42" target="_blank"><i class="fa fa-github" style="font-size:32px" id="handles" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3" id="bgcard">
            <div class="row g-0">
                <div class="col-md-4 mt-3" id="profileimgcard">
                    <img src="pics/SIR.jpeg" id="pic" width="100%" alt="No Image">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Under the Guidance:-</h5>
                        <p class="card-text" style="line-height:2">
                            Rajesh Bansal <br>
                            Author of Real Java <br>
                            Bangalore Computers <br>
                            bcebti@gmail.com <br>
                            98722-46056
                        </p>
                    </div>
                    <div>
                        &emsp;
                        <a href="https://www.facebook.com/rajesh.scjp" target="_blank"><i class="fa fa-facebook-square" style="font-size:32px" id="handles" aria-hidden="true"></i></a>&emsp;
                        <a href="https://www.instagram.com/author_rajesh_bansal/" target="_blank"><i class="fa fa-instagram" style="font-size:32px" id="handles" aria-hidden="true"></i></a>&emsp;
                        <a href="https://www.linkedin.com/in/rajesh-scjp-bansal-8a87251a/" target="_blank"><i class="fa fa-linkedin-square" style="font-size:32px" id="handles" aria-hidden="true"></i></a>&emsp;
                        <a href="" target="_blank"><i class="fa fa-github" style="font-size:32px" id="handles" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===================== REACH US  =====================-->

    <div class="row rowcol mt-4">
        <div class="col-md-10 offset-md-1  text-center h3" id="reachus" style="line-height: 2">REACH US</div>
    </div>
    <div class="mapdiv" id="mapbg">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3446.6046872047627!2d75.83634225081823!3d30.248347681719252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3910511a5e718f7f%3A0x845af2cdf66215b6!2sSanju%20Studio!5e0!3m2!1sen!2sin!4v1606913175629!5m2!1sen!2sin" height="500px;" width="100%" frameborder="0" style="border:0;  " allowfullscreen="" aria-hidden="false" tabindex="0" id="map">
        </iframe>
    </div>

    <!--===================== COPYRIGHT BAR =====================-->

    <div class="col-md-12" id="copycolor">
        <span class="offset-md-2" style="font-size:30px;"><img src="pics/Logo2.png" width="75">CareAll.com</span>
        <span class="offset-md-2" id="copyrightspan" style="font-size:20px;">&copy; Copyright 2020 | Developed with &#10084;</span>
    </div>

    <!--===================== SIGNUP MODAL =====================-->

    <div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="form-row" id="signupcss">
                    <div class="container">
                        <div class="mt-3">
                            <center>
                                <h3 class="modal-title" id="exampleModalLabel">Create an account</h3>
                            </center>
                        </div>
                        <form id="signup-form">
                            <div class="form-group">
                                <label>Uid</label>
                                <br>
                                <span id="signupuidspan"></span>
                                <input type="text" class="form-control" id="signupuid" name="signupuid">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <br>
                                <span id="signuppwdspan"></span>
                                <input type="password" class="form-control" id="signuppwd" name="signuppwd">
                                <button id="signupeye"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                <div id="myntra">
                                    <div class="chk-btn" id="char-div">8 Characters</div>
                                    <div class="chk-btn" id="spcl-div">1 Special</div>
                                    <div class="chk-btn" id="Upp-div">1 Uppercase</div>
                                    <div class="chk-btn" id="Num-div">1 Numeric</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <span id="mobspan"></span>
                                <input type="text" class="form-control" id="signupmobile" name="signupmobile" required>
                            </div>
                            <span id="signupresponse"></span>
                            <button type="button" style="line-height:2" class="btn col-md-12" id="signupbtn" name="signupbtn">Continue</button>
                            <p><a data-toggle="modal" data-target="#loginmodal" data-dismiss="modal" id="signupregistercolor" style="cursor:pointer">Already have an account?</a></p>
                            <p style="font-size:12px">By registering you agree to CareAll's <font style="cursor:pointer" id="signupregistercolor">Terms of Service</font> and <font style="cursor:pointer" id="signupregistercolor">Privacy Policy.</font>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===================== LOGIN MODAL =====================-->

    <div class="modal fade mt-5" id="loginmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="form-row" id="logincss">
                    <div class="col-md-8">
                        <div class="mt-4">
                            <center>
                                <h4>Welcome Back!</h4>
                                <h6>We are excited to see you again!</h6>
                            </center>
                        </div>
                        <form>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Uid</label>
                                    <input type="text" class="form-control" id="loginuid" name="loginuid">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="loginpwd" name="loginpwd">
                                    <button id="logineye"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    <a data-toggle="modal" data-target="#forgotmodel" data-dismiss="modal" style="cursor:pointer" id="signupregistercolor">Forgot your Password?</a><br><br>
                                    <button type="button" class="btn col-md-12 mt-2" style="line-height:2" id="loginbtn" name="loginbtn">Login</button>
                                </div>
                                <div class="mb-3">
                                    <font style="color:grey"> Need an Account? </font>
                                    <a data-toggle="modal" data-target="#signupmodal" data-dismiss="modal" style="cursor:pointer" id="signupregistercolor">Register</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <br>
                        <img src="pics/oie_final.png" width="100%" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===================== FORGOT PASSWORD MODAL =====================-->

    <div class="modal fade mt-5" id="forgotmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container" id="forgotcss">
                    <div class="form-row mt-4 ml-3">
                        <h4>Forgot Password</h4>
                    </div>
                    <form>
                        <div class="form-row mt-3">
                            <input type="text" class="form-control col-md-5 offset-md-2 " id="forgotpwduid" placeholder="USER ID" name="forgotpwduid" required>
                            &nbsp;
                            &nbsp;
                            <button type="button" class="col-md-3 btn btn-outline-success" id="sentotp">Send OTP</button>
                        </div>
                        <div class="form-row">
                            <span class="offset-md-2" id="chkfuid"></span>
                        </div>
                        <div class="form-row mt-3">
                            <input type="text" class="form-control offset-md-2 col-md-9" placeholder="Enter OTP" id="enteredOTP" name="enteredOTP" required>
                        </div>
                        <div class="form-row mt-2">
                            <input type="password" class="form-control offset-md-2 col-md-9" disabled placeholder="New Password" id="newpwd" name="newpwd" required>
                        </div>

                        <div class="form-row">
                            <span id="emailHelp1" class="col-md-10 offset-md-2"></span>
                        </div>
                        <div class="form-row mt-2 ">
                            <input type="password" class="form-control offset-md-2 col-md-9" disabled placeholder="Confirm Password" id="confirmpwd" name="confirmpwd" required>
                        </div>
                        <div class="form-row">
                            <span id="emailHelp2" class="col-md-10 offset-md-2"></span>
                        </div>
                        <div class=" modal-footer form-row mb-2 mt-2">
                            <button type="button" class="btn" id="sendsmsbtn" name="sendsmsbtn">Continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>

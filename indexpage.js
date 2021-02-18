
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


            // var uidvalid=0;
            //Signup Blur
            $("#signupuid").blur(function() {
                //alert();
                var uid = $("#signupuid").val();
                $.get("ajax-signup-blur.php?uid=" + uid, function(response) {
                    if (response == "Already Registered") {
                        $("#signupuidspan").html(response);
                        $("#signupuidspan").css("color", "red");
                    } else {
                        //uidvalid=1;
                        $("#signupuidspan").html(response);
                        $("#signupuidspan").css("color", "green");
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
            var flag = 0;
            var j1 = 0,
                j2 = 0,
                j3 = 0,
                j4 = 0;
            $("#signuppwd").keyup(function() {
                var r = /(?=.*[!@#$%^&*]+).*$/;

                var pwd = $("#signuppwd").val();
                if (pwd.length == 1) {
                    var c = pwd;
                } else {
                    var a = pwd.substr(0, pwd.length);
                    var b = pwd.substr(0, pwd.length - 1);
                    c = pwd.substr(b.length, (a.length - b.length));
                }
                flag = 1;
                if (flag == 1) {
                    if (c >= 'A' && c <= 'Z') {
                        $("#Upp-div").removeClass("chk-btn").addClass("chk2-btn");
                        j1 = 1;
                    }
                    if (pwd.length >= 8) {
                        $("#char-div").removeClass("chk-btn").addClass("chk2-btn");
                        j2 = 1;
                    }
                    if (c >= '0' && c <= '9') {
                        $("#Num-div").removeClass("chk-btn").addClass("chk2-btn");
                        j3 = 1;
                    }
                    if (r.test(c) == true) {
                        $("#spcl-div").removeClass("chk-btn").addClass("chk2-btn");
                        j4 = 1;
                    }
                }
            });
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
            });

            //Signup Mobile password
            $("#signupmobile").keyup(function() {
                //for email:
                //var r=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/   ;

                var r = /^[6-9]{1}[0-9]{9}$/;
                var mob = $(this).val();
                if (mob.length == 0)
                    $("#mobspan").html("Its blank..").css("color", "red");
                else if (r.test(mob) == true)
                    $("#mobspan").html("Its ok").css("color", "green");
                else
                    $("#mobspan").html("Invalid data").css("color", "red");
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
            $("#sentotp").click(function() {
                var uid = $("#forgotpwduid").val();
                var url = "ajax-forgot-password-uid.php?uid=" + uid;
                $.get(url).then(okFx, notokFx);

                function okFx(response) {
                    if (response == 0)
                        $("#chkfuid").html("Enter valid uid").css("color", "red");
                    else {
                        $("#chkfuid").html("");
                        var url1 = "forgot-password.php?uid=" + uid;
                        $.getJSON(url1).then(okFx1, notokFx1);

                        function okFx1(response) {
                            //alert(response);
                            alert("Password sent successfully to" + response[0].mobile);
                            alert(JSON.stringify(response));
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


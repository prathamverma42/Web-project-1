<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">

    <title>Profile Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="JS/jquery-1.8.2.min.js"></script>

    <style>
        .topbg {
            background-color: #ff9e08;
        }

        /*
        #ppic{
        border: 1px solid grey;  
        border-radius: 2px 2px 2px 2px;
        margin-left: 4px;
        }*/

    </style>
    <script>
        function showpreview(file, imgid) {
            if (file.files && file.files[0]) {

                //alert(file.files[0].size);

                var reader = new FileReader();
                reader.onload = function(e) {
                    $(imgid).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }
        
      
        $(document).ready(function() {
            
            
              var name=$('#name').val();
            var gender=$("#gender").val();
            var address=$("#address").val();
            var city=$("#city").val();
            var state=$("#state").val();
            var pin=$("#pin").val();
            var acard=$("#acard").val();
            var dob=$("#dob").val();
            var email=$("#email").val();
             //ppic=$("#ppic").val();
        var postdata={
            name: name,
            gender: gender,
            address: address,
            city: city,
            pin: pin,
            state: state,
            acard: acard,
            dob: dob,
            email: email,
            ppic: ppic,
        };
            $("#fetchbtn").click(function() {
                //            var uid ="<?php echo $_SESSION["uid"]; ?>"
                //          alert(uid);
                $.getJSON("user-profile-fetch.php?", function(response) {
                    /*                            alert(JSON.stringify(response));*/
                    $("#name").val(response[0].name);
                    $("#gender").val(response[0].gender);
                    $("#contact").val(response[0].contact);
                    $("#address").val(response[0].address);
                    $("#city").val(response[0].city);
                    $("#state").val(response[0].state);
                    $("#pin").val(response[0].pin);
                    $("#acard").val(response[0].acard);
                    $("#dob").val(response[0].dob);
                    $("#email").val(response[0].email);
                    $("#prev").attr("src", "uploads/" + response[0].ppic);
                    //                        $("#pin").html(response[0].medname);
                });
            });

            var chkacardvalid = 0;
            var chkpinvalid = 0;

            $("#acard").keyup(function() {
                chkacardvalid = 0;
                var choice = $("#acard").val();

                if (isNaN(choice)) {
                    $("#chkacard").html("only numerics allowed").css("color", "red");
                } else if (choice.length != 12) {
                    $("#chkacard").html("Not a valid Aadhar number");
                    $("#chkacard").css("color", "blue");
                }

                if ((choice.length == 12 || choice.length == 0)) {
                    if (isNaN(choice)) {
                        $("#chkacard").html("only numerics allowed").css("color", "red");
                    } else {
                        $("#chkacard").html("");
                    }
                }

                if ($("#chkacard").html() == "") {
                    chkacardvalid = 1;
                }
            });

            $("#pin").keyup(function() {
                chkpinvalid = 0;
                var choice = $("#pin").val();

                if (isNaN(choice)) {
                    $("#chkpin").html("only numerics allowed").css("color", "red");
                } else if (choice.length != 6) {
                    $("#chkpin").html("Not a valid pin code");
                    $("#chkpin").css("color", "blue");
                }

                if ((choice.length == 6 || choice.length == 0)) {
                    if (isNaN(choice)) {
                        $("#chkpin").html("only numerics allowed").css("color", "red");
                    } else {
                        $("#chkpin").html("");
                    }
                }
                if ($("#chkpin").html() == "") {
                    chkpinvalid = 1;

                }
            });

            //action="user-profile-process.php" 
            $("#btn").click(function() {
                var jassus = 1;
                chkpinvalid=0;
                chkacardvalid=0;
                if ($("#pin").val()!="" && chkpinvalid == "0" && $("#chkpin").html()=="") {
                    chkpinvalid = 1;
                    //jassus = 0;
                    //                        alert("Enter the value of pin");
                    //                      return;
                }
                if ($("#acard").val() != "" && chkacardvalid == "0" && $("#chkacard").html()=="") {
                    chkacardvalid = 1;
                    //jassus = 0;
                    //                        alert("Enter the value of pin");
                    //                      return;
                }
                if ($("#pin").val() == "") {
                    alert("Enter the value of pin");
                    //jassus = 0;
                    return;
                }
                if (chkpinvalid == "0") {
                    alert("Please full fill the conditions of pin");
                    //jassus = 0;
                    return;
                }
                if ($("#acard").val() == "") {
                    alert("Enter the value of Aadhar card");
                    //jassus = 0;
                    return;
                }
                if (chkacardvalid == "0") {
                    alert("Please full fill the conditions of acard");
                    //jassus = 0;
                    return;
                }
                $.post("user-profile-update.php",postdata,function(res){
                    alert();
                });
//                alert(jassus);
  //alert();     /*/*/*/*/*/* 
                //var abc=0;
                //if(abc)
                 //   document.frm.submit(); 
                //else
                  //  alert(abc);
                
                  //  alert();
                
                //alert();
                /*var querystring= $("#updateprofile").serialize();
                alert(querystring);*/
                // window.location="user-profile-update.php";
                //location.href="index.php";
            });
        });

    </script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-1 topbg">
                <center>
                    <h2>
                        Personal Information
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </h2>
                </center>
            </div>
        </div>
        <br><br>

        <form id="updateprofile" name="frm" enctype="multipart/form-data" method="post">
            <div class="form-row">
                <div class="form-group  col-md-4">
                    <label for="uid">User id</label>
                    <input type="text" class="form-control" disabled placeholder="Enter user id" value="<?php echo $_SESSION["uid"]; ?>">
                </div>
                <div class=" offset-md-4 col-md-3 form-group">
                    <label for="fetchbtn">&emsp;</label>
                    <input type="button" value="Fetch" id="fetchbtn" name="fetchbtn" class="btn btn-info form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" placeholder="Enter your name" id="name" name="name" required>
                </div>
                <div class=" form-group col-md-4 ">
                    <label for="inputState">Gender</label>

                    <select id="gender" name="gender" class="form-control">
                        <option selected value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Transgender">Transgender</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="contact">Mobile/Contact</label>
                    <input type="number" class="form-control" minlength="4" maxlength="4" placeholder="Enter your contact details" disabled value="<?php echo $_SESSION["mob"]; ?>" id="contact" name="contact" required>
                    <span id="mobspan"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main Street" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" placeholder="Enter your city" id="city" name="city" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="state" name="state" class="form-control">
                        <option selected value="punjab">Punjab</option>
                        <option value="kerala">Kerala</option>
                        <option value="uttar pardesh">Uttar pardesh</option>
                        <option value="karnataka">karnataka</option>
                        <option value="rajasthan">rajasthan</option>
                        <option value="gujrat">Gujrat</option>
                        <option value="jammu kashmir">Jammu Kashmir</option>
                        <option value="bihar">Bihar</option>
                        <option value="telangana">Telangana</option>
                        <option value="West bengal">West Bengal</option>
                        <option value="andra pardesh">Andra pardesh</option>
                        <option value="madya pardesh">Madya pardesh</option>
                        <option value="haryana">Haryana</option>
                        <option value="odisha">Odissa</option>
                        <option value="assam">Assam</option>
                        <option value="jharkhand">Jharkhand</option>
                        <option value="goa">Goa</option>
                        <option value="himachal pardesh">Himachal pardesh</option>
                        <option value="arunachal pardesh">Arunachal pardesh</option>
                        <option value="manipur">Manipur</option>
                        <option value="sikkim">Sikkim</option>
                        <option value="nagaland">Nagaland</option>
                        <option value="chhatisgarh">Chhatisgarh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="tripura">Tripura</option>
                        <option value="meghaleya">Meghaleya</option>
                        <option value="mizoram">Mizoram</option>
                        <option value="maharasthra">Maharasthra</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="pin">Pin</label>
                    <input type="text" class="form-control" placeholder="Enter your pin " maxlength="6" id="pin" name="pin" required>
                    <span id="chkpin"></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="acard">Aadhar Card Number</label>
                    <input type="text" class="form-control" placeholder="Enter aadhar number (12-digits)"  maxlength="12"  id="acard" name="acard" required>
                    <span id="chkacard"></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="dob">DOB</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" placeholder="Enter your email id " id="email" name="email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="offset-md-4 form-group col-md-2">
                    <label>Upload Pic</label>
                </div>
                <div>
                    <input type="file" name="ppic" id="ppic" onchange="showpreview(this,prev);">
                </div>
                <div class="col-md-3 offset-md-5">
                    <img src="pics/upload.gif" id="prev" width="250" alt="No image">
                </div>
            </div>
            <br><br>
            <center>
                <input type="button" id="btn" name="btn" value="Update" class="btn btn-success col-md-2">
            </center>
            <br><br>
        </form>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ff9e08" fill-opacity="1" d="M0,128L11.4,117.3C22.9,107,46,85,69,85.3C91.4,85,114,107,137,101.3C160,96,183,64,206,74.7C228.6,85,251,139,274,181.3C297.1,224,320,256,343,234.7C365.7,213,389,139,411,144C434.3,149,457,235,480,256C502.9,277,526,235,549,208C571.4,181,594,171,617,160C640,149,663,139,686,138.7C708.6,139,731,149,754,165.3C777.1,181,800,203,823,176C845.7,149,869,75,891,85.3C914.3,96,937,192,960,240C982.9,288,1006,288,1029,277.3C1051.4,267,1074,245,1097,202.7C1120,160,1143,96,1166,101.3C1188.6,107,1211,181,1234,192C1257.1,203,1280,149,1303,106.7C1325.7,64,1349,32,1371,21.3C1394.3,11,1417,21,1429,26.7L1440,32L1440,320L1428.6,320C1417.1,320,1394,320,1371,320C1348.6,320,1326,320,1303,320C1280,320,1257,320,1234,320C1211.4,320,1189,320,1166,320C1142.9,320,1120,320,1097,320C1074.3,320,1051,320,1029,320C1005.7,320,983,320,960,320C937.1,320,914,320,891,320C868.6,320,846,320,823,320C800,320,777,320,754,320C731.4,320,709,320,686,320C662.9,320,640,320,617,320C594.3,320,571,320,549,320C525.7,320,503,320,480,320C457.1,320,434,320,411,320C388.6,320,366,320,343,320C320,320,297,320,274,320C251.4,320,229,320,206,320C182.9,320,160,320,137,320C114.3,320,91,320,69,320C45.7,320,23,320,11,320L0,320Z"></path>
        </svg>
    </div>

</body>

</html>

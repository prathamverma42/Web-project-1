<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <link rel="icon" href="pics/user-md-solid.svg" id="topicon" type="image/icon type" width="50">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JS/jquery-1.8.2.min.js"></script>
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
            $("#fetchbtn").click(function() {
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
           $("#acard").keyup(function() {
                // alert();
                var choice = $("#acard").val();
                /*if(!isNAN(choice))
                    {
                        alert();
                        $("#chkacard").html("only numerics allowed").css("color","yellow");
                        //$("#chkacard").css("color","yellow");
                        
                    }
                if()
                    {
                        $("#chkacard").html("");
                    }
                if(choice.length>12 || choice.length <12)
                    {
                        $("#chkacard").html("Not a valid Aadhar number");
                        $("#chkacard").css("color","blue");
                    }
                if(choice.length == 12)
                    {
                        //alert();
                        $("#chkacard").html("");
}*/
                if (isNaN(choice)) {
                    $("#chkacard").html("only numerics allowed").css("color", "red");
                } else if (choice.length != 12) {
                    $("#chkacard").html("Not a valid Aadhar number");
                    $("#chkacard").css("color", "blue");
                }

                if ((choice.length == 12 || choice.length == 0)) {
                    if (isNaN(choice))

                    {
                        $("#chkacard").html("only numerics allowed").css("color", "red");
                    } else {
                        $("#chkacard").html("");
                    }
                }
            });
            $("#pin").keyup(function(){
               var choice =$("#pin").val();
                if(isNaN(choice))
                    {
                        $("#chkpin").html("only numerics allowed").css("color","red");
                    }
                if(!isNaN(choice))
                    {
                        $("#chkpin").html("");
                     }
            });
        });

    </script>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-md-12 mt-3 bg-warning">
                <center>
                    <h2>
                        User-Profile Page
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </h2>
                </center>
            </div>
        </div>
        <br><br>
        <form action="user-profile-process.php" enctype="multipart/form-data" method="post">
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
                    <input type="text" class="form-control" required placeholder="Enter your name" id="name" name="name" required>
                </div>
                <div class=" form-group col-md-4 ">
                    <label for="inputState">Gender</label>

                    <select id="gender" name="gender" class="form-control">
                        <option selected value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Transgender">Prefer not to say</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="contact">Mobile/Contact</label>
                    <input type="number" class="form-control" disabled value="<?php echo $_SESSION["mob"]; ?>" placeholder="Enter your contact details" id="contact" name="contact">
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" required id="address" name="address" placeholder="1234 Main Street" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputCity">City</label>
                    <input type="text" required class="form-control" placeholder="Enter your city" id="city" name="city" required>
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
                    <input type="text" class="form-control" required placeholder="Enter your pin " maxlength="6" id="pin" name="pin" required>
                    <span id="chkpin"></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="acard">Aadhar Card Number</label>
                    <input type="text" class="form-control" required  placeholder="Enter aadhar number (12-digits)" id="acard" name="acard" required >
                    <span id="chkacard"></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="dob">DOB</label>
                    <input type="date" class="form-control" required  id="dob" name="dob" required >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="email">Email</label>
                    <input type="email" class="form-control"  required placeholder="Enter your email id " id="email" name="email" required >
                </div>
            </div>
            <div class="form-row">
                <div class="offset-md-4 form-group col-md-2">
                    <label>Upload Pic</label>
                </div>
                <div>
                    <input type="file" name="ppic"  required id="ppic" onchange="showpreview(this,prev);" required >
                </div>
                <div class="col-md-3 offset-md-5">
                    <img src="pics/upload.gif" id="prev" width="250" alt="No image">
                </div>
            </div>
            <br><br>
            <center>
                <input type="submit" name="btn" value="Save" class="btn btn-success col-md-2">
            </center>
            <br><br>
        </form>
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f0ad4e" fill-opacity="1" d="M0,128L11.4,117.3C22.9,107,46,85,69,85.3C91.4,85,114,107,137,101.3C160,96,183,64,206,74.7C228.6,85,251,139,274,181.3C297.1,224,320,256,343,234.7C365.7,213,389,139,411,144C434.3,149,457,235,480,256C502.9,277,526,235,549,208C571.4,181,594,171,617,160C640,149,663,139,686,138.7C708.6,139,731,149,754,165.3C777.1,181,800,203,823,176C845.7,149,869,75,891,85.3C914.3,96,937,192,960,240C982.9,288,1006,288,1029,277.3C1051.4,267,1074,245,1097,202.7C1120,160,1143,96,1166,101.3C1188.6,107,1211,181,1234,192C1257.1,203,1280,149,1303,106.7C1325.7,64,1349,32,1371,21.3C1394.3,11,1417,21,1429,26.7L1440,32L1440,320L1428.6,320C1417.1,320,1394,320,1371,320C1348.6,320,1326,320,1303,320C1280,320,1257,320,1234,320C1211.4,320,1189,320,1166,320C1142.9,320,1120,320,1097,320C1074.3,320,1051,320,1029,320C1005.7,320,983,320,960,320C937.1,320,914,320,891,320C868.6,320,846,320,823,320C800,320,777,320,754,320C731.4,320,709,320,686,320C662.9,320,640,320,617,320C594.3,320,571,320,549,320C525.7,320,503,320,480,320C457.1,320,434,320,411,320C388.6,320,366,320,343,320C320,320,297,320,274,320C251.4,320,229,320,206,320C182.9,320,160,320,137,320C114.3,320,91,320,69,320C45.7,320,23,320,11,320L0,320Z"></path>
        </svg>

    </div>

</body>

</html>

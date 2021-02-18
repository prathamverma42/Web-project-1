<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Unused Medicine</title>
            <link rel="icon" href="pics/recycle-solid.svg" id="topicon" type="image/icon type" width="50">

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        #payment-hidden {
            display: none;
        }
    .topbg
        {
            background-color: #ff4c4c;
        }
        .btnbtm{
            background-color:    #a3ffa3;
        }
        .abcd{
            margin-left: -15px;
        }
    </style>
    <script src="JS/jquery-1.8.2.min.js"></script>
    <script>
        $(document).ready(function() {
            //    alert();
            $("#options").change(function() {
                var choice = $("#options").val();
                if (choice == "Sell") {
                    $("#payment-hidden").css("display", "block");
                } else {
                    $("#payment-hidden").css("display", "none");
                }
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
                        <i class="fa fa-medkit" aria-hidden="true"></i>
                        Unused Medicine Details
                        <i class="fa fa-medkit" aria-hidden="true"></i>
                    </h2>
                </center>
            </div>
        </div>
        <br><br>
        <form action="medicine-details-process.php" method="post">
            <div class="form-row">
               <div class="column col-md-6 abcd">
                    <div class="form-group  col-md-7 mt-4">
                    <label for="uid">User id</label>
                    <input type="text" class="form-control" disabled value="<?php session_start(); echo $_SESSION["uid"]; ?>" placeholder="Enter user id">
                </div>
                <div class="form-group col-md-9">
                    <label for="medname"> Medicine Name</label>
                    <input type="text" class="form-control" placeholder="Enter medicine name" id="medname" name="medname" required>
                </div>
               </div>
               <div class="column">
                   <div class="form-group col-md -4 offset-5">
                    <img src="pics/medicine-sets-vector-pack.jpg" width="250" height="130" alt="No image">
                </div>
               </div>
                
            
                
                
                
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" placeholder="Enter company name" id="company" name="company" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="expdate">Exp date</label>
                    <input type="date" class="form-control" id="expdate" name="expdate" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="qty">Quantity</label>
                    <input type="number" class="form-control" placeholder="Enter quantity" id="qty" name="qty" required>
                </div>
            </div>
            <div class="form-row">            
                <div class=" form-group col-md-6 ">
                    <label for="type">Type</label>

                    <select id="type" name="type" class="form-control">
                        <option value="Capsules">Capsules</option>
                        <option value="Liquids">Liquids</option>
                        <option value="Strips">Strips</option>
                        <option value="Drops">Drops</option>
                        <option value="Inhalers">Inhalers</option>
                        <option value="Injections">Injections</option>
                        <option value="Tablets">Tablets</option>
                        <option value="Granules or powder">Granules or powder</option>
                        <option value="Creams and ointments">Creams and ointments</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="options">Options</label>

                    <select id="options" name="options" class="form-control">
                        <option selected value="Donate">Donate</option>
                        <option value="Sell">Sell</option>
                    </select>
                </div>
            </div>
            
            <div id="payment-hidden">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="price">Price(MRP)</label>
                        <input type="text" class="form-control" value="0" placeholder="Enter price" id="price" name="price">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="oprice">Offered Price</label>
                        <input type="text" class="form-control" value="0.00" placeholder="Enter offered price" id="oprice" name="oprice">
                    </div>
                </div>
                <div class="container">
                    <div class="form-check form-check-inline col-md-2">
                        <input class="form-check-input"  type="radio" name="modepay" id="modepay" value="COD">
                        <label class="form-check-label"  for="inlineRadio1">Cash on Delivery (COD)</label>
                    </div>
                    <div class="form-check form-check-inline col-md-2">
                        <input class="form-check-input" type="radio" name="modepay" id="modepay" value="NB">
                        <label class="form-check-label" for="inlineRadio1">Net Banking (NB)</label>
                    </div>
                    <div class="form-check form-check-inline col-md-2">
                        <input class="form-check-input" type="radio" name="modepay" id="modepay" value="Paytm">
                        <label class="form-check-label" for="inlineRadio1">Paytm</label>
                    </div>
                    <div class="form-check form-check-inline col-md-2">
                        <input class="form-check-input"checked type="radio" name="modepay" id="modepay" value="Any">
                        <label class="form-check-label" for="inlineRadio1">Any</label>
                    </div>
                </div>
            </div>
            <br><br>
            <center>
                <input type="submit" id="btn" name="btn" value="Post Advertisement" style="color: #ff0000" class="btn btnbtm col-md-3">
            </center>
            <br><br>
        </form>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill=" #ff4c4c" fill-opacity="1" d="M0,32L12.6,53.3C25.3,75,51,117,76,117.3C101.1,117,126,75,152,53.3C176.8,32,202,32,227,74.7C252.6,117,278,203,303,229.3C328.4,256,354,224,379,202.7C404.2,181,429,171,455,170.7C480,171,505,181,531,186.7C555.8,192,581,192,606,186.7C631.6,181,657,171,682,176C707.4,181,733,203,758,202.7C783.2,203,808,181,834,144C858.9,107,884,53,909,37.3C934.7,21,960,43,985,48C1010.5,53,1036,43,1061,69.3C1086.3,96,1112,160,1137,181.3C1162.1,203,1187,181,1213,160C1237.9,139,1263,117,1288,106.7C1313.7,96,1339,96,1364,90.7C1389.5,85,1415,75,1427,69.3L1440,64L1440,320L1427.4,320C1414.7,320,1389,320,1364,320C1338.9,320,1314,320,1288,320C1263.2,320,1238,320,1213,320C1187.4,320,1162,320,1137,320C1111.6,320,1086,320,1061,320C1035.8,320,1011,320,985,320C960,320,935,320,909,320C884.2,320,859,320,834,320C808.4,320,783,320,758,320C732.6,320,707,320,682,320C656.8,320,632,320,606,320C581.1,320,556,320,531,320C505.3,320,480,320,455,320C429.5,320,404,320,379,320C353.7,320,328,320,303,320C277.9,320,253,320,227,320C202.1,320,177,320,152,320C126.3,320,101,320,76,320C50.5,320,25,320,13,320L0,320Z"></path></svg>
    </div>
</body>

</html>

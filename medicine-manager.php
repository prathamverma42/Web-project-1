<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <title>Medicine Manager</title>
            <link rel="icon" href="pics/medkit-solid.svg" id="topicon" type="image/icon type" width="50">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JS/jquery-1.8.2.min.js"></script>
    <script src="JS/angular.min.js"></script>
    <style>
        #hiddendiv {
            display: none;
        }
        .topbg
        {
            background-color: #0099ff;
        }
        #pic
        {
            transform: rotate(110deg);
        }
        #divimg{
            background-image: url(pics/cameo_banner-1x.png);
            width: 100%;
        height: 100%;
        }

    </style>
    <script>
        var module = angular.module("mymodule", []);
        module.controller("mycontroller", function($scope, $http) {
            $scope.jsonArray = [];
            $scope.dofetch = function() {
                // var uid=document.getElementById("uid");
                //alert(uid);
                // alert($scope.uid);
                //var uid = $scope.uid;
                //alert(uid1);
                var url = "medicine-manager-ng-process.php";
                $http.get(url).then(okFx, notokFx);

                function okFx(response) {
                    //                  alert(JSON.stringify(response.data));
                    //  alert(JSON.stringify(response.data));                
                    $scope.jsonArray = response.data;
                }

                function notokFx(error) {
                    //                  alert(error);
                }
            };
            $scope.abc;
            $scope.index;
            $scope.doUnshare = function(rid, index) {
                $scope.abc=rid;
                $scope.index=index;
               /* var respbool = confirm("Are U sure?");
                if(respbool==true)
                    {
                        
                    
                    var url = "medicine-manager-ng-unshare.php?rid=" + rid;
                alert(rid);
                alert(index);
                    $scope.jsonArray.splice(index, 1);
                    $http.get(url).then(okFx, notokFx);

                    function okFx(response) {
                        if (response) {
                            //                            alert(response);
                            alert("Record Deleted");

                        } else {

                            alert("Record Not Deleted");
                        }
                    }

                    function notokFx(error) {
                        alert(error);
                    }
                        }*/
                
            }
            $scope.jsonArray1 = [];
            $scope.doedit = function(rid) {
                var url = "medicine-manager-ng-edit.php?rid=" + rid;
                $http.get(url).then(okFx, notokFx);
                
                function okFx(response) {
                    $scope.jsonArray1 = response.data;
                    //alert(JSON.stringify(response));
                   // var choice = $scope.jsonArray1[0].options;
                    $scope.choice=$scope.jsonArray1[0].options;
                    $scope.qty=$scope.jsonArray1[0].qty;
                    $scope.price=$scope.jsonArray1[0].price;
                    $scope.oprice=$scope.jsonArray1[0].oprice;
                    $scope.modepay=$scope.jsonArray1[0].modepay;
                    //alert(choice);
                    var choice= $scope.choice;
                    if (choice == "Sell") {
                        // $scope.opt=$scope.jsonArray1[0].options;

                        $("#hiddendiv").css("display", "block");
                    }
                    if (choice == "Donate") {
                        //$scope.opt=$scope.jsonArray1[0].options;

                        $("#hiddendiv").css("display", "none");
                    }
                }

                function notokFx(error) {
                    //alert();
                }


            }
            $scope.dochange =function(){
             var choice= $scope.choice;
                if (choice == "Sell") {
                        // $scope.opt=$scope.jsonArray1[0].options;

                        $("#hiddendiv").css("display", "block");
                    }
                    if (choice == "Donate") {
                        //$scope.opt=$scope.jsonArray1[0].options;

                        $("#hiddendiv").css("display", "none");
                    }
            }
            $scope.doupdate = function() {
                //   alert();
                //alert($scope.jsonArray1[0].medname);
                var rid=$scope.jsonArray1[0].rid;
                var qty=$scope.qty;
                var options=$scope.choice;
                var price=$scope.price;
                var oprice=$scope.oprice;
                var modepay=$scope.modepay;
                //alert(price);
                //alert(oprice);
                
                if(price<oprice && options=="Sell")
                    {
                        alert("Offered price should be less!!");
                        return;
                    }
                if(isNaN(qty))
                    {
                        alert("Quantity shold be number only!!");
                        return;
                    }
                var url="medicine-manager-ng-update.php?qty="+qty+"&options="+options+"&price="+price+"&oprice="+oprice+"&modepay="+modepay+"&rid="+rid;
                //alert(url);
                $http.get(url).then(okFx,notokFx);
                function okFx(response){
                    if(response.data=="1")
                        alert("Successfully updated");
                    else
                        alert(JSON.stringify(response));
                }
                function notokFx(error)
                {
                    alert(error);
                }
                
            }
            $scope.doun =function()
            {
                //alert();
                var url = "medicine-manager-ng-unshare.php?rid=" + $scope.abc;
                //alert(rid);
                //alert(index);
                    var index= $scope.index;
                    $scope.jsonArray.splice(index, 1);
                    $http.get(url).then(okFx, notokFx);

                    function okFx(response) {
                        if (response) {
                            //alert(response);
                            //alert("Record Deleted");
                        } else {
                            //alert("Record Not Deleted");
                        }
                    }

                    function notokFx(error) {
                        alert(error);
                    }
            }

        });/*
        $(document).ready(function() {
            $("#update").click(function() {
                //  var medna=document.getElementById("#med").value;
                // var medname1=$scope.medname;
                // var medna=$("#med").val();
                //                alert(medname1);
                //   alert(medna);
                //alert();
                //                var querystring = $("#edit-form").serialize();

                //              alert(querystring);
            });
            $("#options").click(function() {
                var choice = $("#options").val();
                if (choice == "Sell") {
                    $("#hiddendiv").css("display", "block");
                } else {
                    $("#hiddendiv").css("display", "none");
                }
            });
        });*/

    </script>
    <!--
<style>
     .button {
            display: inline-block;
            padding: 15px 25px;
            font-size: 15px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }

        .button1 {
            display: inline-block;
            padding: 15px 25px;
            font-size: 15px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: rebeccapurple;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }


        .button:hover {
            background-color: powderblue;
        }

        .button1:hover {
            background-color: lightsteelblue;

        }

       
.button:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

    </style>
-->
</head>

<body ng-app="mymodule" ng-controller="mycontroller">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-1 topbg">
                <center>
                    <h2>
                                               <!--<img src="pics/capsule-removebg-preview.png" width="40" id="pic">-->

                        Medicine Manager Page
<!--
                        <img src="pics/capsule-removebg-preview.png" width="40" id="pic">-->
                    </h2>
                </center>
            </div>
        </div>
        <br>
        <!--
<button class="btn btn-warning  font-weight-bold button" type="button" data-toggle="modal" data-target="#modalSignup">
                <i class="fa fa-user-plus sign" aria-hidden="true"></i>&nbsp;
                SIGN UP
            </button>
            &emsp;&emsp;&emsp;
            <button class="btn btn-info font-weight-bold text-light button1" type="button" data-toggle="modal" data-target="#modallogin">

                <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;
                LOGIN
            </button>
-->

        <div class="form-row">
            <div class="form-group  col-md-6">
                <label for="uid">User id</label>
                <input type="text" class="form-control" disabled value="<?php echo $_SESSION["uid"]; ?>" placeholder="Enter user id">
            </div>
            <div class=" offset-md-2 col-md-3 form-group">
                <label for="fetchbtn">&emsp;</label>
                <input type="button" value="Fetch" id="fetchbtn" name="fetchbtn" class="btn btn-secondary form-control" ng-click="dofetch();">
            </div>
        </div>
        <br>
        <table class="table table-striped table-hover" id="divimg">
            <thead class="table-dark">
                <tr >
                    <th scope="col">Rid</th>
                    <th scope="col">Medname</th>
                    <th scope="col">Company</th>
                    <th scope="col">City</th>
                    <th scope="col">Unshare</th>
                    <th scope="col">Update</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="obj in jsonArray">
                    <td>{{obj.rid}}</td>
                    <td>{{obj.medname}}</td>
                    <td>{{obj.company}}</td>
                    <td>{{obj.city}}</td>
                    <td><input type="button" class="btn btn-outline-primary" value="Unshare" data-toggle="modal" data-target="#unsharemodal"  ng-click="doUnshare(obj.rid,$index);" ></td>
                    <td><input type="button" class="btn btn-outline-danger" value="Edit" data-toggle="modal" data-target="#loginmodal" ng-click="doedit(obj.rid);"></td>
                </tr>
            </tbody>
        </table>
        <!--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,128L12,144C24,160,48,192,72,213.3C96,235,120,245,144,250.7C168,256,192,256,216,229.3C240,203,264,149,288,128C312,107,336,117,360,154.7C384,192,408,256,432,250.7C456,245,480,171,504,149.3C528,128,552,160,576,149.3C600,139,624,85,648,69.3C672,53,696,75,720,112C744,149,768,203,792,186.7C816,171,840,85,864,58.7C888,32,912,64,936,112C960,160,984,224,1008,245.3C1032,267,1056,245,1080,240C1104,235,1128,245,1152,234.7C1176,224,1200,192,1224,170.7C1248,149,1272,139,1296,138.7C1320,139,1344,149,1368,149.3C1392,149,1416,139,1428,133.3L1440,128L1440,320L1428,320C1416,320,1392,320,1368,320C1344,320,1320,320,1296,320C1272,320,1248,320,1224,320C1200,320,1176,320,1152,320C1128,320,1104,320,1080,320C1056,320,1032,320,1008,320C984,320,960,320,936,320C912,320,888,320,864,320C840,320,816,320,792,320C768,320,744,320,720,320C696,320,672,320,648,320C624,320,600,320,576,320C552,320,528,320,504,320C480,320,456,320,432,320C408,320,384,320,360,320C336,320,312,320,288,320C264,320,240,320,216,320C192,320,168,320,144,320C120,320,96,320,72,320C48,320,24,320,12,320L0,320Z"></path></svg>-->
    </div>
    <div class="modal fade mt-3" id="loginmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Edit <i><i class="fa fa-pencil" aria-hidden="true"></i></i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit-form">
                    <div class="modal-body">
                        <div class="form-row ">
                        <div class="col-md-6">
                                <label>Medname</label>
                            <input type="text" class="form-control" disabled ng-model="jsonArray1[0].medname">
                        </div>
                           <div class="col-md-6">
                            <label>Company</label>
                            <input type="text" class="form-control" disabled ng-model="jsonArray1[0].company">
                        </div>
                        </div>
                        <div class="form-row">
                       <div class="col-md-6">
                                 <label>Expdate</label>
                            <input type="date" class="form-control" disabled value="{{jsonArray1[0].expdate}}">
                       </div>
                           <div class="col-md-6">
                            <label>Type</label>
                            <input type="text" class="form-control" disabled ng-model="jsonArray1[0].type">
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                            <label>Quantity</label>
                            <input type="text" class="form-control" ng-model="qty" >
                        </div>
                           <div class="col-md-6">
                            <label>Options</label>
                            <br>
                            <select class="form-control"  ng-model="choice" ng-change="dochange();" >
                                <option value="Sell" > Sell</option>
                                <option value="Donate" > Donate</option>
                            </select>
                        </div>
                        </div>
                        <div id="hiddendiv">
                            <div class="form-row">
                                <label>Price</label>
                                <input type="number" class="form-control" placeholder="0.00" value="{{jsonArray1[0].price}}" ng-model="price">
                            </div>
                            <div class="form-row">
                                <label>Offered price</label>
                                <input type="number" class="form-control" placeholder="0.00" value="{{jsonArray1[0].oprice}}" ng-model="oprice">
                            </div>

                            <div class="form-row">
                                <label>Mode of Payment</label>
                                <input type="text" class="form-control" placeholder="COD/NB/Paytm/Any"value="{{jsonArray1[0].modepay}}" ng-model="modepay">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <center>
                            <button type="submit" class="btn btn-secondary" ng-click="doupdate();">Update</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    <div class="modal fade" id="unsharemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content container">
                <h5 class="modal-title mt-3">
                    UNSHARE
                </h5>
                <br>
                Are you sure you want to Unshare it?
                <br>
                <br>
                <br>
                <div class="modal-footer form-row">
                    <label id="cancelbtn" class="btn btn-outline-dark" data-dismiss="modal" name="cancelbtn offset-md-2" >Cancel</label>
                    <button id="unsharebtn" class="btn btn-outline-danger offset-md-1"  name="unsharebtn" data-dismiss="modal" ng-click="doun();" >Unshare</button>
                    <br>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

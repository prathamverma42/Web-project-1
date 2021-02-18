<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Find Medicines</title>
                <link rel="icon" href="pics/shopping-cart-solid.svg" id="topicon" type="image/icon type" width="50">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JS/jquery-1.8.2.min.js"></script>
    <script src="JS/angular.min.js"></script>
    <style>
        .card{
            box-shadow: 0px 0px 10px 2px grey;
        }
        .topbg
        {
            background-color: #00cba9;
        }
        #hidden{
            display: none;
        }
    </style>
    <script>
        var module = angular.module("mymodule", []);
        module.controller("mycontroller", function($scope, $http) {
            $scope.jsonArray = [];
            $scope.jsonArray1 = [];
            $scope.fetchcity = function() {
                var url = "findmedicines-fetch-city.php";
                $http.get(url).then(okFx, notokFx);

                function okFx(response) {
                    $scope.jsonArray = response.data;
                }

                function notokFx(response) {
                    alert(response.data);
                }
            }

            $scope.selobj ;//= $scope.jsonArray[0];
            $scope.medAry;
            $scope.selmedObj;
            $scope.showsel = function() {
                //                alert($scope.selobj.gender);
                var url = "findmedicines-fetch-medname.php?city=" + $scope.selobj.city;
                $http.get(url).then(okFx, notokFx);

                function okFx(response) {
                    //alert(JSON.stringify(response.data));
                    $scope.medAry = response.data;
                }

                function notokFx(response) {
                    alert(response.data);
                }
            }

            $scope.jsonMedProviders;

            $scope.showcard = function() {
                //alert($scope.selmedObj.medname + "   " + $scope.selobj.city); //use column name here
                var city = $scope.selobj.city;
                var med = $scope.selmedObj.medname;

                var url = "find-med-providesrs.php?city=" + city + "&medname=" + med;
                $http.get(url).then(okFx, notokFx);

                function okFx(response) {
                    //alert(JSON.stringify(response.data));
                    $scope.jsonMedProviders = response.data;
                }

                function notokFx(response) {
                    alert(response.data);
                }
            }
            //============
            $scope.jsonPersonDetails;
            $scope.jsonProfileDetails;
            $scope.doshow=function(rid,uid)
            {
                //alert(uid);
                //alert($scope.jsonMedProviders[0].rid);
                var url="findmedicines-person-details.php?rid="+rid;
                $http.get(url).then(okFx,notokFx);
                function okFx(response) {
                    $scope.jsonPersonDetails = response.data;
                    if($scope.jsonPersonDetails[0].options=="Sell")
                        $("#hidden").css("display","block");
                    if($scope.jsonPersonDetails[0].options=="Donate")
                        $("#hidden").css("display","none");
                }

                function notokFx(response) {
                    alert(response.data);
                }
                
                var url1="findmedicines-profile-details.php?uid="+uid;
                $http.get(url1).then(okFx1,notokFx1);
                function okFx1(response) {
                    $scope.jsonProfileDetails = response.data;
                }

                function notokFx1(response) {
                    alert(response.data);
                }
            }
        });

    </script>
</head>

<body ng-app="mymodule" ng-controller="mycontroller" ng-init="fetchcity();">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-1 topbg">
                <center>
                    <h2>
                        Find medicines
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </h2>
                </center>
            </div>
        </div>
        <br><br><br>

        <div class="form-row">
            <div class="form-group  col-md-6">
                <label for="">Select City</label>
                <select ng-model="selobj"  class="col-md-4" value="Choose.."  ng-options="obj.city for obj in jsonArray" ng-change="showsel();">
                    <!-- To show something in the options we should use ng-model in this -->
                </select>
            </div>

            <div class="form-group  col-md-6">
                <label for="">Select Medicine</label>
                <select ng-model="selmedObj" class="col-md-4" ng-options="obj.medname for obj in medAry">
                    <!-- To show something in the options we should use ng-model in this -->
                </select>
            </div>
        </div>

        <div class=" offset-md-4 col-md-3 form-group">
            <label for="fetchbtn">&emsp;</label>
            <input type="button" value="Fetch" id="fetchbtn" name="fetchbtn" class="btn btn-info form-control" ng-click="showcard();">
        </div>
        <!-- cards -->
    <br><br>
        <div class="row">
            <div class="col-md-3" ng-repeat="obj in jsonMedProviders">
                <div class="card" >
                    
                    <div class="card-body">
                        <h3 class="card-title text text-primary bg-light"><center>{{obj.medname}}</center></h3>
                        <p class="card-text">
                           Company: {{obj.company}}
                        </p>
                        <p class="card-text">
                           Expiry-date: {{obj.expdate}}
                        </p>
                        <p class="card-text">
                           Available quantity: {{obj.qty}}
                        </p>
                        <a href="#" class="btn btn-primary" data-target="#showdetails" data-toggle="modal" ng-click="doshow(obj.rid,obj.uid);" >Contact the Person here</a>
                    </div>
                </div>
            </div>
        </div>
<br><br>
       <div class="modal fade" id="showdetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title" id="exampleModalLabel">Provider Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form"><div class="form-row">
                            <label class="col-md-3 offset-md-1">Name :</label>
                            <label class="text text-primary col-md-6 offset-md-2">{{jsonProfileDetails[0].name}}</label>
                            </div><div class="form-row">
                            <label class="col-md-3 offset-md-1">Address :</label>
                            <label class="text text-primary col-md-6 offset-md-2">{{jsonProfileDetails[0].address}}</label>
                            </div><div class="form-row">
                            <label class="col-md-3 offset-md-1">Email :</label>
                            <label class="text text-primary col-md-6 offset-md-2">{{jsonProfileDetails[0].email}}</label>
                                </div><div class="form-row">
                            <label class="col-md-3 offset-md-1">Contact :</label>
                            <label class="text text-primary col-md-6 offset-md-2">{{jsonProfileDetails[0].contact}}</label>
                                </div><div class="form-row">
                            <label class="col-md-3 offset-md-1">Donate/Sell :</label>
                            <label class="text text-primary col-md-6 offset-md-2">{{jsonPersonDetails[0].options}}</label>
                                </div><div id="hidden"><div class="form-row">
                            <label class="col-md-3 offset-md-1">Offered Price :</label>
                            <label class="text text-primary col-md-6 offset-md-2">{{jsonPersonDetails[0].price}}</label>
                                </div><div class="form-row">
                            <label class="col-md-3 offset-md-1">Modepay :</label>
                            <label class="text text-primary col-md-6 offset-md-2">{{jsonPersonDetails[0].modepay}}</label>
                                </div></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00cba9" fill-opacity="1" d="M0,0L10,21.3C20,43,40,85,60,106.7C80,128,100,128,120,160C140,192,160,256,180,256C200,256,220,192,240,160C260,128,280,128,300,117.3C320,107,340,85,360,85.3C380,85,400,107,420,144C440,181,460,235,480,234.7C500,235,520,181,540,149.3C560,117,580,107,600,106.7C620,107,640,117,660,154.7C680,192,700,256,720,234.7C740,213,760,107,780,85.3C800,64,820,128,840,181.3C860,235,880,277,900,256C920,235,940,149,960,138.7C980,128,1000,192,1020,213.3C1040,235,1060,213,1080,181.3C1100,149,1120,107,1140,112C1160,117,1180,171,1200,181.3C1220,192,1240,160,1260,122.7C1280,85,1300,43,1320,69.3C1340,96,1360,192,1380,213.3C1400,235,1420,181,1430,154.7L1440,128L1440,320L1430,320C1420,320,1400,320,1380,320C1360,320,1340,320,1320,320C1300,320,1280,320,1260,320C1240,320,1220,320,1200,320C1180,320,1160,320,1140,320C1120,320,1100,320,1080,320C1060,320,1040,320,1020,320C1000,320,980,320,960,320C940,320,920,320,900,320C880,320,860,320,840,320C820,320,800,320,780,320C760,320,740,320,720,320C700,320,680,320,660,320C640,320,620,320,600,320C580,320,560,320,540,320C520,320,500,320,480,320C460,320,440,320,420,320C400,320,380,320,360,320C340,320,320,320,300,320C280,320,260,320,240,320C220,320,200,320,180,320C160,320,140,320,120,320C100,320,80,320,60,320C40,320,20,320,10,320L0,320Z"></path></svg>
    </div>
    
</body>

</html>

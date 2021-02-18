<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Common Disease</title>
        <link rel="icon" href="pics/search-solid.svg" type="image/icon type" width="50">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JS/jquery-1.8.2.min.js"></script>
    <script src="JS/angular.min.js"></script>
    <style>
        .topbg{
            background-color: #000000;
        }
        /*#fetchbtn{
            background-color:  	  #ad855c;
        }*/
    </style>
    <script>
        var module=angular.module("mymodule",[]);
        module.controller("mycontroller",function($scope,$http){
            $scope.categoryarray=[];
            $scope.diseasearray=[];
            $scope.resultarray=[];
            $scope.fetchcategory =function(){
                var url="find-diseases-fetchcategory.php";
                $http.get(url).then(okFx,notokFx);
                function okFx(response){
                    $scope.categoryarray=response.data;
                }
                function notokFx(response){
                    alert(response.data);
                }
            }
            $scope.showsel =function(){
                var url="find-diseases-fetchdiseases.php?category="+$scope.selobj.category;
                $http.get(url).then(okFx,notokFx);
                function okFx(response){
                    $scope.diseasearray=response.data;
                }
                function notokFx(response){
                    alert(response.data);
                }
            }
            $scope.showcard =function(){
                var url="find-diseases-fetchresults.php?category="+$scope.selobj.category+"&disease="+$scope.seldiseaseObj.disease;
                $http.get(url).then(okFx,notokFx);
                function okFx(response)
                {
                    //alert(JSON.stringify(response));
                    $scope.resultarray=response.data;
                }
                function notokFx(response)
                {
                    alert(response.data);
                }
            }
        });
    </script>
</head>

<body ng-app="mymodule" ng-controller="mycontroller" ng-init="fetchcategory();">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-1 topbg ">
                <center>
                    <h2 style="color: white">
                        Find Common Disesase
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </h2>
                </center>
            </div>
        </div>
        <br><br><br>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Category</label>
                <select ng-model="selobj" class="col-md-4" ng-options="obj.category for obj in categoryarray" ng-change="showsel();" required>
                    <!-- To show something in the options we should use ng-model in this -->
                </select>
            </div>

            <div class="form-group  col-md-6 ">
                <label for="">Diseases</label>
                <select ng-model="seldiseaseObj" class="col-md-4" ng-options="obj.disease for obj in diseasearray" required>
                    <!-- To show something in the options we should use ng-model in this -->
                </select>
            </div>
        </div>

        <div class=" offset-md-4 col-md-3 form-group">
            <label for="fetchbtn">&emsp;</label>
            <input type="button" value="Fetch" id="fetchbtn" name="fetchbtn" class="btn btn-outline-dark form-control" ng-click="showcard();">
        </div>
        
        <table class="table table-striped table-bordered col-md-12 ">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Symptoms</th>
                    <th scope="col">Recommendations</th>
                    <th scope="col">Suggestions</th>
                    <th scope="col">DOS</th>
                    <th scope="col">CONTACT</th>
                    <!--
                    <th scope="col">ppic1</th>
                    <th scope="col">ppic2</th>-->
                    <!--
                    <th scope="col">Unshare</th>
                    <th scope="col">Update</th>-->
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="obj in resultarray">
                    <td>{{obj.symptoms}}</td>
                    <td>{{obj.recommendations}}</td>
                    <td>{{obj.suggestions}}</td>
                    <td><input type="date" value="{{obj.dosdate}}"></td>
                    <td><input type="button" value="contact" class="btn btn-primary{{obj.contact == 'yes'?'':'d-none'}}"></td>             
                    <!--<td><input type="button" class="btn btn-outline-warning" value="Unshare" ng-click="doUnshare(obj.rid,$index);"></td>
                    <td><input type="button" class="btn btn-outline-danger" value="Edit" data-toggle="modal" data-target="#loginmodal" ng-click="doedit(obj.rid);"></td>
                --></tr>
            </tbody>
        </table>
        <!-- cards -->

        <!--<div class="row">
            <div class="col-md-3" ng-repeat="obj in resultarray">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">{{obj.medname}}</h5>
                        <p class="card-text">
                           Company: {{obj.company}}
                        </p>
                        <p class="card-text">
                           Company: {{obj.expdate}}
                        </p>
                        <p class="card-text">
                           Company: {{obj.price}}
                        </p>
                        <p class="card-text">
                           Company: {{obj.oprice}}
                        </p>
                        <a href="#" class="btn btn-primary" ng-click=showPersonInModal(obj.uid);>Conatct the Person here</a>
                    </div>
                </div>
            </div>
                </div>-->
                      <!--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#adad85" fill-opacity="1" d="M0,128L12,144C24,160,48,192,72,213.3C96,235,120,245,144,250.7C168,256,192,256,216,229.3C240,203,264,149,288,128C312,107,336,117,360,154.7C384,192,408,256,432,250.7C456,245,480,171,504,149.3C528,128,552,160,576,149.3C600,139,624,85,648,69.3C672,53,696,75,720,112C744,149,768,203,792,186.7C816,171,840,85,864,58.7C888,32,912,64,936,112C960,160,984,224,1008,245.3C1032,267,1056,245,1080,240C1104,235,1128,245,1152,234.7C1176,224,1200,192,1224,170.7C1248,149,1272,139,1296,138.7C1320,139,1344,149,1368,149.3C1392,149,1416,139,1428,133.3L1440,128L1440,320L1428,320C1416,320,1392,320,1368,320C1344,320,1320,320,1296,320C1272,320,1248,320,1224,320C1200,320,1176,320,1152,320C1128,320,1104,320,1080,320C1056,320,1032,320,1008,320C984,320,960,320,936,320C912,320,888,320,864,320C840,320,816,320,792,320C768,320,744,320,720,320C696,320,672,320,648,320C624,320,600,320,576,320C552,320,528,320,504,320C480,320,456,320,432,320C408,320,384,320,360,320C336,320,312,320,288,320C264,320,240,320,216,320C192,320,168,320,144,320C120,320,96,320,72,320C48,320,24,320,12,320L0,320Z"></path></svg>-->
                        </div>
</body>

</html>

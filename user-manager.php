<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JS/angular.min.js"></script>
    <script>
        var module = angular.module("mymodule", []);
        module.controller("mycontroller", function($scope, $http) {
            $scope.jsonArray = [];
            /*{
                    uid: "aman",
                    pwd: "raman",
                    mobile: "8686"
                },
                {
                    uid: "Raman",
                    pwd: "Chaman",
                    mobile: "17171"
                },
                {
                    uid: "Chaman Singh",
                    pwd: "Daman",
                    mobile: "74574"
                },
                {
                    uid: "Programmer",
                    pwd: "Tejinder",
                    mobile: "9569595"
                },
            ];*/
            $scope.fetchdatafromserver = function() {
                var url = "admin-fetch-ng-all-users.php";
                $http.get(url).then(okFx, notokFx);

                function okFx(response) {
                    // alert(JSON.stringify(response.data));
                    $scope.jsonArray = response.data;
                }

                function notokFx(error) {
                    //  alert(error);
                }
            }
            $scope.deleterecord = function(uid, index) {
                var respbool = confirm("Do you really want to delete **" + uid + "** record?")
                if (respbool) {
                    //alert(uid);
                    var url = "admin-delete-ng-all-users.php?uid=" + uid;
                    $http.get(url).then(okFx, notokFx)

                    function okFx(response) {
                        //alert(response);
                        $scope.jsonArray.splice(index, 1);
                    }

                    function notokFx(error) {
                        //alert(error);
                    }

                    alert("Record Deleted");
                } else {
                    alert("Cancelled!!");
                }
                 $scope.fetchdatafromserver();
            }
            $scope.blockrecord = function(uid) {
                var respbool = confirm("Do you really want to block **" + uid + "** record?")
                if (respbool) {


                    //alert(uid);
                    var url = "admin-block-ng-all-users.php?uid=" + uid;
                    $http.get(url).then(okFx, notokFx)

                    function okFx(response) {
                        // alert(response);
                    }

                    function notokFx(error) {
                        // alert(error);
                    }
                    alert("Record Blocked");

                } else {
                    alert("Cancelled!!");
                }
                                 $scope.fetchdatafromserver();

            }
            $scope.resumerecord = function(uid) {
                var respbool = confirm("Do you really want to resume **" + uid + "** record?")
                if (respbool) {

                    //alert(uid);
                    var url = "admin-resume-ng-all-users.php?uid=" + uid;
                    $http.get(url).then(okFx, notokFx)

                    function okFx(response) {
                        // alert(response);
                    }

                    function notokFx(error) {
                        // alert(error);
                    }
                    alert("Record Resumed");

                } else {
                    alert("Cancelled!!");
                }
                                 $scope.fetchdatafromserver();

            }
        });

    </script>
</head>

<body ng-app="mymodule" ng-controller="mycontroller">
    <br>
    <center>
        <input type="button" name="btn" value="Fetch data from Server" ng-click="fetchdatafromserver();" class="btn btn-primary col-md-4">
    </center>
    <br>
    <div class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Index</th>
                <th scope="col">Uid</th>
                <th scope="col">pwd</th>
                <th scope="col">Mobile</th>
                <th scope="col">Status</th>
                <th scope="col">Delete</th>
                <th scope="col">Block</th>
                <th scope="col">Resume</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="obj in jsonArray">
                <td>{{$index+1}}</td>
                <td>{{obj.uid}}</td>
                <td>{{obj.pwd}}</td>
                <td>{{obj.mobile}}</td>
                <td>{{obj.status}}</td>
                <td><input type="button" value="Delete" ng-click="deleterecord(obj.uid,$index);"></td>
                <td><input type="button" value="Block" ng-click="blockrecord(obj.uid);"></td>
                <td><input type="button" value="Resume" ng-click="resumerecord(obj.uid);"></td>
            </tr>
        </tbody>
    </table>
</div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <title>Share Disease</title>
        <link rel="icon" href="pics/hospital-regular.svg" type="image/icon type" width="50">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JS/jquery-1.8.2.min.js"></script>
    <style>
        .topbg{
            background-color: #a2d9ff;
        }
    </style>
    <script>
        function showpreview(file, imgid) {
            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(imgid).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }

    </script>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-md-12 mt-3 topbg">
                <center>
                    <h2>
                                               <i class="fa fa-share-square-o"></i>

                        Share Disease Information
                                                <i class="fa fa-share-square-o"></i>

                    </h2>
                </center>
            </div>
        </div>
        <br><br>
        <form action="disease-share-process.php" enctype="multipart/form-data" method="post">
            <div class="form-row">
                <div class="form-group  col-md-5">
                    <label for="uid">User id</label>
                    <input type="text" class="form-control" disabled value="<?php echo $_SESSION["uid"];?>" placeholder="Enter user id" id="uid" name="uid">
                </div>
                <div class=" form-group col-md-4 offset-md-2 ">
                    <label for="category">Category</label>

                    <select id="category" name="category" class="form-control">
                        <option selected value="Eyes">Eyes</option>
                        <option value="Skin">Skin</option>
                        <option value="Dental">Dental</option>
                        <option value="Flu(Cold/Viral Infection">Flu(Cold/Viral Infection</option>
                        <option value="Cardiological(Heart)">Cardiological(Heart)</option>
                        <option value="Neurological(Brain)">Neurological(Brain)</option>
                        <option value="Gastro(Digestion)">Gastro(Digestion)</option>
                        <option value="ENT(Ear-Nose-Throat)">ENT(Ear-Nose-Throat)</option>
                        <option value="Other(Not-Listed)">Other(Not-Listed)</option>
                    </select>
                </div>
            </div>
            <div class="form-row ">
                <div class="form-group col-md-6">
                    <label for="dname">Disease Name</label>
                    <input type="text" class="form-control" placeholder="Enter disease name" id="dname" name="dname" required>
                </div>
                <div class="col-md-4 offset-md-2">
                    <label for="available">Available for Calls?</label><br>
                    <div class="form-check form-check-inline col-md-2">
                        <input class="form-check-input" type="radio" name="available" id="available" value="yes" checked>
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline col-md-2">
                        <input class="form-check-input" type="radio" name="available" id="available" value="No">
                        <label class="form-check-label" for="inlineRadio1">No</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="symptoms">Symptoms/Problems</label>
                <textarea cols="10" rows="5" class="form-control"  required id="symptoms" name="symptoms" placeholder="Symptoms"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="recomm">Recommeded Doctors(with contact details):</label>
                    <textarea cols="10" rows="5" class="form-control" required  id="recomm" name="recomm" placeholder="Name and place of the doctor"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="sugg">Suggestions</label>
                    <textarea cols="10" rows="5" class="form-control" required  id="sugg" name="sugg" placeholder="Precautions to be taken"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class=" form-group col-md-5">
                    <label>Upload Pics(if any):</label>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3">
                    <input type="file" name="ppic1" id="ppic1" width="100%" onchange="showpreview(this,prev1);">
                </div>
                <div class="col-md-3 mt-5">
                    <img src="pics/upload.gif" id="prev1" width="100%" alt="No image">
                </div>
                <div class="col-md-3">
                    <input type="file" name="ppic2" id="ppic2" width="100%" onchange="showpreview(this,prev2);">
                </div>
                <div class="col-md-3 mt-5">
                    <img src="pics/upload.gif" id="prev2" width="100%" alt="No image">
                </div>
            </div>
            <br><br>
            <center>
                <input type="submit" name="btn" value="Share Information" class="btn btn-info col-md-3">
            </center>
            <br><br>
        </form>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#a2d9ff" fill-opacity="1" d="M0,128L12,144C24,160,48,192,72,213.3C96,235,120,245,144,250.7C168,256,192,256,216,229.3C240,203,264,149,288,128C312,107,336,117,360,154.7C384,192,408,256,432,250.7C456,245,480,171,504,149.3C528,128,552,160,576,149.3C600,139,624,85,648,69.3C672,53,696,75,720,112C744,149,768,203,792,186.7C816,171,840,85,864,58.7C888,32,912,64,936,112C960,160,984,224,1008,245.3C1032,267,1056,245,1080,240C1104,235,1128,245,1152,234.7C1176,224,1200,192,1224,170.7C1248,149,1272,139,1296,138.7C1320,139,1344,149,1368,149.3C1392,149,1416,139,1428,133.3L1440,128L1440,320L1428,320C1416,320,1392,320,1368,320C1344,320,1320,320,1296,320C1272,320,1248,320,1224,320C1200,320,1176,320,1152,320C1128,320,1104,320,1080,320C1056,320,1032,320,1008,320C984,320,960,320,936,320C912,320,888,320,864,320C840,320,816,320,792,320C768,320,744,320,720,320C696,320,672,320,648,320C624,320,600,320,576,320C552,320,528,320,504,320C480,320,456,320,432,320C408,320,384,320,360,320C336,320,312,320,288,320C264,320,240,320,216,320C192,320,168,320,144,320C120,320,96,320,72,320C48,320,24,320,12,320L0,320Z"></path></svg>
    </div>
</body>

</html>

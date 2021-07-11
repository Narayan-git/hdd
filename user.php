<?php 
    include('include/dbcon.php');
    session_start();
    if(isset($_SESSION['is_login'])){
        $uid=$_SESSION['uid'];
        $uname = $_SESSION['uname'];
        $_SESSION['is_login']=true;
        $_SESSION['u_type']='u';
    }else{
        header("Location : login.php");
    }
    // Welcome Audio section
    $txt = "Welcome User $uname, To Our Health Disease Detection Project User Section";
    $txt = htmlspecialchars($txt);
    $txt = rawurlencode($txt);
    // google translate link
    $html = file_get_contents("https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q=$txt&tl=en-IN");
    $palyer = "<audio controls hidden autoplay><source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio>";
    echo $palyer;
    //auto play audio content is end here
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <title>User Home</title>
    <style>
        .cards .card{
            padding:10px;
            border: 2px solid blue;
            text-align:center;
            height : 330px;
            width: 100px;
            margin-bottom:15px;
        }
        .cards .card:hover{
            background: rgb(134,248,210);
            background: radial-gradient(circle, rgba(134,248,210,1) 0%, rgba(103,246,246,1) 25%, rgba(15,181,209,1) 100%);
            
        }
        .cb:hover{
            color: white;
        }
        .cards .card .cb{
            padding : 10px;
            margin-top : 20px;
            align : center;
        }
        .chart{
            padding:5px;
            margin-left:25%;
            margin-bottom:5%;
            border : 5px solid green;   
        }
    </style>
</head>
<body>
<?php require("include/header.php"); ?>
<div class="container-fluid mt-3">
    <div class="row cards">
        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12"> <!--href="#v-pills-home"  -->
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active"   aria-selected="true" href="uPatientDetail.php">New Patient Register</a>
            <!-- <a class="nav-link" aria-selected="false" role="tab" href="#">Find Patient</a> -->
            <a class="nav-link" aria-selected="false" role="tab" href="uAllTest.php">Report</a>
            <a class="nav-link" aria-selected="false" role="tab" href="uBookTestDB.php">Book Test</a>
            <!-- <a class="nav-link" aria-selected="false" role="tab" href="#">Manage Test Case</a> -->
            <a class="nav-link" aria-selected="false" role="tab" href="SymptomInp.php">View Disease</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <div class="card border border-primary rounded " style="width: 15rem;">
                <img src="static/images/user.jpg" class="card-img-top" alt="User Image">
                <div class="card-body">
                    <h5 class="card-title">PATIENT DASHBOARD</h5>
                    <p class="card-text">Manage Patient </p>
                    <a href="uPatientDashBoard.php" class="btn btn-primary">PATIENT</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <div class="card border border-primary rounded " style="width: 15rem;">
                <img src="static\images\test.jpg" class="card-img-top" alt="Test Image">
                <div class="card-body">
                    <h5 class="card-title">TEST SECTION</h5>
                    <p class="card-text">Manage Test Cases</p>
                    <a href="userTestDashBoard.php" class="btn btn-primary">TEST</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <div class="card border border-primary rounded " style="width: 15rem;">
                <img src="static\images\report.jpg" class="card-img-top" alt="Report Image">
                <div class="card-body">
                    <h5 class="card-title">DETECT DISEASE</h5>
                    <p class="card-text">Detect Disease acording Patient's Symptoms</p>
                    <a href="uDetectDisease.php" class="btn btn-primary">DETECT</a>
                </div>
            </div>
        </div>
        <div class="col-4 border-primary">

        </div>

    </div>
         
</div>

</body>
</html>

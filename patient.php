<?php 
    include('include/dbcon.php');
    session_start();
    if(isset($_SESSION['is_login'])){
        $pid=$_SESSION['uid'];
        $uname = $_SESSION['uname'];
        $_SESSION['is_login']=true;
        $_SESSION['u_type']='p';
    }else{
        header("Location : login.php");
    }
    // Welcome Audio section
    $txt = "Welcome User $uname, To Our Health Disease Detection";
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
    <title>Patient Home</title>
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
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <div class="card border border-primary rounded " style="width: 15rem;">
                <img src="static\images\report.jpg" class="card-img-top" alt="Report Image">
                <div class="card-body">
                    <h5 class="card-title">DETECT DISEASE</h5>
                    <p class="card-text">Detect Disease acording Patient's Symptoms</p>
                    <a href="uSymptomInp.php?pid=<?php echo $pid;?>" class="btn btn-primary">DETECT</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <div class="card border border-primary rounded " style="width: 15rem;">
                <img src="static\images\report.jpg" class="card-img-top" alt="Report Image">
                <div class="card-body">
                    <h5 class="card-title">TEST REPORT</h5>
                    <p class="card-text">Test Report of the Patient</p>
                    <a href="pTestReport.php?pid=<?php echo $pid;?>" class="btn btn-primary">GET REPORT</a>
                </div>
            </div>
        </div>
    </div>
         
</div>

</body>
</html>

<?php 
    session_start();
    if(isset($_SESSION['is_login'])){
        $uid=$_SESSION['uid'];
        $uname = $_SESSION['uname'];
        $_SESSION['is_login']=true;
        $_SESSION['u_type']='a';
        // Welcome Audio section
        $txt = "Welcome Admin To Our Health Disease Detection Project Admin Section";
        $txt = htmlspecialchars($txt);
        $txt = rawurlencode($txt);
        // google translate link
        $html = file_get_contents("https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q=$txt&tl=en-IN");
        $palyer = "<audio controls hidden autoplay><source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio>";
        echo $palyer;
        //auto play audio content is end here
    }else{
        header("Location : login.php");
    }
    
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
    <title>Admin Home</title>
</head>

<body>
    <?php require("include/header.php"); ?>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                <!--href="#v-pills-home"  -->
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" aria-selected="true" href="NewUserReg.php">Add New User</a>
                    <a class="nav-link" aria-selected="false" role="tab" href="usersection.php">Manage User</a>
                    <a class="nav-link" aria-selected="false" role="tab" href="testDashBoard.php">Add New Test</a>
                    <a class="nav-link" aria-selected="false" role="tab" href="adminViewTest.php">Update Test</a>
                    <a class="nav-link" aria-selected="false" role="tab" href="reportDashBoard.php">View Report</a>
                    <a class="nav-link" aria-selected="false" role="tab" href="adminViewTest.php">View Test</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div class="card border border-primary rounded " style="width: 15rem;">
                    <img src="static/images/user.jpg" class="card-img-top" alt="User Image">
                    <div class="card-body">
                        <h5 class="card-title">USER SECTION</h5>
                        <p class="card-text">Manage user </p>
                        <a href="usersection.php" class="btn btn-primary">USER</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div class="card border border-primary rounded " style="width: 15rem;">
                    <img src="static\images\test.jpg" class="card-img-top" alt="Test Image">
                    <div class="card-body">
                        <h5 class="card-title">TEST SECTION</h5>
                        <p class="card-text">Manage Tests</p>
                        <a href="testDashBoard.php" class="btn btn-primary">TEST</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div class="card border border-primary rounded " style="width: 15rem;">
                    <img src="static\images\report.jpg" class="card-img-top" alt="Report Image">
                    <div class="card-body">
                        <h5 class="card-title">REPORT SECTION</h5>
                        <p class="card-text">Manage and View Report</p>
                        <a href="reportDashBoard.php" class="btn btn-primary">REPORT</a>
                    </div>
                </div>
            </div>
            <div class="col-4 border-primary">

            </div>

        </div>

    </div>

</body>

</html>
<?php 
session_start();
require ("include/dbcon.php");
if(isset($_SESSION['is_login'])){
    $uid=$_SESSION['uid'];
    $uname = $_SESSION['uname'];
    $_SESSION['is_login']=true;
    $_SESSION['u_type']='a';
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
    <title>Report Dash Board</title>
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
    <style>
        .cards .card{
            padding:10px;
            border: 2px solid blue;
            text-align:center;
            height : 200px;
            width: 100px;
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
    </style>
</head>
<body>
    <?php include("include/header.php");?>
    <div class="cards">
    <div class="row mb-4 p-5">
        <!-- card 1 -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <a href="adminAllReport.php" class="card-link">
            <div class="card mb-4" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">ALL TEST REPORTS</h5>
                        <p class="card-text">Toatal  
                            <?php 
                                $query ="select count(tr_id) as cnt from transaction where status=1";
                                $result = mysqli_query($connn, $query);
                                $count = mysqli_fetch_assoc($result);
                                echo $count['cnt']." Report (s) <br>";
                            ?> 
                        Date : <?php echo date("d - m - Y");?> </p>
                    <a href="adminAllReport.php" class="cb card-link btn btn-primary">REPORTS</a>
                </div>
            </div>
            </a>
        </div>
        <!-- card 2 -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <a href="adminTdReport.php" class="card-link">
            <div class="card mb-4" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">TODAY'S TEST REPORT</h5>
                        <p class="card-text">Total  
                        <?php 
                                $query ="select count(status) as cnt from transaction where status=0 and DATE(date)=CURDATE()";
                                $result = mysqli_query($connn, $query);
                                $count = mysqli_fetch_assoc($result);
                                echo $count['cnt']." Report (s)";
                            ?>
                        </p>
                    <a href="adminTdReport.php" class=" cb card-link btn btn-primary">Today Report</a>
                </div>
            </div>
            </a>
        </div>
    </div>
</body>
</html>
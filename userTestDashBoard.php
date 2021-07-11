<?php 
session_start();
require ("include/dbcon.php");
if(isset($_SESSION['is_login'])){
    $uid=$_SESSION['uid'];
    $uname = $_SESSION['uname'];
    $_SESSION['is_login']=true;
    $_SESSION['u_type']='u';
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
    <title>Patient Dash Board</title>
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
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
        .chart{
            padding:5px;
            margin-left:25%;
            margin-bottom:5%;
            border : 5px solid green;   
        }
    </style>
</head>
<body>
    <?php include("include/header.php");?>
    <div class="cards">
        <div class="row mb-4 p-5">
            <!-- card 1 -->
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <a href="uPatientResult.php" class="card-link">
            <div class="card mb-4" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">RESULT OF TEST CASES</h5>
                        <p class="card-text">Total  
                        <?php 
                                $query ="select count(*) as cnt from transaction where status=1";
                                $result = mysqli_query($connn, $query);
                                $count = mysqli_fetch_assoc($result);
                                echo $count['cnt'];
                            ?>
                        Date :  <?php echo date("d - m - Y");?> </p>
                    <a href="uPatientResult.php" class=" cb card-link btn btn-primary">Pending</a>
                </div>
            </div>
            </a>
            </div>
            <!-- card 2 -->
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <a href="uBookTestDB.php" class="card-link">
            <div class="card mb-4" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">BOOK TEST</h5>
                        <p class="card-text">Total  
                        <?php 
                                $query ="select count(*) as cnt from transaction";
                                $result = mysqli_query($connn, $query);
                                $count = mysqli_fetch_assoc($result);
                                echo $count['cnt'];
                            ?>
                        Date :  <?php echo date("d - m - Y");?> </p>
                    <a href="uBookTestDB.php" class=" cb card-link btn btn-primary">BOOKING</a>
                </div>
            </div>
            </a>
            </div>
        </div>
    </div>

        <!-- chart start -->
        <div class="card text-center chart" style="width: 50%;">
            <div class="card-body">
                <h1 class="card-title">Last Five Days Report</h1>
                <p class="card-text">Test Cases in our Lab </p>
                <div id="finalChart"></div>
            </div>
        </div>
        <!-- Chart End -->
    
    <!-- script and php for get data from table to Arrays -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <?php
        $q1 = "SELECT  date, COUNT(tr_id ) AS cnt FROM transaction
                WHERE date >= DATE(NOW()) + INTERVAL -5 DAY
                AND date <  DATE(NOW()) + INTERVAL  0 DAY
                GROUP BY date  
                ORDER BY date DESC";
        $r1 = mysqli_query($connn, $q1);
        $i=0;
        $tc=array();
        $date = array();
        while($d1 = mysqli_fetch_assoc($r1)){
            $tc[$i]=$d1['cnt'];
            $date[$i]=$d1['date'];
            $i++;
        }
        $tcP=array();
        for($j= 0; $j<count($date); $j++){
            $q2 = "select  date, COUNT(tr_id ) AS cnt FROM transaction
                WHERE date='".$date[$j]."' and status=0";
            $r2 = mysqli_query($connn, $q2);
            if(mysqli_num_rows($r2)>0){
                $d2 = mysqli_fetch_assoc($r2);
                $tcP[$j]=$d2['cnt'];
            }            
            else
                $tcP[$j]=0;
        }
        $tcC=array();
        for($j= 0; $j<count($date); $j++){
            $q2 = "select  date, COUNT(tr_id ) AS cnt FROM transaction
                WHERE date ='".$date[$j]."' and status=1";
            $r2 = mysqli_query($connn, $q2);
            if(mysqli_num_rows($r2)>0){
                $d3 = mysqli_fetch_assoc($r2);
                $tcC[$j]=$d3['cnt'];
            }
            else
                $tcC[$j]=0;
        }

        // $tc = for Total number of transaction on the date
        // $tcC = for Total completed cases on the date
        // $tcP = for Total Pending cases on the date

    ?>
    <script>
        var totTest= <?php echo json_encode($tc); ?>;
        var pending= <?php echo json_encode($tcP); ?>;
        var complited= <?php echo json_encode($tcC); ?>;
        var dates= <?php echo json_encode($date); ?>;
var options = {
    series: [
      {
        name: "Total Test Case",
        data: totTest,
      },
      {
        name: "Complited Test Case",
        data: complited,
      },
      {
        name: "Pending Test Case",
        data: pending,
      },
    ],
    chart: {
      type: "bar",
      height: 300, // make this 250
      width : 600,
      sparkline: {
        enabled: true, // make this true
      },
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "60%",
        endingShape: "rounded",
        dataLabels: {
              position: 'top',
            },
      },
      
    },
    dataLabels: {
      enabled: true,
      offsetX: -6,
          style: {
            fontSize: '12px',
            colors: ['#fff']
          }
    },
    stroke: {
      show: true,
      width: 2,
      colors: ["transparent"],
    },
    xaxis: {
      categories: dates,
    },
    yaxis: {
      title: {
        text: "Cases (Hundred)",
      },
    },
    fill: {
      opacity: 1,
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val;
        },
      },
      shared: true,
          intersect: false
    },
  };
  
  var chart = new ApexCharts(document.querySelector("#finalChart"), options);
  chart.render();
    
    </script>
</body>
</html>
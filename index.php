<?php 
  session_start();
  // $_SESSION['is_login']=false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap\css\bootstrap.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
    <script src="bootstrap\js\bootstrap.js"></script>
    <script src="bootstrap\js\bootstrap.min.js"></script>
    <style>
        .cmain{
          height : 30%;
          margin : 10%;
          margin-left : 13%;
          /* border-radius: 10px; */
        }
        .cmain img{
          border-radius:10px;
        }
        .detect a{
          color : red;
          font-size: 1.8vw;
          font-weight:bold;
        }
        .detect a:hover{
            color : black;
        }
        .notice{
          border : 5px solid red;
          border-radius:8px;
          font-size:1.5vw;
        }
        .notice a{
          color : green;
        }
    </style>
    <title>Home</title>
</head>
<body>
    <?php
        include('include/header.php');
    ?>
    <div class="detect pt-4">
    <marquee  direction="left" onmouseover="this.stop();" onmouseout="this.start();" class='btn btn-lg btn-outline-warning btn-block'>
        <a type="button" href="pubSymptomInp.php">
          Click To Know Your Disease From your Absolute Symptoms
        </a>
         <a href="#"> | <a> <a type="button" href="https://www.cowin.gov.in/home"> Click COVID Vaccine Register </a>
         <a href="#"> | <a> <a type="button" href="aForDisease.php"> Awarness for any Disease</a>
        </marquee>
    </div>
      <div class="row container-fluid ml-3">
          <div class="notice  rnotice col col-lg-2 col-md-2 col-sm-2 col-xs-2 m-2">
            <div class="h3 bg-success m-2 text-center">NOTICE</div>
            <marquee  scrollamount="5" height="100%"  direction="up" onmouseover="this.stop();" onmouseout="this.start();" class=''>
                    <a type="button" href="pubSymptomInp.php">
                Click To Know Your Disease From your Absolute Symptoms
              </a> <br/> <br/>
              <a type="button" href="https://www.cowin.gov.in/home"> Click COVID Vaccine Register </a>
              <br/> <br/>
              <a type="button" href="aForDisease.php"> Awarness for any Disease</a>
            </marquee>
          </div>
          <div id="carouselExampleCaptions" class="m-2 carousel slide cmain col col-lg-7 col-md-7 col-sm-7 col-xs-7" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="static\images\c1.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5></h5>
                    <p></p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="static\images\c2.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5></h5>
                    <p></p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="static\images\c3.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5></h5>
                    <p></p>
                  </div>
                </div>
              </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="notice col col-lg-2 col-md-2 col-sm-2 col-xs-2 m-2">
          <marquee  scrollamount="5" height="90%" direction="down" onmouseover="this.stop();" onmouseout="this.start();" class=''>
            <a type="button" href="pubSymptomInp.php">
                Click To Know Your Disease From your Absolute Symptoms
              </a> <br/> <br/>
              <a type="button" href="https://www.cowin.gov.in/home"> Click COVID Vaccine Register </a>
              <br/> <br/>
              <a type="button" href="aForDisease.php"> Awarness for any Disease</a>
          </marquee>
        </div>
      </div>
<div class="foot">
    <?php
        include('include/footer.php');
    ?>
</div>
</body>
</html>
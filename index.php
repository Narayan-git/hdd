<?php 
  session_start();
  include('include/dbcon.php');
  // $_SESSION['is_login']=false;
  function get_ip(){
      if(isset($_SERVER['HTTP_CLIENT_IP'])){
          return $_SERVER['HTTP_CLIENT_IP'];
      }
      elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
          return $_SERVER['HTTP_X_FORWARDED_FOR'];
      }
      else{
          return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
      }  
  }
  $ip = get_ip();
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
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg" class= "rounded-circle">
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
        .notice{
          border : 5px solid red;
          border-radius:8px;
          font-size:1.5vw;
        }
        .notice a{
          color : green;
        }
        .p{
            font-size : 1.9vw;
            color : blue;
        }
        .quote{
            color : magenta;
          font-size: 1.8vw;
        }
    </style>
    <title>Home</title>
</head>
<body>
    <?php
        include('include/header.php');
    ?>
    <div class="detect">
         <marquee  direction="left" scrollamount="5" width="100%" onmouseover="this.stop();" onmouseout="this.start();" class='text-center bg-info mt-1'>
            <div class="quote">
                You may not always have a comfortable life. And you will not always be able to solve all the world’s problems all at once. But don’t ever underestimate the impact you can have, because history has shown us that courage can be contagious, and hope can take on a life of its own.
            </div>

        </marquee>
    </div>
     <div class="row container-fluid ml-3">
          <div class="notice  rnotice col col-lg-2 col-md-2 col-sm-2 col-xs-2 m-2">
          <div class="p bg-warning m-2 text-center border rounded">NOTICE</div>
            <marquee  scrollamount="5" height="80%"  direction="up" onmouseover="this.stop();" onmouseout="this.start();" class=''>
                    <a type="button" href="SymptomInp.php">
                Click To Know Your Disease From your Absolute Symptoms
              </a> <br/> <br/>
              <a type="button" href="https://www.cowin.gov.in/home"> Click COVID Vaccine Register </a>
              <br/> <br/>
              <a type="button" href="ForDisease.php"> Awarness for any Disease</a>
            </marquee>
          </div>
                <div id="carouselExampleCaptions" class=" m-2 carousel slide cmain col col-lg-7 col-md-7 col-sm-7 col-xs-7" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="static/images/c1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5></h5>
                    <p></p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="static/images/c2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5></h5>
                    <p></p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="https://www.cowin.gov.in/assets/images/largest-vaccine-banner.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5></h5>
                    <p></p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="static/images/c3.jpg" class="d-block w-100" alt="...">
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
        <div class="p bg-warning m-2 text-center border rounded">NOTICE</div>
          <marquee  scrollamount="5" height="80%" direction="down" onmouseover="this.stop();" onmouseout="this.start();" class=''>
            <a type="button" href="SymptomInp.php">
                Click To Know Your Disease From your Absolute Symptoms
              </a> <br/> <br/>
              <a type="button" href="https://www.cowin.gov.in/home"> Click COVID Vaccine Register </a>
              <br/> <br/>
              <a type="button" href="ForDisease.php"> Awarness for any Disease</a>
          </marquee>
        </div>
      </div>
      </div>
<div class="foot">
    <?php
        include('include/footer.php');
    ?>
</div>
</body>
</html>
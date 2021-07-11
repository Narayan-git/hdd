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
if(isset($_POST['addNew'])){
    $tname = $_POST['nTestNm']; //new test name from modal
    $nST = $_POST['nNoST']; //number of sub tests from modal
    $query ="insert into test(test_name, No_tests) values('$tname', $nST)";
    if(!mysqli_query($connn, $query))
        die("Error New Test insert ".mysqli_error($connn));
    else{
        echo "<script> alert('Test Creatd Successfully!!!!');</script>";
    }
    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Dash Board</title>
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
            <a href="uAllTest.php" class="card-link">
            <div class="card mb-4" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">TOTAL TEST CASES</h5>
                        <p class="card-text">Toatal  
                            <?php 
                                $query ="select count(tr_id) as cnt from transaction";
                                $result = mysqli_query($connn, $query);
                                $count = mysqli_fetch_assoc($result);
                                echo $count['cnt'];
                            ?> 
                        Date : <?php echo date("d - m - Y");?> </p>
                    <a href="uAllTest.php" class="cb card-link btn btn-primary">All Detail</a>
                </div>
            </div>
            </a>
            </div>
            <!-- card 2 -->
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <a href="uUpdatePending.php" class="card-link">
            <div class="card mb-4" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">UPDATE PENDING TEST CASES</h5>
                        <p class="card-text">Total  
                        <?php 
                                $query ="select count(status) as cnt from transaction where status=0";
                                $result = mysqli_query($connn, $query);
                                $count = mysqli_fetch_assoc($result);
                                echo $count['cnt'];
                            ?>
                        Date :  <?php echo date("d - m - Y");?> </p>
                    <a href="uUpdatePending.php" class=" cb card-link btn btn-primary">Pending</a>
                </div>
            </div>
            </a>
            </div>
        </div>
    </div>

    <!-- FOR MODAL -->

    <div class="modal fade" id="NewTestAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add">ADD NEW TEST</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
            
            <div class="form-group">
                <label for="TestName" class="col-form-label">Test Name : </label>
                <input type="text" class="form-control" id="TestName" name="nTestNm">
            </div>
            <div class="form-group">
                <label for="subtest" class="col-form-label">No. Of SubTests : </label>
                <input type="text" class="form-control" id="subtest" name='nNoST'>
            </div>            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="addNew">ADD</button>
        </div>
      </form>
    </div>
  </div>
</div>

    <!-- MODAL CLOSE -->
       
</body>
</html>
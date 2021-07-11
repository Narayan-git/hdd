<?php
    session_start();
    require ("include/dbcon.php");
    if(isset($_SESSION['is_login'])){
        $uid=$_SESSION['uid'];
        $uname = $_SESSION['uname'];
        $_SESSION['is_login']=true;
        $_SESSION['u_type']='u';
        $pid= $_GET['pid'];
        $pname= $_GET['name'];
    }else{
        header("Location : login.php");
    }
    $query = 'select test_id, test_name from test';
    $result = mysqli_query($connn, $query);
    if(isset($_POST['book'])){
        CheckTest();
    }
    function CheckTest(){
        global $connn,$pid;
        $count = count($_POST['tid']);
            if(!empty($_POST['tid'])) {    
                foreach($_POST['tid'] as $value){
                    $query = "insert into transaction(pid,test_id) values ($pid , $value)";
                    if(!mysqli_query($connn, $query)){
                        die ("Error_1 from CheckTest() ".mysqli_error($connn));
                    }
                    $trid= mysqli_insert_id($connn);
                    $testId = mysqli_query($connn, "select ref_id, name  from test_reference where test_id=$value");
                    while($ins = mysqli_fetch_assoc($testId)){
                        $query = "insert into test_result (tr_id, test_id, sub_test_id, sub_test_name, value) values($trid,$value,".$ins['ref_id'].",'".$ins['name']."',0)" ;
                        if(!mysqli_query($connn,$query))
                            die ("Error_2 from CheckTest() ".mysqli_error($connn));
                    }                                        
                }
            }
        header("Location: uPatientDetail.php");   
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Test</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <style>
        td:hover{
            background: rgb(10,135,94);
            background: radial-gradient(circle, rgba(10,135,94,1) 0%, rgba(5,89,103,1) 100%);
            color : white;
            font-weight: bold;
        }
        td{
            font-family:"Arial, sans-serif";
            font-size : 1.5vw;
        }
        th,td{
            padding :15px;
        }
        .bookTest label{
            font-size:2vw;
            background: #FF0000;
            background: -webkit-linear-gradient(to left, #FF0000 31%, #000000 100%);
            background: -moz-linear-gradient(to left, #FF0000 31%, #000000 100%);
            background: linear-gradient(to left, #FF0000 31%, #000000 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;

        }
        /* .newUserForm input{
            font-size:1vw;
        } */
        .bookTest{
            border-style: solid;
            border-width: 5px;
            margin-bottom : 50px;
            margin-top : 20px;
        }
        .bookTest input{
            height :30px;
            width : 30px;
            color : red;
        }
        .bookTest h1{
            font-size:4vw;
            background: #060B47;
            background: -webkit-radial-gradient(circle farthest-corner at center center, #060B47 17%, #7A3874 48%, #4CED40 94%);
            background: -moz-radial-gradient(circle farthest-corner at center center, #060B47 17%, #7A3874 48%, #4CED40 94%);
            background: radial-gradient(circle farthest-corner at center center, #060B47 17%, #7A3874 48%, #4CED40 94%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body>
    <?php require "include/header.php"; ?>
    <div class="bookTest  text-center mx-auto w-50 p-3" id="userForm">
    <form action="" method="post">
    <img class="md-3 rounded mx-auto d-block" src="static/images/logo/newuser.png" alt="" height='200' width='200'>
                <h1 class="text-center mb-3">Book Tests For Patient</h1>
                <h4 class="text-center mb-2">Name : <?php echo $pname;?></h4>
            <?php
            $lst='';
            while($option= mysqli_fetch_assoc($result)){
                $lst=$lst."<div class='form-group row'>
                <label class='col-sm-8 col-form-label'>$option[test_name] </label> 
                    <div class='col-sm-2'>
                    <input type='checkbox' value='$option[test_id]' name = 'tid[]'>
                    </div>
                </div>";
            }
            echo $lst;
                ?>
        <button type="submit" name='book' class="btn btn-outline-success btn-block">BOOK TEST</button>
    </form>
    </div>
</body>
</html>

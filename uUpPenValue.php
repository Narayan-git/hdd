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
    $submit=$_GET['test_id'];   
    
    if(isset($_POST['update'])){
        UpdateVal();
    }
    
    //For generating perticular form for test
    function TestForm(){
        global $connn,$heading, $submit;
        $selected = $_GET['test_id'];
                    $tr_id = $_GET['tr_id'];
                    $name = $_GET['name'];
                    $query = "select * from test where test_id= $selected";
                    $result = mysqli_query($connn, $query);
                    $data = mysqli_fetch_assoc($result);
                    $heading = $data['test_name'];
                    $submit= $data['test_id'];
                    $query = "select * from test_reference where test_id=$selected";
                    $result = mysqli_query($connn, $query);
                    $tblData = $result;
                    $form= "<form id='form_user' method='POST' >
                        <img class='md-3 rounded mx-auto d-block' src='static/images/logo/newuser.png' alt='' height='200' width='200'>
                        <h1 class='text-center mb-4'>$heading Test</h1>";
                    $form.="<div class='form-group row'>
                                <label for='tr_id' class='col-sm-8 col-form-label'>Transaction Id :</label>
                                <div class='col-sm-3'>
                                    <input type='text' name='tr_id' class='form-control'readonly value= '$tr_id'>
                                </div>                
                            </div>";
                    $form.="<div class='form-group row'>
                                <label for='name' class='col-sm-8 col-form-label'>Patitent Name :</label>
                                <div class='col-sm-3'>
                                    <input type='text' name='name' class='form-control'readonly value= '$name'>
                                </div>                
                            </div>";
      
                  $sub_q ="select value from test_result where test_id = $selected and tr_id= $tr_id";
                  $value_res = mysqli_query($connn,$sub_q);
                    $row= mysqli_num_rows($result);
                    while($data = mysqli_fetch_assoc($result)){
                          $values=mysqli_fetch_assoc($value_res);
                          $form.="<div class='form-group row'>
                                        <label for='name' class='col-sm-8 col-form-label'>".$data['name']." ( ".$data['unit']." ) :</label>
                                        <div class='col-sm-3'>
                                            <input type='text' class='form-control' name='".$data['ref_id']."' value= '".$values['value']."'/>
                                        </div>                
                                    </div>";
                                //$form.=$data['name']." ( ".$data['unit']." ) <input type='text' name='".$data['ref_id']."' value= '".$values['value']."'></input><br>";
                        }
                    $form.="<input type='submit' class='btn btn-outline-success btn-lg btn-block' name='update' value='UPDATE'/></form>";
                    echo $form;
    }

    function UpdateVal(){
        
        global $connn, $submit;
        $tr_id = $_GET['tr_id'];
        $query = "select * from test_result where test_id=$submit and tr_id= $tr_id";
        $result = mysqli_query($connn, $query);
        $inp_val=array(array());
        $i=0;
        while($data= mysqli_fetch_assoc($result)){
            $a=$data['sub_test_id'];
            $subqry= "update test_result set value = ".$_POST[$a]." ,status=1 where sub_test_id =$a and tr_id= $tr_id";
            if(!mysqli_query($connn, $subqry))
                die("Error Updateval() : ".mysqli_error($connn));
        }
        
        $query = "update transaction set status=1 where tr_id=$tr_id and test_id=$submit";
        if(!mysqli_query($connn, $query))
            die("Error occure update transaction ".mysqli_error($connn));
            echo "<script>alert('Update Successfull');
            window.location.href='uUpdatePending.php';
            </script>";
        //For reloading the page
        // header("refresh: 0.001");
        // header("Location: uAllTest.php");
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Test Detail</title>
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <style>
        .update label{
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
        .update{
            border-style: solid;
            border-width: 5px;
            margin-bottom : 50px;
            margin-top : 20px;
        }
        .update h1{
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
    <?php include("include/header.php");?>
    <div class="update  text-center mx-auto w-50 p-3">
            <?php
                  TestForm();              
                ?>
    </div>

</body>
</html>
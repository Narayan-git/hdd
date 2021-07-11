<?php
    include('include/dbcon.php');
    session_start();
        if(isset($_POST['signin'])){
          signIn();
        }
    function signIn(){
        global $connn,$flag;
        $uid = (int)$_POST['uid'];
        $password = $_POST['password'];
        $query = "select uid, status from login where uid=$uid and DATE(date) = CURDATE()";
        $logR= mysqli_query($connn,$query);
        $logRdata =mysqli_fetch_assoc($logR);
        if($logRdata['status']==0){
          $query ="select * from hdduser where uid=$uid and password='$password'";
          // f_name,l_name,uid,password,u_type
          $result= mysqli_query($connn, $query);
          if(mysqli_num_rows($result)==1){
                  $data =mysqli_fetch_assoc($result);
                  $query ="insert into login(uid, u_type, status) values(".$data['uid'].",".$data['u_type'].",1)";
                  if(!mysqli_query($connn,$query))
                      die("Error from insert in login table".mysqli_error($connn));
                  if($data['u_type']==1){
                      $_SESSION['uid']=$uid;
                      $_SESSION['uname']=$data['f_name'].' '.$data['l_name'];
                      $_SESSION['is_login']=true;
                      $_SESSION['u_type']='a';
                      // $flag=true;
                      header("Location: admin.php");
                  }else if($data['u_type']==0){
                      $_SESSION['uid']=$uid;
                      $_SESSION['uname']=$data['f_name'].' '.$data['l_name'];
                      $_SESSION['is_login']=true;
                      $_SESSION['u_type']='u';
                      // $flag=true;
                      header("Location: user.php");
            }
          }else{
              unset($_SESSION['is_login']);
              echo "<script> alert('Please Enter Correct User Id and Password');</script>";}
      }elseif($logRdata['status']==1){
        unset($_SESSION['is_login']);
        echo "<script> alert('$uid Loged in another system Please Logout');</script>";
        $query ="update login set status=0 where uid=$uid and DATE(date) = CURDATE()";
                if(!mysqli_query($connn,$query))
                    die("<script> alert('$uid Log Out Error.... Contact To admin');</script>");
                else{
                  echo "<script> alert('$uid Log Out Successfull');</script>";
                }
      }
        
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Signin</title>
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
    <style>
      .formlogin label{
            font-size:2vw;
            background: #FF0000;
            background: -webkit-linear-gradient(to left, #FF0000 31%, #000000 100%);
            background: -moz-linear-gradient(to left, #FF0000 31%, #000000 100%);
            background: linear-gradient(to left, #FF0000 31%, #000000 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;

        }
    </style>   
    <!-- Custom styles for this template -->
  </head>
  <body >
  <?php require "include/header.php";?>
  <br>
<div class=" mx-auto text-center w-50 p-3 h-auto border border-primary" >
<form class="formlogin " method='POST'>
  <img class="mb-4" src="static\images\logo\profile.png" alt="Login" width="150" height="150">
  <!-- <h1 class="h3 mb-3 font-weight-normal">Please Sign In</h1> -->

  <div class="form-group row">
      <label for="fname" class="col-sm-4 col-form-label">User ID</label>
      <div class="col-sm-6">
          <input type="text" class="form-control" placeholder="Enter User ID" id="uid" name='uid' required autofocus>
      </div>                
  </div>
  <div class="form-group row">
      <label for="fname" class="col-sm-4 col-form-label">Password</label>
      <div class="col-sm-6">
        <input type="password" id="inputPassword" class="form-control mb-3" placeholder="Password" name='password' required>
      </div>                
  </div>  
  <div class="checkbox mb-3">
      <a href="patientlogin.php">Sign in as Patient</a>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name='signin'>Sign in</button>
</form>
</div>
  </body>
</html>
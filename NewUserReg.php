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

if(isset($_POST['register'])){
    register();
    header("Location: usersection.php");
}
function register(){
    global $connn;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = date('Y-m-d',strtotime($_POST['dob']));
    $mobile = $_POST['mobile'];
    $email  = $_POST['email'];
    $password = $_POST['password'];
    $add = $_POST['add'];
    $query ="insert into hdduser(u_type, f_name, l_name, gender, dob, mobile, email, password, address)
     values(0, '$fname', '$lname', '$gender', '$dob', $mobile, '$email', '$password', '$add')";
    if(!mysqli_query($connn,$query))
        die("Error from Register in users table".mysqli_error($connn));
    else{
        echo "<script>alert('New User Register Successfull');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <style>
        .newUserForm label{
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
        .newUserForm{
            border-style: solid;
            border-width: 5px;
            margin-bottom : 50px;
            margin-top : 20px;
        }
        .newUserForm h1{
            font-size:4vw;
            background: #060B47;
            background: -webkit-radial-gradient(circle farthest-corner at center center, #060B47 17%, #7A3874 48%, #4CED40 94%);
            background: -moz-radial-gradient(circle farthest-corner at center center, #060B47 17%, #7A3874 48%, #4CED40 94%);
            background: radial-gradient(circle farthest-corner at center center, #060B47 17%, #7A3874 48%, #4CED40 94%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
    <title>New User Registration</title>
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
</head>
<body>
    <?php require "include/header.php";?>
    <br>
    <br>
    <div class="newUserForm  text-center mx-auto w-50 p-3" id="userForm">
            <form id="form_user" method="POST" class="needs-validation" novalidate>
                <img class="md-3 rounded mx-auto d-block" src="static/images/logo/newuser.png" alt="" height='200' width='200'>
                <h1 class="text-center mb-4">New User Registration</h1>

                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label">First Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="fname" class="form-control" required>
                    </div>                
                </div>

                <div class="form-group row">
                    <label for="lname" class="col-sm-4 col-form-label">Last Name</label> 
                    <div class="col-sm-8">
                        <input type="text" name="lname"class="form-control" required>
                    </div>                
                </div>

                <div class="form-group row ">
                    <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-2 form-check form-check-inline">
                        <input type="radio" name="gender" value="M"class="form-check-input form-control"> <label class="form-check-label">Male  </label>
                    </div>                
                    <div class="col-sm-3 form-check form-check-inline">
                        <input type="radio" name="gender" value="F"class="form-check-input form-control"> <label class="form-check-label">Female </label>
                    </div>                
                    <div class="col-sm-3 form-check form-check-inline">
                        <input type="radio" name="gender" value="O"class="form-check-input form-control"> <label class="form-check-label">Other </label>
                    </div>                
                </div>

                <div class="form-group row">
                    <label for="dob" class="col-sm-4 col-form-label">DOB</label> 
                    <div class="col-sm-8">
                        <input type="date" name="dob" id="dob" class="form-control form-group" required>
                    </div>                
                </div>
                
                <div class="form-group row">
                    <label for="mobile" class="col-sm-4 col-form-label">Mobile</label>
                    <div class="col-sm-8">
                        <input type="text" name="mobile" id="mobile" class="form-control" required>
                    </div>                
                </div>
                
                <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">Email Id</label>
                    <div class="col-sm-8">
                    <input type="email" name="email" class="form-control" required>
                    </div>                
                </div>
                <div class="form-group row">
                <label for="password" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                    <input type="text" name="password" id="p" class="form-control" required>
                    </div>                
                </div>
                <div class="form-group row">
                <label for="rp" class="col-sm-4 col-form-label">Re-Enter password</label>
                    <div class="col-sm-8">
                        <input type="password" name="rp" id="rp" class="form-control" required>
                    </div>                
                </div>
                <div class="form-group row">
                <label for="address" class="col-sm-4 col-form-label">Address</label>
                    <div class="col-sm-8">
                        <textarea id="add" name="add" rows="3" cols="50" class="form-control"></textarea>
                    </div>                
                </div>
                <input type="submit" class="btn btn-outline-success btn-lg btn-block" name="register" value="Register" id="register">
        </form>
            </div>

            <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</body>
</html>
<?php
    include('include/dbcon.php');
    session_start();
    if(isset($_SESSION['is_login'])){
        $uid=$_SESSION['uid'];
        $uname = $_SESSION['uname'];
        $_SESSION['is_login']=true;
        $_SESSION['u_type']='a';
    }else{
        header("Location : login.php");
    }
    $u_uid = $_GET['uuid'];
    $query ="select * from hdduser where uid=$u_uid";
    $result = mysqli_query($connn, $query);
    $data =mysqli_fetch_assoc($result);
        $fname = $data['f_name'];
        $lname = $data['l_name'];
        $gender = $data['gender'];
        $dob = $data['dob'];
        $mobile = $data['mobile'];
        $email  = $data['email'];
        $password = $data['password'];
        $add = $data['address'];

    if(isset($_POST['close'])){
        header("Location: adminPendingTest.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
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
        input:read-only{
            
        }
    </style>
</head>
<body>
<?php require "include/header.php"; ?>
    <div class="newUserForm  text-center mx-auto w-50 p-3" id="userForm">
            <form id="form_user" method="POST" class="needs-validation" novalidate>
                <img class="md-3 rounded mx-auto d-block" src="static/images/logo/edituser.png" alt="" height='200' width='200'>
                <h1 class="text-center mb-4">User's Detail</h1>

                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label" >First Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="fname" class="form-control" value="<?php echo $fname;?>" required>
                    </div>                
                </div>

                <div class="form-group row">
                    <label for="lname" class="col-sm-4 col-form-label" >Last Name</label> 
                    <div class="col-sm-8">
                        <input type="text" name="lname"class="form-control" value="<?php echo $lname ;?>" required>
                    </div>                
                </div>

                <div class="form-group row ">
                    <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-2 form-check form-check-inline">
                        <input type="radio" name="gender" value="M"class="form-check-input form-control" <?php if($gender=="M"){ echo "checked";}?>> <label class="form-check-label">Male  </label>
                    </div>                
                    <div class="col-sm-3 form-check form-check-inline">
                        <input type="radio" name="gender" value="F"class="form-check-input form-control" <?php if($gender=="F"){ echo "checked";}?>> <label class="form-check-label">Female </label>
                    </div>                
                    <div class="col-sm-3 form-check form-check-inline">
                        <input type="radio" name="gender" value="O"class="form-check-input form-control" <?php if($gender=="O"){ echo "checked";}?>> <label class="form-check-label">Other </label>
                    </div>                
                </div>

                <div class="form-group row">
                    <label for="dob" class="col-sm-4 col-form-label">DOB</label> 
                    <div class="col-sm-8">
                        <input type="date" name="dob" id="dob" class="form-control form-group" value="<?php echo $dob;?>" required>
                    </div>                
                </div>
                
                <div class="form-group row">
                    <label for="mobile" class="col-sm-4 col-form-label">Mobile</label>
                    <div class="col-sm-8">
                        <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $mobile;?>" required>
                    </div>                
                </div>
                
                <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">Email Id</label>
                    <div class="col-sm-8">
                    <input type="email" name="email" class="form-control" value="<?php echo $email;?>" required>
                    </div>                
                </div>
                <div class="form-group row">
                <label for="address" class="col-sm-4 col-form-label">Address</label>
                    <div class="col-sm-8">
                        <textarea id="add" name="add" rows="3" cols="50" class="form-control"><?php echo $add;?></textarea>
                    </div>                
                </div>
                <input type="submit" class="btn btn-outline-danger btn-lg btn-block" name="close" value="CLOSE" id="close">
        </form>
            </div>
</body>
</html>
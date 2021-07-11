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
    <title>User Section</title>
    <link rel="stylesheet" href="bootstrap/css/animate.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
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
    </style>
</head>
<body>
    <?php require "include/header.php"; ?>
    <div class="container">
            <h1 class ="text-center mb-3 p-3">Welcome Ueser Section </h1>
            <a href="NewUserReg.php">
                <button >Add New User 
                    <img src="static\images\logo\newstaff.png" height='40' width='40' />
                </button>
            </a>
            <div class="utable text-center">
                <table class = "table" > <header> <h3>All User Detail</h3> </header> 
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">SLNo.</th>
                            <th scope="col">User Id</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Registred Patients</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete User</th>
                        </tr>
                    </thead>
                    <?php 
                        $table ="";
                        $i=0;
                        $query = "select uid, f_name, l_name from hdduser where u_type=0";
                        $result = mysqli_query($connn, $query);
                        while($data = mysqli_fetch_assoc($result)){
                            $i++;
                            $subq = "select count(*) as cnt from profile WHERE uid=".$data['uid'];
                            $subres = mysqli_query($connn, $subq);
                            $cnt=mysqli_fetch_assoc($subres);
                            $table.="<tr>
                                        <td>$i</td>
                                        <td>".$data['uid']."</td>
                                        <td>".$data['f_name']." ".$data['l_name']."</td>
                                        <td>".$cnt['cnt']."</td>
                                        <td>                                            
                                            <a href='user_update.php?uuid=".$data['uid']."' class='btn btn-success'>
                                            EDIT <img src='static/images/logo/update.PNG' />
                                            </a>
                                        </td>
                                        <td>
                                            <a href='userDelete.php?uuid=".$data['uid']."'>
                                            <button name='delete' type='submit' class='btn btn-danger dltbtn' value ='".$data['uid']."' onclick='return checkDelete()'>DELETE
                                                <img src='static/images/logo/remove.PNG' />
                                            </button>
                                            </a>
                                        </td>
                                    </tr>";
                        }
                        echo $table;
                    ?>
                </table>
            </div>
    </div>


    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script>
        function checkDelete(){
            return confirm("Do you Want to delete the Record !!");
        }
    </script>
    <!-- <script type="text/javascript" src="script.js"></script> -->
</body>
</html>
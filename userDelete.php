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

if($_GET['uuid']){
    $u_uid = $_GET['uuid'];
    $query ="delete from hdduser where uid=$u_uid";
    if(!mysqli_query($connn, $query))
        die("Error from delete user ".mysqli_error($connn));
    else{
        echo "<script> alert('$u_uid Record delete Successfully...');</script>";
        header("Location: usersection.php");
    }
}
?>
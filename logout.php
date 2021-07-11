<?php
    require "include/dbcon.php";
    session_start();
    if(isset($_SESSION['is_login'])){
        $uid=$_SESSION['uid'];
        $uname = $_SESSION['uname'];
        logOut($uid);
    }else{
        header("Location : login.php");
    }

    function logOut($uid){
        global $connn;
        $query ="update login set status=0 where uid=$uid and DATE(date) = CURDATE() and status=1";
        if(!mysqli_query($connn,$query))
            die("Logout Error");
            unset($_SESSION['is_login']);
        // $flag=false;
        // unset($_SESSION['uid']);
        unset($_SESSION['uname']);
        // $_SESSION['uname']='abc';

        header("Location: login.php");
    }
?>
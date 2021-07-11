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

if($_GET['ref_id']){
    $r_id = $_GET['ref_id'];
    $t_id = $_GET['t_id'];
    $query ="delete from test_reference where ref_id=$r_id";
    if(!mysqli_query($connn, $query))
        die("Error from delete test reference ".mysqli_error($connn));
    else{
        $query ="update test t set t.No_tests= (select count(*) from test_reference where test_id= $t_id) where test_id= $t_id";
        if(!mysqli_query($connn, $query))
            die("failed at NewSubTest fun second Query".mysqli_error($connn));
        echo "<script> alert('Record delete Successfully...');</script>";
        header("Location: adminViewTest.php");
    }
}
?>
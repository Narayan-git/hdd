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
    <title>Today's Tests</title>
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
</head>
<body>
    <?php include("include/header.php");?>
    <form class="text-center">
        <h1>ALL TEST CASES</h1>
        <table class = "table">
        <thead class="thead-light">
            <tr>
                <th scope="col">SL_No.</th>
                <th scope="col">Transaction ID</th>
                <th scope="col">Test Name</th>
                <th scope="col">Patitent Name</th>
                <th scope="col">Status </th>
                <th scope="col">Report</th>
            </tr>
        </thead>
            <?php
                $query = "select * from transaction where  DATE(date) = CURDATE()";
                $result = mysqli_query($connn, $query);
                $draw="";
                $count = 1;
                while($data = mysqli_fetch_assoc($result)){
                    $draw.="<tr> <td name='sl_$count'>$count</td> <td name='".$data['tr_id']."'>".$data['tr_id']."</td>";

                    $res = mysqli_query($connn,"select test_name from test where test_id =".$data['test_id']);
                    $tname = mysqli_fetch_assoc($res);
                    $draw.= "<td>".$tname['test_name']."</td>";

                    $res = mysqli_query($connn,"select name from profile where pid =".$data['pid']);
                    $name = mysqli_fetch_assoc($res);
                    $draw.= "<td>".$name['name']."</td>";

                    if($data['status']==0)
                        $draw.= "<td>PENDING</td>";
                    else 
                        $draw.= "<td>COMPLETED</td>";
                    if($data['status']==0)
                        $draw.="<td><button type='button' class='btn btn-danger'  disabled>GET REPORT</button> </td></tr>";
                    else
                        $draw.="<td><a href = 'GenReport.php ? tr_id=".$data['tr_id']."& test_id=".$data['test_id']."& pid=".$data['pid']."' class='btn btn-success'>GET REPORT </a></td></tr>";
                    $count+=1;
                }
                echo $draw;
            ?>
        </table>
    </form>
    
</body>
</html>
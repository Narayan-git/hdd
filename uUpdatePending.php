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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> 
    <title>All Test Detail</title>
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
    <style>
        td:hover{
            background: rgb(10,135,94);
            background: radial-gradient(circle, rgba(10,135,94,1) 0%, rgba(5,89,103,1) 100%);
            color : white;
            /* font-weight: bold; */
        }
        td{
            font-family:"Arial, sans-serif";
            font-size : 1.2vw;
        }
        td,th{
            padding:2px;
            margin :2px;
        }
        th{
            font-family:"Arial, sans-serif";
            font-size : 1.5vw;
        }
        form{
            padding :10px;
            margin : 10px;
        }
         .table2{
            margin-left: 10px;
            margin-right:5px;
            max-height:500px;
        }
         .table1{
            margin-left: 5px;
            margin-right:5px;
            max-height:500px;
        }
        thead th{
            position:sticky;
            
        }
    </style>
</head>
<body>
    <?php include("include/header.php");?>
    <div class="row">
        <div class="col-sm-6">
        <form class="text-center">
        <h1>ALL PENDING TEST CASES</h1>
        <input type="text" id="pName" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        <table class = "table1 table table-striped  table-fixed table-responsive" id="tid">
        <thead class="thead-light">
            <tr>
                <th scope="col">SlNo.</th>
                <th scope="col">Transaction ID</th>
                <th scope="col">Test Name</th>
                <th scope="col">Patitent Name</th>
                <th scope="col">Date</th>
                <th scope="col">Status </th>
                <!-- <th scope="col">Report</th> -->
            </tr>
        </thead>
            <?php
                $query = "select * from transaction where status=0";
                $result = mysqli_query($connn, $query);
                $draw="";
                $count = 1;
                while($data = mysqli_fetch_assoc($result)){
                    $sdate = strtotime($data['date']);
                    $sdate = date("d-m-Y",$sdate);
                    $draw.="<tr> <td name='sl_$count' class='col' >$count</td> <td name='".$data['tr_id']."' class='col' >".$data['tr_id']."</td>";

                    $res = mysqli_query($connn,"select test_name from test where test_id =".$data['test_id']);
                    $tname = mysqli_fetch_assoc($res);
                    $draw.= "<td class='col'>".$tname['test_name']."</td>";

                    $res = mysqli_query($connn,"select name from profile where pid =".$data['pid']);
                    $name = mysqli_fetch_assoc($res);
                    $draw.= "<td class='col'>".$name['name']."</td>";
                    $draw.="<td class='col'>$sdate</td>";
                    if($data['status']==0)
                        $draw.= "<td class='col'><a href = 'uUpPenValue.php ? tr_id=".$data['tr_id']."& test_id=".$data['test_id']."& pid=".$data['pid']."& name=".$name['name']."' class='btn btn-danger'>PENDING</a></td>";
                    $count+=1;
                }
                echo $draw;
            ?>
        </table>
    </form>

        </div>
        <div class="col-sm-6">
            <form class="text-center">
                <h1 >ALL TEST CASES</h1>
                <input type="text" id="pNameAll" onkeyup="myFunction1()" placeholder="Search for names.." title="Type in a name">
                <table class = "table table2 table-striped  table-fixed table-responsive mytable" id="tidAll">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">SlNo.</th>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Test Name</th>
                            <th scope="col">Patitent Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status </th>
                            <!-- <th scope="col">Report</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "select * from transaction";
                            $result = mysqli_query($connn, $query);
                            $draw="";
                            $count = 1;
                            while($data = mysqli_fetch_assoc($result)){
                                $sdate = strtotime($data['date']);
                                $sdate = date("d-m-Y",$sdate);
                                $draw.="<tr> <td name='sl_$count'  scope='col'>$count</td> <td name='".$data['tr_id']."' scope='col' >".$data['tr_id']."</td>";

                                $res = mysqli_query($connn,"select test_name from test where test_id =".$data['test_id']);
                                $tname = mysqli_fetch_assoc($res);
                                $draw.= "<td scope='col'>".$tname['test_name']."</td>";

                                $res = mysqli_query($connn,"select name from profile where pid =".$data['pid']);
                                $name = mysqli_fetch_assoc($res);
                                $draw.= "<td scope='col'>".$name['name']."</td>";
                                $draw.="<td scope='col'>$sdate</td>";
                                if($data['status']==0)
                                    $draw.= "<td scope='col'><a href = 'uUpdateValue.php ? tr_id=".$data['tr_id']."& test_id=".$data['test_id']."& pid=".$data['pid']."& name=".$name['name']."' class='btn btn-danger btn-sm'>PENDING</a></td>";
                                else 
                                    $draw.= "<td scope='col'><a href = 'uUpdateValue.php ? tr_id=".$data['tr_id']."& test_id=".$data['test_id']."& pid=".$data['pid']."& name=".$name['name']."' class='btn btn-success btn-sm'>EDIT/UPDATE</a></td>";
                                $count+=1;
                            }
                            echo $draw;
                        ?>
                        </tbody>
                </table>
            </form>
        </div>
    </div>
    
    
    <script>
    function checkDelete(){
            return confirm("Do you Want to delete the Record !!");
        }
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("pName");
            filter = input.value.toUpperCase();
            table = document.getElementById("tid");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }       
            }
        }

        function myFunction1() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("pNameAll");
            filter = input.value.toUpperCase();
            table = document.getElementById("tidAll");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }       
            }
        }
    </script>
</body>
</html>
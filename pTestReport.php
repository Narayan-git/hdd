<?php 
session_start();
require ("include/dbcon.php");
if(isset($_SESSION['is_login'])){
    $pid=$_SESSION['uid'];
    $uname = $_SESSION['uname'];
    $_SESSION['is_login']=true;
    $_SESSION['u_type']='p';
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
    <title>All Test Detail</title>
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <style>
        td:hover{
            background: rgb(10,135,94);
            background: radial-gradient(circle, rgba(10,135,94,1) 0%, rgba(5,89,103,1) 100%);
            color : white;
            font-weight: bold;
        }
        td{
            font-family:"Arial, sans-serif";
            font-size : 1.2vw;
        }
        th{
            font-family:"Arial, sans-serif";
            font-size : 1.5vw;
        }
        th,td{
            padding :10px;
        }
        form{
            padding :10px;
            margin : 10px;
        }
    </style>
</head>
<body>
    <?php include("include/header.php");?>
    <form class="text-center">
        <h1>ALL TEST CASES</h1>
        <input type="text" class="mb-3" id="pName" onkeyup="myFunction()" placeholder="Search for test.." title="Type in a name">
        <table class = "table" id="tid">
        <thead class="thead-light">
            <tr>
                <th scope="col">SL_No.</th>
                <th scope="col">Transaction ID</th>
                <th scope="col">Test Name</th>
                <th scope="col">Date</th>
                <th scope="col">Status </th>
                <th scope="col">Report</th>
            </tr>
        </thead>
            <?php
                $query = "select * from transaction where pid=$pid";
                $result = mysqli_query($connn, $query);
                $draw="";
                $count = 1;
                while($data = mysqli_fetch_assoc($result)){
                    $draw.="<tr> <td name='sl_$count'>$count</td> <td name='".$data['tr_id']."'>".$data['tr_id']."</td>";

                    $res = mysqli_query($connn,"select test_name from test where test_id =".$data['test_id']);
                    $tname = mysqli_fetch_assoc($res);
                    $draw.= "<td>".$tname['test_name']."</td>";

                    $draw.="<td>$data[date]</td>";
                    if($data['status']==0)
                        $draw.= "<td style='background-color:red;color:white;'>PENDING</td>";
                    else 
                    $draw.= "<td style='background-color:green;'>COMPLETED</td>";

                    if($data['status']==0)
                        $draw.="<td><button type='button' class='btn btn-danger'  disabled>IN PROCESS</button> </td></tr>";
                    else
                        $draw.="<td><a href = 'GenReport.php ? tr_id=".$data['tr_id']."& test_id=".$data['test_id']."& pid=".$data['pid']."' class='btn btn-success'>GET REPORT </a></td></tr>";
                    $count+=1;
                }
                echo $draw;
            ?>
        </table>
    </form>
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
                td = tr[i].getElementsByTagName("td")[2];
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
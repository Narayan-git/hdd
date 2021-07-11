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
    <title>Patents Detail</title>
    <link rel="stylesheet" href="bootstrap/css/animate.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
            font-size : 1.5vw;
        }
        th,td{
            padding :15px;
        }
        #pName{
            margin-left : 75%;
        }
    </style>
</head>
<body>
    <?php require "include/header.php"; ?>
    <div class="container p-5">
            <div class="utable text-center">
            <input type="text" id="pName" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                <table class = "table" id="tid" > <header> <h3>All Patients Detail</h3> </header> 
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">SLNo.</th>
                            <th scope="col">Patient Id</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Age</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">City</th>                            
                            <th scope="col">Pending Test</th>
                            <th scope="col">TEST BOOKING</th>
                        </tr>
                    </thead>
                    <?php 
                        $table ="";
                        $i=0;
                        $query = "select * from profile where uid=$uid";
                        $result = mysqli_query($connn, $query);
                        while($data = mysqli_fetch_assoc($result)){
                            $i++;
                            $table.="<tr>
                                        <td>$i</td>
                                        <td>".$data['pid']."</td>
                                        <td>".$data['name']."</td>";
                            if($data['gender']==='M')
                                $table.="<td>MALE</td>";
                            else if($data['gender']==='F')
                                $table.="<td>FEMALE</td>";
                            else if($data['gender']==='O')
                                $table.="<td>OTHER</td>";
                                $table.="<td>".$data['age']."</td>
                                        <td>".$data['mobile']."</td>
                                        <td>".$data['city']."</td>";
                                        $sq = "select count(*) as cnt from transaction where pid=$data[pid]";
                                        $sr = mysqli_query($connn, $sq);
                                        $sd = mysqli_fetch_assoc($sr);
                                        
                                        $table.="<td>".$sd['cnt']."</td>
                                        <td>                                            
                                            <a href='uBookTest.php?pid=".$data['pid']."& name=".$data['name']."' class='btn btn-danger'>
                                            BOOK <img src='static/images/logo/update.PNG' />
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
    <!-- <script type="text/javascript" src="script.js"></script> -->
</body>
</html>
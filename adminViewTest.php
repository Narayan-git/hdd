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
if(isset($_POST['addNewST']))
    NewSubTest();

function NewSubTest(){
    global $connn;
    $T_Id=(int)$_POST['nTestId'];
    $name=$_POST['nSTNm'];
    $min=(float)$_POST['nmin'];
    $max=(float)$_POST['nmax'];
    $unit=$_POST['nunit'];
    $query="insert into test_reference(test_id, name, minimum_range, maximum_range, unit) values($T_Id, '$name', $min, $max, '$unit')";
    if(!mysqli_query($connn, $query)){
        die("Record Insert Failed".mysqli_error($connn));
    }
    else{
        $query ="update test t set t.No_tests= (select count(*) from test_reference where test_id= $T_Id) where test_id= $T_Id";
        if(!mysqli_query($connn, $query))
            die("failed at NewSubTest fun second Query".mysqli_error($connn));
        echo '<script>alert("Insert Success");
            window.location.href="adminViewTest.php";
        </script>';
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
            padding :5px;
        }
        form{
            padding :10px;
            margin : 10px;
        }
    </style>
</head>
<body>
    <?php include("include/header.php");?>

    <form class="text-center" method="POST">
        <h1>ALL TEST DASH BOARD</h1>
        <table class = "table" id='tid'>
        <thead class="thead-light">
            <tr>
                <th scope="col">SL_No.</th>
                <th scope="col">Test ID</th>
                <th scope="col">Test Name</th>
                <th scope="col">Sub Tests</th>
                <th scope="col">Edit</th>
                <th scope="col">Add</th>
            </tr>
        </thead>
            <?php
                $query = "select * from test ";
                $result = mysqli_query($connn, $query);
                $draw="";
                $count = 1;
                while($data = mysqli_fetch_assoc($result)){
                    $draw.="<tr> <td name='sl_$count'>$count</td> <td name='".$data['test_id']."'>".$data['test_id']."</td>";
                    $draw.= "<td>".$data['test_name']."</td>";
                    $draw.= "<td>".$data['No_tests']."</td>";
                    $draw.="<td><a href = 'adminManageSubTest.php ?test_id=".$data['test_id']."' class='btn btn-info'>EDIT/VIEW</a></td>";
                    $draw.="<td><button type='button' id='addsts' data-toggle='modal' data-target='#addST' name='addnst' class='btn btn-success' value='".$data['test_id']."'>ADD</button></td></tr>";
                    $count+=1;
                }
                echo $draw;
            ?>
        </table>
    </form>

    <!-- FOR MODAL ADD button-->

    <div class="modal fade" id="addST" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add">ADD NEW SUB TEST</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
        <div class="form-group">
                <label for="nTestId" class="col-form-label">Test ID : </label>
                <input type="text" class="form-control" id="nTestId" name="nTestId" readonly>
            </div>
            <div class="form-group">
                <label for="STName" class="col-form-label">Sub Test Name : </label>
                <input type="text" class="form-control" id="STName" name="nSTNm">
            </div>
            <div class="form-group">
                <label for="nmin" class="col-form-label">Minimum Range : </label>
                <input type="text" class="form-control" id="nmin" name='nmin'>
            </div>
            <div class="form-group">
                <label for="nmax" class="col-form-label">Maximum Range : </label>
                <input type="text" class="form-control" id="nmax" name="nmax">
            </div>
            <div class="form-group">
                <label for="nunit" class="col-form-label">Unit : </label>
                <input type="text" class="form-control" id="nunit" name="nunit">
            </div>
                        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="addNewST">ADD</button>
        </div>
      </form>
    </div>
  </div>
</div>

    <!-- MODAL CLOSE -->
    <script>
        var stest=document.getElementById('tid'),rIndex;
        for(var i = 0; i< tid.rows.length; i++){
            stest.rows[i].onclick = function(){
                rIndex = this.rowIndex;
                document.getElementById('nTestId').value=this.cells[1].innerHTML;
            }
        }
        
    </script>
</body>
</html>
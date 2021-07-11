<?php 
session_start();

require ("include/dbcon.php");
if(isset($_SESSION['is_login'])){
    $uid=$_SESSION['uid'];
    $uname = $_SESSION['uname'];

    $t_Id = $_GET['test_id'];

    $_SESSION['is_login']=true;
    $_SESSION['u_type']='a';
}else{
    header("Location : login.php");
}
if(isset($_POST['EditST']))
    UpdSubTest();

function UpdSubTest(){
    global $connn,$t_Id;
    $ref_Id=$_POST['eSTestId'];
    $name=$_POST['eSTNm'];
    $min=(float)$_POST['emin'];
    $max=(float)$_POST['emax'];
    $unit=$_POST['eunit'];
    $query="update test_reference set name='$name', minimum_range=$min, maximum_range=$max, unit='$unit' where ref_id= $ref_Id";
    if(!mysqli_query($connn, $query)){
        die("Record Insert Failed".mysqli_error($connn));
    }
    else{
        echo "<script>alert('Update Success');
            window.location.href='adminManageSubTest.php?test_id=".$t_Id."';
        </script>";
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
        <h1>SUBTEST DASH BOARD</h1>
        <table class = "table" id='tid'>
        <thead class="thead-light">
            <tr>
                <th scope="col">SL_No.</th>
                <th scope="col">ID</th>
                <th scope="col">SubTest Name</th>
                <th scope="col">Test Name</th>                
                <th scope="col">Minimum Range</th>
                <th scope="col">Maximum Range</th>
                <th scope="col">Unit</th>
                <th scope="col">Edit</th>
                <th scope="col">Remove</th>
            </tr>
        </thead>
            <?php
                $query = "select * from test_reference where test_id = $t_Id";
                $result = mysqli_query($connn, $query);
                $draw="";
                $count = 1;
                while($data = mysqli_fetch_assoc($result)){
                    $draw.="<tr> <td name='sl_$count'>$count</td> <td name='".$data['ref_id']."'>".$data['ref_id']."</td>";
                    $draw.= "<td>".$data['name']."</td>";
                    $sq = "select test_name from test where test_id =".$data['test_id'];
                    $res = mysqli_query($connn, $sq);
                    $tn = mysqli_fetch_assoc($res);
                    $draw.= "<td>".$tn['test_name']."</td>";
                    $draw.= "<td>".$data['minimum_range']."</td>";
                    $draw.= "<td>".$data['maximum_range']."</td>";
                    $draw.= "<td>".$data['unit']."</td>";
                    $draw.="<td><button type='button' id='editst' data-toggle='modal' data-target='#editSTs' name='editst' class='btn btn-success'>EDIT</button></td>";
                    $draw.="<td><a href = 'subTestDlt.php ?ref_id=".$data['ref_id']."&t_id=".$data['test_id']."' class='btn btn-info' onclick='return checkDelete()'>REMOVE</a></td></tr>";
                    $count+=1;
                }
                echo $draw;
            ?>
        </table>
    </form>

    

    <!-- FOR MODAL ADD button-->

    <div class="modal fade" id="editSTs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add">EDIT / UPDATE SUB TEST</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
        <div class="form-group">
                <label for="eTest" class="col-form-label">Test Name : </label>
                <input type="text" class="form-control" id="eTest" name="eTest" readonly>
            </div>
        <div class="form-group">
                <label for="eSTestId" class="col-form-label">ID : </label>
                <input type="text" class="form-control" id="eSTestId" name="eSTestId" readonly>
            </div>
            <div class="form-group">
                <label for="eSTNm" class="col-form-label">Sub Test Name : </label>
                <input type="text" class="form-control" id="eSTNm" name="eSTNm">
            </div>
            <div class="form-group">
                <label for="emin" class="col-form-label">Minimum Range : </label>
                <input type="text" class="form-control" id="emin" name='emin'>
            </div>
            <div class="form-group">
                <label for="emax" class="col-form-label">Maximum Range : </label>
                <input type="text" class="form-control" id="emax" name="emax">
            </div>
            <div class="form-group">
                <label for="eunit" class="col-form-label">Unit : </label>
                <input type="text" class="form-control" id="eunit" name="eunit">
            </div>
                        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="EditST">UPDATE</button>
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
                document.getElementById('eTest').value=this.cells[3].innerHTML;
                document.getElementById('eSTestId').value=this.cells[1].innerHTML;
                document.getElementById('eSTNm').value=this.cells[2].innerHTML;
                document.getElementById('emin').value=this.cells[4].innerHTML;
                document.getElementById('emax').value=this.cells[5].innerHTML;
                document.getElementById('eunit').value=this.cells[6].innerHTML;
            }
        }
        function checkDelete(){
            return confirm("Do you Want to delete the Record !!");
        }
        
    </script>
</body>
</html>
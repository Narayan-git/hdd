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
    $tr_id = $_GET['tr_id'];

    // get heading of the test
    $test_id =$_GET['test_id'];
    $res = mysqli_query($connn,"select test_name from test where test_id =$test_id");
    $tname = mysqli_fetch_assoc($res);
    $heading=$tname['test_name'];

    $pid =$_GET['pid'];
    $res = mysqli_query($connn,"select * from profile where pid = $pid");
    $pdtl = mysqli_fetch_assoc($res);
    
    $res=array(array());
    $query1 = "select * from test_reference where test_id= $test_id";
    $result1 = mysqli_query($connn, $query1);

    $query2 = "select sub_test_id, sub_test_name, value from test_result where test_id=$test_id and tr_id = $tr_id ";
    $result2 = mysqli_query($connn, $query2);
    $i=0;
    while($inp_val=mysqli_fetch_assoc($result2)){
            $test_range= mysqli_fetch_assoc($result1);
        if($inp_val['sub_test_id']=== $test_range['ref_id']){
            if($inp_val['value']===$test_range['minimum_range'] || $inp_val['value']===$test_range['maximum_range']){
                $res[$i][0]=$inp_val['sub_test_id'];
                $res[$i][1]= $inp_val['sub_test_name'];
                $res[$i][2]=$inp_val['value'];                
                $res[$i][3]=$test_range['minimum_range'];
                $res[$i][4]=$test_range['maximum_range'];
                $res[$i][5]=" Labled";
                $res[$i][6]=1;
            }else if($inp_val['value'] < $test_range['minimum_range']){
                $res[$i][0]=$inp_val['sub_test_id'];
                $res[$i][1]=$inp_val['sub_test_name'];
                $res[$i][2]=$inp_val['value'];                
                $res[$i][3]=$test_range['minimum_range'];
                $res[$i][4]=$test_range['maximum_range'];
                $res[$i][5]=" Low";
                $res[$i][6]=0;
            }else if($inp_val['value'] < $test_range['maximum_range'] && $inp_val['value'] > $test_range['minimum_range']){
                $res[$i][0]=$inp_val['sub_test_id'];
                $res[$i][1]=$inp_val['sub_test_name'];
                $res[$i][2]=$inp_val['value'];                
                $res[$i][3]=$test_range['minimum_range'];
                $res[$i][4]=$test_range['maximum_range'];
                $res[$i][5]=" Labled";
                $res[$i][6]=1;
            }else if($inp_val['value'] > $test_range['maximum_range']){
                $res[$i][0]=$inp_val['sub_test_id'];
                $res[$i][1]=$inp_val['sub_test_name'];
                $res[$i][2]=$inp_val['value'];                
                $res[$i][3]=$test_range['minimum_range'];
                $res[$i][4]=$test_range['maximum_range'];
                $res[$i][5]=" High";
                $res[$i][6]=2;
            }                

        }
        $i+=1;
    }
$count_row = count($res);
$count_col = count(reset($res));
// for draw the result table 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Report</title>
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
        #pName{
            border : 1px solid blue;
            height: 40px;
            width : 20%;
            float : right;
            margin-right : 5%;
            margin-left : 50%;
        }
        #back{
            height: 40px;
            width : 7%;
            float : left;
            margin-left : 5%;
        }
        #pnt{
            height: 40px;
            width : 5%;
            float : right;
            margin-left : 2%;
            margin-right : 5%;
        }

    </style>
</head>
<body>
    <?php include("include/header.php");?>
    <form class="text-center">
        <h1><?php echo "$heading Test";?></h1>
        <div class="form-group row">
            <input type="text" id="pName" class="" onkeyup="myFunction()" placeholder="Search for Subtest.." title="Type in a name">
            <a id ='pnt' class="btn btn-success" target="blank" href="GetReport.php ? tr_id=<?php echo $tr_id;?> & test_id=<?php echo $test_id;?>& pid=<?php echo $pid;?>">Print</a>
        </div>
        
        
        <table class = "table" id="tid">
            <thead class="thead-light">
                <tr>
                    <th scope="col">SL_No.</th>
                    <th scope="col">Test Name</th>
                    <th scope="col">Value</th>
                    <th scope="col">Range</th>
                    <th scope="col">Result</th>
                    <!-- <th scope="col">Report</th> -->
                </tr>
            </thead>
                <?php
                    $draw="";
                    $count = 1;
                    foreach($res as $r){
                        $draw.="<tr>
                                    <td>$count</td>
                                    <td>$r[1]</td>
                                    <td>$r[2]</td>
                                    <td>$r[3] - $r[4]</td>
                                    <td>$r[5]</td>
                                </tr>";
                        $count++;
                    }
                    $_SESSION['prints']=$res;
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
                td = tr[i].getElementsByTagName("td")[1];
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
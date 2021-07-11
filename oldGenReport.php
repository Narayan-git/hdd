<?php
    include('include/dbcon.php');
    session_start();
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
$draw="<table border=2 id='result'><tr><td colspan='4'><h1><u>$heading Test</u></h1></td></tr><tr><th>Test Name</th><th>Input</th><th>Range</th><th>Result</th></tr>";
foreach($res as $r){
    $draw.= "<tr><td>$r[1]</td> <td>$r[2]</td> <td>$r[3] - $r[4]</td> <td>$r[5]</td></tr>";
}
    $draw.="</table>";
echo $draw;
$_SESSION['prints']=$res;
echo "<br>";
echo '<p><a href="GetReport.php ? tr_id='.$tr_id.'& test_id='.$test_id.'& pid='.$pid.'"><input type="submit" name="print" value="Print"></a></p><br>';
echo '<p><a href="pendingTest.php"><input type="button" name="print" value="BACK"></a></p><br>';
?>
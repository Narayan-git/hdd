<?php
    include('include/dbcon.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Cases</title>
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
</head>
<body>
    <form>
        <h1>All Test Cases</h1>
        <table>
            <tr>
                <th>
                    SL_No.
                </th>
                <th>
                    Transaction ID
                </th>
                <th>
                    Test Name
                </th>
                <th>
                    Patitent Name
                </th>
                <th>
                    Status
                </th>
                <th>
                    Change
                </th>
                <th>
                    Report
                </th>
            </tr>
            <?php
                $query = "select * from transaction ";
                $result = mysqli_query($connn, $query);
                $draw="";
                $count = 1;
                while($data = mysqli_fetch_assoc($result)){
                    $draw.="<tr> <td name='sl_$count'>$count</td> <td name='".$data['tr_id']."'>".$data['tr_id']."</td>";

                    $res = mysqli_query($connn,"select Symptom_Name from test where test_id =".$data['test_id']);
                    $tname = mysqli_fetch_assoc($res);
                    $draw.= "<td>".$tname['Symptom_Name']."</td>";

                    $res = mysqli_query($connn,"select name from profile where pid =".$data['pid']);
                    $name = mysqli_fetch_assoc($res);
                    $draw.= "<td>".$name['name']."</td>";

                    if($data['status']==0)
                        $draw.= "<td>PENDING</td>";
                    else 
                        $draw.= "<td>COMPLETED</td>";

                    $draw.="<td><a href = 'updateValue.php ? tr_id=".$data['tr_id']."& test_id=".$data['test_id']."& name=".$name['name']."'> UPDATE </a> </td>";
                    if($data['status']==0)
                        $draw.="<td><button type='button' disabled>GET REPORT</button> </td></tr>";
                    else
                        $draw.="<td><button type='button'><a href = 'GenReport.php ? tr_id=".$data['tr_id']."& test_id=".$data['test_id']."& pid=".$data['pid']."'> GET REPORT </a></button> </td></tr>";
                    $count+=1;
                }
                echo $draw;
            ?>
        </table>
    </form>
</body>
</html>
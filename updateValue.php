<?php
    include('include/dbcon.php');
    $submit='';
    TestForm();
    
    if(isset($_POST[$submit])){
        UpdateVal();
    }
    
    //For generating perticular form for test
    function TestForm(){
        global $connn,$heading, $submit;
              $selected = $_GET['test_id'];
              $tr_id = $_GET['tr_id'];
              $name = $_GET['name'];
              $query = "select * from test where test_id= $selected";
              $result = mysqli_query($connn, $query);
              $data = mysqli_fetch_assoc($result);
              $heading = $data['test_name'];
              $submit= $data['test_id'];
              $query = "select * from test_reference where test_id=$selected";
              $result = mysqli_query($connn, $query);
              $tblData = $result;
              $form= "<form method='post' action=''><h1>$heading Test</h1>";
              $form.="<label>Transaction Id :</label><input readonly value = '$tr_id'><br><label>Patitent Name :</label><input readonly value = '$name'><br>";

            $sub_q ="select value from test_result where test_id = $selected and tr_id= $tr_id";
            $value_res = mysqli_query($connn,$sub_q);
              $row= mysqli_num_rows($result);
              while($data = mysqli_fetch_assoc($result)){
                    $values=mysqli_fetch_assoc($value_res);
                          $form.=$data['name']." ( ".$data['unit']." ) <input type='text' name='".$data['ref_id']."' value= '".$values['value']."'></input><br>";
                  }
              $form.="<input type='submit' name='$submit' value='UPDATE'></form>";
              echo $form;
    }

    function UpdateVal(){
        global $connn, $submit;
        $tr_id = $_GET['tr_id'];
        $query = "select * from test_result where test_id=$submit and tr_id= $tr_id";
        $result = mysqli_query($connn, $query);
        $inp_val=array(array());
        $i=0;
        while($data= mysqli_fetch_assoc($result)){
            $a=$data['sub_test_id'];
            $subqry= "update test_result set value = ".$_POST[$a]." ,status=1 where sub_test_id =$a and tr_id= $tr_id";
            if(!mysqli_query($connn, $subqry))
                die("Error Updateval() : ".mysqli_error($connn));
            
        }
        $query = "update transaction set status=1 where tr_id=$tr_id and test_id=$submit";
        $result = mysqli_query($connn, $query);
        //For reloading the page
        header("refresh: 0.001");
        header("Location: pendingTest.php");            
    }

?>
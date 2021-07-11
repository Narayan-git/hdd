<?php
    session_start();
    require ("include/dbcon.php");
    function Detect($inparray){
        $file = fopen("include/CSV_Data/Disease.csv","r");
        $symptom  = fgetcsv($file);
        array_pop($symptom);
        $array;
        $disease;
        $i=0;
        // for read all csv data from file    
        while($data = fgetcsv($file))
        {
            $array[$i]=$data;
            $col =count(reset($array));
            $disease[$i]=$data[$col-1];
            $i++;
        }
        fclose($file);
    
        $column = count(reset($array));
        $row = count($array);
        // echo "Row is : $row and  Column is : $column<br>";
        // count frequency of Disease in data set
        $count_Disease = array_count_values($disease);
        // store Unique diseases of data set
        $disease = array_unique($disease);
    
        
        //Probabiliy of each disease
        $prob_class;
        foreach($count_Disease as $key=>$value){
            $prob_class[$key]=$value/$row;
        }
        
    // find frequency of symptom present  withrespect disease
        $Symptom_Y;    
        foreach($count_Disease as $k => $v){
            foreach($symptom as $sk => $sv){
                $Symptom_Y[$sv][$k]=0;
            }
        }
    
        foreach($count_Disease as $kd => $vd){
    
            for($i = 0; $i<$row; $i++){
    
                for($j = 0; $j<$column-1; $j++){
                    $sym = $symptom[$j];
                    if( $array[$i][$j] == 1 && $kd == $array[$i][$column-1]){
                        $val=$Symptom_Y[$sym][$kd];
                        $Symptom_Y[$sym][$kd]= (1 + $val);
                        
                    }
                }
            }
        }
    
    // find frequency of symptom absent  withrespect disease
        $Symptom_N;    
        foreach($count_Disease as $k => $v){
            foreach($symptom as $sk => $sv){
                $Symptom_N[$sv][$k]=0;
            }
        }
    
        foreach($count_Disease as $kd => $vd){
    
            for($i = 0; $i<$row; $i++){
    
                for($j = 0; $j<$column-1; $j++){
                    $sym = $symptom[$j];
                    if( $array[$i][$j] == 0 && $kd == $array[$i][$column-1]){
                        $val=$Symptom_N[$sym][$kd];
                        $Symptom_N[$sym][$kd]= (1 + $val);
                        
                    }
                }
            }
        }
    
    // to store the probabiliy of symptom present  withrespect disease
        foreach($Symptom_Y as $key=>$value){
            foreach($value as $vk=>$vv){
                $v = $Symptom_Y[$key][$vk];
                $Symptom_Y[$key][$vk] = $v/ $count_Disease[$vk];
            }
        }
    
    // to store the probabiliy of symptom absent  withrespect disease
        foreach($Symptom_N as $key=>$value){
            foreach($value as $vk=>$vv){
                $v = $Symptom_N[$key][$vk];
                $Symptom_N[$key][$vk] = $v/ $count_Disease[$vk];
            }
        }
    
        // $inparray = array('itching','skin_rash','nodal_skin_eruptions','dischromic _patches');
        // $inparray = array('shivering','chills','watering_from_eyes');
        // $inparray = array(0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,1,1,0,0,0,1,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        
        $myInp ;
    
        // **only symptom name input**
        foreach($symptom as $key=>$value){
            if(in_array($value,$inparray)){
                $myInp[$value]=1;
            }else{
                $myInp[$value]=0;
            }
        }
        
        // ** Input 1 or 0 for all syptoms **{
            // foreach($symptom as $key=>$value){
            //     if($inparray[$key] ==1){
            //         $myInp[$value]=1;
            //     }else{
            //         $myInp[$value]=0;
            //     }
            // }
    
        // close of 1 or 0 section }
      
        // fetching the result withrespect the disease and symptoms
        $result;
        foreach($disease as $key=>$value){
            foreach($symptom as $sv){
                if($myInp[$sv]==1){
                    $result[$sv]=$Symptom_Y[$sv];
                }else if($myInp[$sv]==0){
                    $result[$sv]=$Symptom_N[$sv];
                }
                
            }
        }
    
        $finalResult;
        foreach($prob_class as $key=>$value){
            $finalResult[$key]=$value;
        }
        foreach($symptom as $s){
            foreach($prob_class as $key=>$value){
                $finalResult[$key]= $finalResult[$key] * $result[$s][$key];
            }
        }
        // $maxval = max($finalResult);
        // $resDisease = array_search($maxval, $finalResult);
        return $finalResult;
    }

    function Precution($disease){
        // for read all csv data from file 
        $file = fopen("include/CSV_Data/disease_precaution.csv","r");
        $Heading  = fgetcsv($file);
        $array=array();
        while($data = fgetcsv($file))
        {
            array_push($array,$data);
        }
        fclose($file);
    
        $column = count(reset($array));
        $row = count($array);
        $precursion;
        foreach($array as $key=>$val){
            if($val[0] === $disease){
                for($i=1;$i<5;$i++){
                    $precursion[$i]=$val[$i];
                }
                break;
            }
        }
        return $precursion;
    }

    function Risk($disease){
        // for read all csv data from file 
        $file = fopen("include/CSV_Data/disease_riskFactors.csv","r");
        $Heading  = fgetcsv($file);
        $array;
        $array;
        $i=0;
        while($data = fgetcsv($file))
        {
            $array[$i] = $data;
            $i++;
            // array_push($array,$data);
        }
        fclose($file);
        $rsk=array();
        foreach($array as $key=>$val){
            if($val[1] === $disease){
                array_push($rsk,$val);
                break;
            }
        }
        return $rsk;
    }

    function Medicine($D_id){
        // for read all csv data from file 
        $file = fopen("include/CSV_Data/disease_medicine.csv","r");
        $Heading  = fgetcsv($file);
        $array=array();
        while($data = fgetcsv($file))
        {
            array_push($array,$data);
        }
        fclose($file);
    
        $column = count(reset($array));
        $row = count($array);
        $mdcn=array();
        foreach($array as $val){
            if($val[2] == $D_id){
                    array_push($mdcn,$val);
            }
        }
        return $mdcn;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disease Report</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js" integrity="sha512-dBB2PGgYedA6vzize7rsf//Q6iuUuMPvXCDybHtZP3hQXCPCD/YVJXK3QYZ2v0p7YCfVurqr8IdcSuj4CCKnGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .heading{
            height:150px;
            width :100%;
            margin-top:10px;
            margin-bottom:5px;
            background: rgb(134,248,210);
            background: linear-gradient(180deg, rgba(134,248,210,1) 0%, rgba(239,103,246,1) 25%, rgba(15,181,209,1) 100%);
        }
        .container{
            border: 7px groove #1C6EA4;
            border-radius: 8px;
            margin-bottom:10px;
            padding-bottom:10px;
            /* background-image:url('static/FMULogo.png'); */
            
        }
        .personal{
            font-size:15px;
        }
    </style>

</head>
<body >
    
    <div class="container" id='printReport'>
        <div class="heading ">
            <div class="row">
                <div class="col-sm-2">
                    <img src="static/FMULogo.png" class="img-thumbnail" alt="fmu" style="height : 130px; width : 130px; margin:6px;">
                </div>
                <div class="col-sm-9 text-center">
                    <h1>DISEASE REPORT </h1>
                    <h3>P.G. Department Of Information & Communication Technlogy</h3>
                    <h4> Fakir Mohan University Old Campous VysaVihar, Balasore(19)</h4>
                </div>
            </div>
        </div>
        <div class="report">
            <?php
                if(isset($_POST["sym"]))
                {
                    $symptoms = $_POST["sym"];

                    $pname= $_GET['pname'];
                    $page= $_GET['page'];
                    $pmob= $_GET['pmob'];

                    $finalResult = Detect($symptoms);
                    $maxval = max($finalResult);
                    if($maxval!=0){
                        $Disease = array_search($maxval, $finalResult);
                        $ShowDetail= "<form style='padding-left:10px;'><center><h2><u>Your Disease : $Disease</u></h2></center>";
                        $ShowDetail.="<div class='personal'>
                                        <h2>Patient Detail : </h2>
                                        <span>Name : $pname</span><br>
                                        <span>Age : $page</span><br>
                                        <span>Mobile : $pmob</span>
                                        </div>";
                        $ShowDetail.="<h2> Disease Symptoms:  </h2><p>";
                        $cnt=0;
                        foreach($symptoms as $s){
                            $cnt++;
                            $ShowDetail.=" ( $cnt )  ".str_replace('_',' ',strtoupper($s))."<br>";
                        }
                        $ShowDetail.="</p>";
                        $precut = Precution($Disease);
            
                        $risk = Risk($Disease);
                        $pre1 = explode(",",$risk[0][2]);
                        foreach($pre1 as $p){
                            array_push($precut,$p);
                        }
                        echo $ShowDetail;
                        $medicine = Medicine($risk[0][0]);
                        // $medicine = Medicine(108);

                        $table = "<center><table border='3'>
                        <thead><h2>Treatment for  $Disease Disease</h2></thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Medicine Name</th>
                            <th>Composition</th>
                            <th>Description</th>
                            </tr>";
                        if(count($medicine)>0){
                            $c=0;
                            foreach($medicine as $m){
                                $c++;
                                $table.="<tr><td>$c</td><td>".$m[1].'</td><td>'.$m[3].'</td><td>'.$m[4].'</td></tr>';
                            }
                            $table.="</table></center>";
                            $stsft = 1;
                            echo $table;
                        }else{
                            $stsft = 0;
                            echo"No Medicine Found. <br>Please Consult The $Disease disease Specialist <br>........Thank You.......";
                        }

                        $ShowDetail2='';
                        $ShowDetail2.= "<h2>Precautions and other measures :</h2><p> ";
                        foreach($precut as $pr){
                            $ShowDetail2.=" * $pr<br>";
                        }
                        $ShowDetail2.="</p><h2>About the occurrence of the Disease : </h2><p> * ".$risk[0][3]."
                        </p><h2>Risk Factors : </h2><p> * ".$risk[0][4]."</p>";
                        echo $ShowDetail2; 
                    }            
                    else{
                        echo'We cant Math Any Of Your Symproms,<br>Please..... Consult any Doctor Immideately<br>Thank You .....';
                    }
                    echo "</form>";
                }
            ?>
        </div>
    </div>
    <div class="download text-center mb-5">
                <button class="btn btn-success" onclick="generateReport();">PRINT</button>
    </div>
    <script>
        function generateReport(){
            const invoice= document.getElementById('printReport');
            var fn="<?php echo $pid."".date('_d_m_Y')?>.pdf";
            var opt = {
                    margin:0,
                    filename:fn                    
                    };

            // New Promise-based usage:
            html2pdf().set(opt).from(invoice).save();
        }
    </script>
</body>
</html>
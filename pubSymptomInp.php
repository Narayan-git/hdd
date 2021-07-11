<?php
    session_start();
    require ("include/dbcon.php");
        $s=1;
        function symptomCreate(){
            global $connn;
            $query = 'select s_id, symptom_name from symptom';
            $result = mysqli_query($connn, $query); 
            $lst='';
            while($opt= mysqli_fetch_assoc($result)){
                $lst=$lst."<option value='$opt[symptom_name]'>".str_replace('_',' ',strtoupper($opt['symptom_name']))."</option>";
            }
            echo $lst;
        }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Symptom Input</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="icon" href="static/images/logo/favicon.jpg" type="image/jpg">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <script src="bootstrap/js/repeater.js" type="text/javascript"></script>
    </head>
    <style>
    #repeater_form label{
        font-size:1.4vw;
        font-weight:bold;
        color:magenta;
    }
    p{
        font-size:2.3vw;
        font-weight:bold;
    }
    </style>
<body>
<?php require "include/header.php"; ?>
    <div class="container">
        <br />
        <p class="text-center">Select Your Symptoms </p>
        <br />
        <div style="width:100%; max-width: 800px; margin:0 auto;">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Add Symptom Details</div> -->
                <div class="panel-body">
                    <span id="success_result"></span>
                    <form method="post" target="blank" action="pGetDiseaseReport.php" id="repeater_form">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="pname" id="pname" class="form-control" required/>
                        </div>
                        <div class="form-group row">
                            <div class=" form-group col-sm-6">
                                <label>Age</label>
                                <input type="text" name="page" id="page" class="form-control" required/>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>mobile</label>
                                <input type="text" name="pmob" id="pmob" class="form-control" size=10 required/>
                            </div>
                        </div>
                        
                        <div id="repeater">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn ">Add More Symptom</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Select Symptom</label>
                                                <select data-skip-name="true" data-name="sym[]"  class="form-control">
                                                <option value="null" disabled selected>Selcet Sympton</option>
                                                <?php symptomCreate();?>
                                                </select>
                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" onclick="$(this).parents('.items').remove()" class="btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group" align="center">
                            <br/><br/>
                            <button type="submit" name="insert" class="btn btn-success" >Show Result</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    $(document).ready(function(){
        $('#repeater').createRepeater();

        $('#repeater_form').on('submit', function(event){
            $.ajax({
                url:"uGetDiseaseReport.php",
                method:"POST",
                data:$(this).serialize(),
                success:function(data)
                {
                    $('#repeater_form')[0].reset();
                    $('#repeater').createRepeater();
                    // $('#success_result').html(data);
                }
            })
        });

    });
        
    </script>
    </body>
</html>

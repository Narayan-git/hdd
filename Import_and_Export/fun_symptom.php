<?php
	
	include 'dbcon.php';
	 global $conn ;
     if(isset($_POST["Import"])){
        
        $filename=$_FILES["file"]["tmp_name"];    
         if($_FILES["file"]["size"] > 0)
         {
            $file = fopen($filename, "r");
			
              while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
               {
                 $sql = "INSERT into symptom (symptom_name) 
                       values ('".$getData[0]."')";
                       $result = mysqli_query($conn, $sql);
            if(!isset($result))
            {
              echo "<script type=\"text/javascript\">
                  alert(\"Invalid File:Please Upload CSV File.\");
                  window.location = \"excel.php\"
                  </script>";    
            }
            else {
                echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"excel.php\"
              </script>";
            }
               }
          
               fclose($file);  
         }
      }   
	      function get_all_records(){
          global $conn ;
        $Sql = "SELECT * FROM symptom";
        $result = mysqli_query($conn, $Sql);  
        if (mysqli_num_rows($result) > 0) {
         echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
                 <thead><tr><th>Symptom ID</th>
                              <th>Symptom Name</th>
                            </tr></thead><tbody>";
         while($row = mysqli_fetch_assoc($result)) {
             echo "<tr><td>" . $row['s_id']."</td>
                       <td>" . $row['symptom_name']."</td></tr>";        
         }
        
         echo "</tbody></table></div>";
         
    } else {
         echo "No Records Found..";
    }
    }
	     if(isset($_POST["Export"])){
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=data.csv');  
          $output = fopen("php://output", "w");  
		 
          fputcsv($output, array('symptom_id', 'symptom_name'));
          $query = "SELECT * from symptom ORDER BY s_id DESC";  
          $result = mysqli_query($conn, $query);  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }  
     ?>
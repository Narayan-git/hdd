<?php
    $server = 'localhost';
    $user ='root';
    $password = '';
    $database = 'HDD';
    $conn =new  mysqli($server, $user, $password, $database);
    if($conn->connect_error){
        die('Connection Failed');
    }
    else{
       // echo'Data base Connected';
    }
    
?>
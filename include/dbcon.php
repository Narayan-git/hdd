<?php
    $server = 'localhost';
    $user ='root';
    $password = '';
    $database = 'HDD';
    $connn =new  mysqli($server, $user, $password, $database);
    if($connn->connect_error){
        die('Connection Failed');
    }
    else{
       // echo'Data base Connected';
    }
    
?>
<?php
    session_start();
    $host = 'localhost';
    $user = 'root';
    $password='';

    $db='crudapp';

    $con=mysqli_connect($host,$user,$password,$db);
    
?>
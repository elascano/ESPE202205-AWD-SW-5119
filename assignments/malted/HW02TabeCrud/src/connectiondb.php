<?php
function connect(){
    $host="localhost";
    $user="root";
    $pass="";

    $bd="db-crudhw02";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}
?>
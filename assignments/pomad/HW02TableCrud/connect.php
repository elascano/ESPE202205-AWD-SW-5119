<?php
$dbuser = 'root';
$dbpassword = '';
$dbtable = 'crud_table';

$dbConnection = new mysqli('localhost', $dbuser, $dbpassword, $dbtable);

if(!$dbConnection){
    die(mysqli_error($con));
}

?>
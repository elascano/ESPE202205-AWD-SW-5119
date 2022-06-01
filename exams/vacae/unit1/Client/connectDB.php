<?php 
require 'vendor/autoload.php';
$connection = new MongoDB\Client;
$mongo = new MongoDB\Client('mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/?retryWrites=true&w=majority');
$db = $mongo->AWD5119;//database
$students = $db->Students;//collection
?>
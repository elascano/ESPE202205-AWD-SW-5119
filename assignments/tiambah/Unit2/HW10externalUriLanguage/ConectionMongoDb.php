<?php 
require 'vendor/autoload.php';
$connection = new MongoDB\Client;
$mongo = new MongoDB\Client('mongodb+srv://AndresValarezo:1234@cluster0.yxwn5.mongodb.net/?retryWrites=true&w=majority');
$db = $mongo->studentsdb;
$students = $db->students;
?>
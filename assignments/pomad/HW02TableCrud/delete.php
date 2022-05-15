<?php
    include 'connect.php';
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];

        $queryDelete = "delete from  `anime_information` where id=$id";
        $queryResult =  mysqli_query($dbConnection, $queryDelete);
        if($queryResult){
            header('location:display.php');
        }else{
            die(mysqli_error($dbConnection));
        }
    }
?>
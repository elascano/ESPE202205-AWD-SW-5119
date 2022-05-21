<?php
    include("connectiondb.php");
    $con=connect();

    $name=$_POST['name'];
    $type=$_POST['type'];
    $participants=$_POST['participants'];
    $duration=$_POST['duration'];
    $star_age=$_POST['star_age'];


    $sql="INSERT INTO sports VALUES('$name','$type','$participants','$duration','$star_age')";
    $query= mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
        
    }else {
    }
?>
<?php
    include("connectiondb.php");
    $con=connect();

    $name=$_POST['name'];
    $type=$_POST['type'];
    $participants=$_POST['participants'];
    $duration=$_POST['duration'];
    $star_age=$_POST['star_age'];
   
    $sql="UPDATE sports SET  type='$type',participants='$participants',duration='$duration',star_age='$star_age' WHERE name='$name'";
    $query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>
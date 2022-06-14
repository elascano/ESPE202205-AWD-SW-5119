<?php
    include("connectiondb.php");
    $con=connect();

    $name=$_GET['name'];

    $sql="DELETE FROM sports  WHERE name='$name'";
    $query=mysqli_query($con,$sql);

        if($query){
            Header("Location: index.php");
        }
?>

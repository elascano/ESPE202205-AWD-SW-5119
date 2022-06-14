<?php

include("conexion.php");
$con=conectar();

$bedroom=$_POST['Bedrooms'];
$bathroom=$_POST['Bathrooms'];
$area=$_POST['Area'];
$addres=$_POST['Addres'];

$sql="UPDATE home SET  Bedrooms='$dedroom',Bathrooms='$bathroom',Areas\='$area', Addres='$addres'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: alumno.php");
    }
?>
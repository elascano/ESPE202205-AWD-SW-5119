<?php
include("conexion.php");
$con=conectar();

$bedroom=$_POST['Bedrooms'];
$bathroom=$_POST['Bathrooms'];
$area=$_POST['Area'];
$addres=$_POST['Addres'];


$sql="INSERT INTO alumno VALUES('$bedroom','$bathroom','$area','$addres')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: Casa.php");
    
}else {
}
?>
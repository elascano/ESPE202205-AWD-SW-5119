<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>add</title>
</head>

<body>
	<?php
	$brand = $_GET['brand'];
	$model = $_GET['model'];
	$category = $_GET['category'];
	$gender = $_GET['gender'];
	$size = $_GET['size'];
	$price = $_GET['price'];
	session_start();
   
  // Obtengo los datos cargados en el formulario de login.
   
  // Datos para conectar a la base de datos.
  $nombreServidor = "localhost";
  $nombreUsuario = "admin";
  $passwordBaseDeDatos = "admin";
  $nombreBaseDeDatos = "shoesdb";
  
  // Crear conexión con la base de datos.
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
   
  // Validar la conexión de base de datos.
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
	$query = "INSERT INTO shoes(shoes_brand, shoes_model, shoes_category, shoes_gender, shoes_size, shoes_price) VALUES ('$brand','$model','$category','$gender','$size','$price')";
  $resultado = mysqli_query($conn,$query);
	
	if($resultado)
{
	echo "<script>alert('Zapatos Registrado');</script>";
}
else 
{
	echo "<script>alert('Zapatos no Registrado');</script>";
}
	?>
</body>
</html>
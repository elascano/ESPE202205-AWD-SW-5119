<!doctype html>
<html>
<head>
<meta charset="utf-8">
	
<title>Documento sin título</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	
	<link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<?php
	 session_start();
$codigo=$_GET['id'];
$materia = $_GET['materia'];		
$nombreServidor = "localhost";
  $nombreUsuario = "admin";
  $passwordBaseDeDatos = "admin";
  $nombreBaseDeDatos = "sistemaescolar";
  
  // Crear conexión con la base de datos.
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
   
  // Validar la conexión de base de datos.
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
 
   // Consulta a la base de datos.
  $query = "UPDATE registrom SET reg_codigoprof =0 where reg_codigomat='$materia' and reg_codigoprof ='$codigo'";
  $result = mysqli_query($conn,$query);
?>

<h1><div align="center">Registro Actualizado</div></h1>
<div align="center"><a href="horarios.php">Volver</a></div>
</body>
</html>
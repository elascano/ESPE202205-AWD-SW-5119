<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<?php
  
	$nivel = $_POST['nivel'];
    $paralelo = $_POST['paralelo'];
	session_start();
   
  // Obtengo los datos cargados en el formulario de login.
   
  // Datos para conectar a la base de datos.
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
  $queryhorario = mysqli_query($conn,"SELECT * FROM horarios WHERE hor_nivel = '$nivel' and hor_paralelo = '$paralelo'");
  $nr 		= mysqli_num_rows($queryhorario);  
      
  if (($nr == 0))
      { 
        $query = "INSERT INTO horarios(hor_nivel,hor_paralelo) VALUES ('$nivel','$paralelo')";
        $resultado = mysqli_query($conn,$query);
	
        if($resultado)
        {
            echo "<script> alert('Horario Creado Correctamente.');window.location= 'horarios.php' </script>";
        }
        else 
        {
            echo "<script> alert('Horario no ha sido creado Correctamente.');window.location= 'horarios.php' </script>";
        }
      }
  else
      {
      
      echo "<script> alert('Horario para el curso ya Existe.');window.location= 'horarios.php' </script>";
      }
  
  
	?>
  
</body>
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<?php
  
	$hor_codigo = $_POST['codigohor'];
  $materia = $_POST['materia'];
  $hora =$_POST['hora'];
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
  $contadorHoras=0;
  $consultahoras=mysqli_query($conn,"SELECT mat_horas from materias where mat_codigo ='$materia'");
  $h=mysqli_fetch_assoc($consultahoras);
  $horasmateria = $h["mat_horas"];


  $consultaregistros=mysqli_query($conn,"SELECT * FROM registrom where reg_codigomat='$materia' and reg_codigohor='$hor_codigo'");
    if (!empty($consultaregistros)) {
      while ($row=mysqli_fetch_array($consultaregistros)){
        $contadorHoras++;
      }
    }

  $restantes = $horasmateria-$contadorHoras;
  $cont=0;
  if($_POST['checkbox'] != ""){
    $dias = $_POST['checkbox'];
    $num = count($dias);
    if($num <= $restantes){
      for($n=0;$n<$num;$n++){
        $querydias = mysqli_query($conn,"SELECT * FROM registrom WHERE reg_hora = '$hora' and reg_dia = '$dias[$n]' and reg_codigohor='$hor_codigo'");
        $nr 		= mysqli_num_rows($querydias); 
        if($nr!=0){
          $cont++;
        }
    }
    
      if($cont==0){
        for($n=0;$n<$num;$n++){
          $query = mysqli_query($conn,"INSERT INTO registrom(reg_codigomat,reg_codigohor,reg_hora,reg_dia) VALUES ('$materia','$hor_codigo','$hora','$dias[$n]')");
      }
    }
  
    if($query)
    {
      $faltan = $restantes-$num;
        echo "<script> alert('Materia Registrada Correctamente, Quedan ".$faltan." horas de la materia por registrar.');window.location= 'horarios.php' </script>";
    }
    else 
    {
        echo "<script> alert('Interferencia en el Horario.');window.location= 'horarios.php' </script>";
    }
    }else{
      echo "<script> alert('Exceso de horas, solo faltan ".$restantes." horas.');window.location= 'horarios.php' </script>";
    }
    
  
  }else{
    echo "<script> alert('Seleccione Dias.');window.location= 'horarios.php' </script>";
  }
  
        
	
        
      
  
  
	?>
  
</body>
</html>
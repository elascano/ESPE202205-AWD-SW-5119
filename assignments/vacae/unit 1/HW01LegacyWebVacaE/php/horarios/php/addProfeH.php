<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<?php
  
  $hor_codigo = $_POST['codigohor'];
  $materia = $_POST['codigomat'];
  $profe =$_POST['profe'];
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
  $cont=0;
  

    
        $querymateria = mysqli_query($conn,"SELECT reg_dia,reg_hora from registrom where reg_codigomat = '$materia' and reg_codigohor='$hor_codigo' and reg_codigoprof=0");
         
        
              if (!empty($querymateria)) {
                while ($row=mysqli_fetch_array($querymateria)){
                    $dia = $row["reg_dia"];
                    $hora= $row["reg_hora"];
                    $queryprofe = mysqli_query($conn,"SELECT reg_codigo from registrom where reg_codigoprof='$profe' and reg_dia = '$dia' and reg_hora = '$hora'");
                    $nr 		= mysqli_num_rows($queryprofe);
                    if($nr !=0){ 
                        $cont++;
                    }
                }
            }
    
    
    if($cont==0){
          $query = mysqli_query($conn,"UPDATE registrom SET reg_codigoprof ='$profe' where reg_codigomat='$materia' and reg_codigohor ='$hor_codigo'");
    }
  
    if($query)
    {
        echo "<script> alert('Profesor asignado correctamente.');window.location= 'horarios.php' </script>";
    }
    else 
    {
        echo "<script> alert('Interferencia en el Horario del Docente.');window.location= 'horarios.php' </script>";
    }
  
  
  
        
	
        
      
  
  
	?>
  
</body>
</html>
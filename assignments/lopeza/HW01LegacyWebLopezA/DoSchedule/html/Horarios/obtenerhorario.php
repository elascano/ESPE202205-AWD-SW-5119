<?php
// Datos para conectar a la base de datos.
  $nombreServidor = "localhost";
  $nombreUsuario = "admin";
  $passwordBaseDeDatos = "admin";
  $nombreBaseDeDatos = "horarios";

  
  
  // Crear conexión con la base de datos.
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
   
  // Validar la conexión de base de datos.
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
 
   // Consulta a la base de datos.
  $query = "SELECT * FROM horarios";
  $resultado = mysqli_query($conn,$query);
  if ($resultado) {
      // Verificando si el usuario existe en la base de datos, cuenta los registros que cumplen con las condiciones (usuario y password).
      $row = mysqli_fetch_all($resultado);
      
      if ($row>0) {
          $output = array();
            foreach ($row as $item) {
                $horario = new stdClass;
                $horario->id = $item[0];
                $horario->cursoId= $item[1];
                $horario->cursoNombre= $item[2];
                $horario->paraleloId= $item[3];
                $horario->paraleloNombre= $item[4];
                $horario->materiaId= $item[5];
                $horario->materiaNombre= $item[6];
                $horario->profesorId= $item[7];
                $horario->profesorNombre= $item[8];
                $horario->colorId= $item[9];
                $horario->colorNombre= $item[10];
                $horario->celdaId= $item[11];
                array_push($output, $horario);
            }
            echo json_encode($output);
      } else {
        $output = array();
        echo json_encode($output);
    }
}else{
          $output = array();
        echo json_encode($output);
      }

?>
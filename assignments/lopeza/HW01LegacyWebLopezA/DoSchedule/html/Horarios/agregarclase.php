<?php
$cursoId = $_POST['cursoId'];
$cursoNombre = $_POST['cursoNombre'];
$paraleloId = $_POST['paraleloId'];
$paraleloNombre = $_POST['paraleloNombre'];
$materiaId = $_POST['materiaId'];
$materiaNombre = $_POST['materiaNombre'];
$profesorId = $_POST['profesorId'];
$profesorNombre = $_POST['profesorNombre'];
$colorId = $_POST['colorId'];
$colorNombre = $_POST['colorNombre'];
$celdaId = $_POST['celdaId'];
try {
            $teacherSchedule = validateTeacherSchedule($profesorId, $celdaId);
            if($teacherSchedule==false){
                die('Error: El profesor seleccionado ya tiene una clase en el horario seleccionado.');
                return json_encode("Error: El profesor seleccionado ya tiene una clase en el horario seleccionado.");
            }
            $subjectHours = validateSubjectHours($materiaId, $cursoId, $paraleloId);
            if($subjectHours==false){
                die('Error: La materia ya tiene llena toda la carga horaria para el curso y paralelo seleccionados.');
                return json_encode("Error: La materia ya tiene llena toda la carga horaria para el curso y paralelo seleccionados.");
            }
            $connect = new PDO('mysql:host=localhost;dbname=horarios;charset=utf8;','admin','admin');
			$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$SQL = "INSERT INTO horarios (cursoId, cursoNombre, paraleloId, paraleloNombre, materiaId, materiaNombre, profesorId, profesorNombre, colorId, colorNombre, celdaId) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
			$result = $connect->prepare($SQL);
			$result->execute(array(
									$cursoId,
                                    $cursoNombre,
                                    $paraleloId,
                                    $paraleloNombre,
                                    $materiaId,
                                    $materiaNombre,
                                    $profesorId,
                                    $profesorNombre,
                                    $colorId,
                                    $colorNombre,
                                    $celdaId
									)
							);			
		} catch (Exception $e) {
			die('Error Register Horario '.$e->getMessage());
		} finally{
			$result = null;
		}

        function validateTeacherSchedule($profesorId, $celdaId){
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
            $query = "SELECT * FROM horarios WHERE profesorId=$profesorId AND celdaId='$celdaId'";
            $resultado = mysqli_query($conn,$query);
            if ($resultado) {
                // Verificando si el usuario existe en la base de datos, cuenta los registros que cumplen con las condiciones (usuario y password).
                $row = mysqli_fetch_all($resultado);
                if ($row>0 && count($row)>0) {
                    return false;
                }
            }
            return true;
        }

        function validateSubjectHours($materiaId, $cursoId, $paraleloId){
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
            $query = "SELECT * FROM horarios WHERE materiaId=$materiaId AND cursoId=$cursoId AND paraleloId=$paraleloId";
            $resultado = mysqli_query($conn,$query);
            if ($resultado) {
                // Verificando si el usuario existe en la base de datos, cuenta los registros que cumplen con las condiciones (usuario y password).
                $row = mysqli_fetch_all($resultado);
                if ($row>0 && count($row)>0) {
                    $hours = 0;
                    foreach ($row as $item) {
                        $hours = $hours+1;
                    }
                    $query = "SELECT * FROM pr_materias WHERE mat_codigo=$materiaId";
                    $resultado1 = mysqli_query($conn,$query);
                    if ($resultado) {
                        // Verificando si el usuario existe en la base de datos, cuenta los registros que cumplen con las condiciones (usuario y password).
                        $row1 = mysqli_fetch_all($resultado1);
                        if ($row1>0) {
                            if($hours>$row1[0][4]-1){
                                            return false;
                                        }
                                    
                            }
                        }
                }
            }
            return true;
        }

?>
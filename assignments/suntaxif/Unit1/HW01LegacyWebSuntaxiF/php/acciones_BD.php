<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../css/estilo.css" rel="stylesheet" type="text/css">

<?php
require_once "aud.php";
require_once ("DB.php");
require_once("Docente.php");
require_once("Materia.php");
require_once("horario.php");
require_once("Curso.php");

$db_handle = new DB();

session_start();

	$usuarioIp=$_SESSION['usuario'][1];
	$macAddress=$_SESSION['usuario'][2];
	$fechaIngreso = $_SESSION['usuario'][3];
	$horaIngreso = date('H:i:s');
	$cedula=$_SESSION['usuario'][6];

$egbElemental = array("Lenguaje" => 10, "Matematica" => 8, "Estudios sociales" => 2, "Ciencias naturales" => 3, "Educacion artistica" => 2, "Educacion fisica" => 5, "Ingles" => 3, "Proyectos" => 2);
$egbElemental_aux = array("Lenguaje" => 10, "Matematica" => 8, "Estudios sociales" => 2, "Ciencias naturales" => 3, "Educacion artistica" => 2, "Educacion fisica" => 5, "Ingles" => 3, "Proyectos" => 2);

$egbMedia = array("Lenguaje" => 8, "Matematica" => 7, "Estudios sociales" => 3, "Ciencias naturales" => 5, "Educacion artistica" => 2, "Educacion fisica" => 5, "Ingles" => 3, "Proyectos" => 2);
$egbMedia_aux = array("Lenguaje" => 8, "Matematica" => 7, "Estudios sociales" => 3, "Ciencias naturales" => 5, "Educacion artistica" => 2, "Educacion fisica" => 5, "Ingles" => 3, "Proyectos" => 2);

$egbSuperior = array("Lenguaje" => 6, "Matematica" => 6, "Estudios sociales" => 4, "Ciencias naturales" => 4, "Educacion artistica" => 2, "Educacion fisica" => 5, "Ingles" => 5, "Proyectos" => 3);
$egbSuperior_aux = array("Lenguaje" => 6, "Matematica" => 6, "Estudios sociales" => 4, "Ciencias naturales" => 4, "Educacion artistica" => 2, "Educacion fisica" => 5, "Ingles" => 5, "Proyectos" => 3);

$bachillerato = array("Matematica" => 5, "Fisica" => 4, "Quimica" => 4, "Biologia" => 2, "Historia" => 3, "Ciudadania" => 2, "Filosofia" => 2, "Lengua y literatura" => 5, "Ingles" => 5, "Educacion artistica" => 2, "Educacion fisica" => 2, "Emprendimiento" => 2, "Informatica" => 2);
$bachillerato_aux = array("Matematica" => 5, "Fisica" => 4, "Quimica" => 4, "Biologia" => 2, "Historia" => 3, "Ciudadania" => 2, "Filosofia" => 2, "Lengua y literatura" => 5, "Ingles" => 5, "Educacion artistica" => 2, "Educacion fisica" => 2, "Emprendimiento" => 2, "Informatica" => 2);

$diasSemana = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes");
$horasBGU = array("07:15", "08:00", "08:45", "09:30", "10:45", "11:30", "12:15", "13:00");
$horasEGB = array("07:15", "08:00", "08:45", "09:30", "10:45", "11:30", "12:15");

$errores = array();

$vectorhorarios = array();
$vectorDocentes = array();
$vectorValidacionDocentes = array();

// $action = "";
if (!empty($_GET["action"])) {
    $action = $_GET["action"];
}else{
	$action = "ecuador";
}

switch ($action) {
		
	case "crear-horario":
		
		$codigo_curso = $_POST['curso'];
		$matrizMaterias;
		$aparecerHorarioAceptar = true;
		
		$curso1 = new Curso();
		$nombreCurso = $curso1->getCursoPorCodigo($codigo_curso);
		
		//Si el curso seleccionado es de bachillerato
		if(strpos($nombreCurso[0]["CUR_CURSO"],'BGU') != false){
			$aux = 1;

		//Si es de educacion general basica
		}else{
			
			//Si el curso seleccionado es de educacion general basica superior
			if($nombreCurso[0]["CUR_CURSO"] == "10" || $nombreCurso[0]["CUR_CURSO"] == "9" || $nombreCurso[0]["CUR_CURSO"] == "8"){
				$aux = 2;
			
			//Si el curso seleccionado es de educacion general basica media
			}else if($nombreCurso[0]["CUR_CURSO"] == "7" || $nombreCurso[0]["CUR_CURSO"] == "6" || $nombreCurso[0]["CUR_CURSO"] == "5"){
				$aux = 3;
			
			//Si el curso seleccionado es de educacion general basica elemental
			}else if($nombreCurso[0]["CUR_CURSO"] == "4" || $nombreCurso[0]["CUR_CURSO"] == "3" || $nombreCurso[0]["CUR_CURSO"] == "2"){
				$aux = 4;
				
			}

		}
		
		$auxBool = false;

		/****************************************************Creacion de horario para BGU****************************************************/
		if(isset($_POST['add']) && $aux == 1){
			//Auditoriaa
			$registroA = "Agregó Horario BGU";
			$auditoria = new Auditoria();
			$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
			
			$docente = new Docente();
			$curso2 = new Curso();
			$horario = new Horario();
			$materia = new Materia();

			for($i=0; $i<8; $i++){
				
				for($j=0; $j<5; $j++){
					
					$matrizMaterias[$i][$j] = $_POST[$i.$j];
				}
			}
			
			//validacion numero de horas
			for($i=0; $i<8; $i++){
				
				for($j=0; $j<5; $j++){
					
					$nombreMaterias = $materia->getMateriaPorCodigo($matrizMaterias[$i][$j]);
					$codigoDocente = $docente->getDocentePorCodigoMateria($matrizMaterias[$i][$j]); 
					
					for($k=0; $k<count($codigoDocente); $k++){
						
						$horasDocente = $docente->horasDisponibles($codigoDocente[$k]["DOC_CODIGO"]);
						$docenteDisponible = $docente->verificarHoraDocente($codigoDocente[$k]["DOC_CODIGO"], $diasSemana[$j], $horasBGU[$i]);

						foreach($vectorDocentes as $item => $value){
							
							if($matrizMaterias[$i][$j] == $item){
								$existenciaMateria = true;
								break;
								
							}else{
								$existenciaMateria = false;
								
							}
						}
						
						//Si la materia no existe en el horario, y el docente esta disponible, tanto en horario, como en numero de horas por docente
						if($existenciaMateria == false && $docenteDisponible[0]["COUNT(*)"] == 0 && $horasDocente[0]["DOC_NUMERO_HORAS"] >= $bachillerato[$nombreMaterias[0]["MAT_NOMBRE"]]){
							$vectorDocentes[$matrizMaterias[$i][$j]] = $codigoDocente[$k]["DOC_CODIGO"];
							
							$elementoHorario = new Horario();
							
							$elementoHorario->codigoDocente = $codigoDocente[$k]["DOC_CODIGO"];
							$elementoHorario->codigoCurso = $codigo_curso;
							$elementoHorario->hora = $horasBGU[$i];
							$elementoHorario->dia = $diasSemana[$j];
							
							array_push($vectorhorarios, $elementoHorario);
							break;
						
						//Si la materia ya existe en el horario, y el docente esta disponible, tanto en horario, como en numero de horas por docente
						}else if($existenciaMateria == true && $docenteDisponible[0]["COUNT(*)"] == 0 && $horasDocente[0]["DOC_NUMERO_HORAS"] >= $bachillerato[$nombreMaterias[0]["MAT_NOMBRE"]]){
							
							$elementoHorario = new Horario();
							
							$disponibilidad = $docente->verificarHoraDocente($vectorDocentes[$matrizMaterias[$i][$j]], $diasSemana[$j], $horasBGU[$i]);
							$disponibilidadHoras = $docente->horasDisponibles($vectorDocentes[$matrizMaterias[$i][$j]]);
							
							if($disponibilidad[0]["COUNT(*)"] == 0 && $disponibilidadHoras >= $bachillerato[$nombreMaterias[0]["MAT_NOMBRE"]]){
								
								$elementoHorario->codigoDocente = $vectorDocentes[$matrizMaterias[$i][$j]];
								$elementoHorario->codigoCurso = $codigo_curso;
								$elementoHorario->hora = $horasBGU[$i];
								$elementoHorario->dia = $diasSemana[$j];

								array_push($vectorhorarios, $elementoHorario);
								break;
								
							}else{
									
								if($codigoDocente[$k]["DOC_CODIGO"] != $vectorDocentes[$matrizMaterias[$i][$j]]){
									$validez = cambiarProfesorArreglo($codigoDocente[$k]["DOC_CODIGO"], $matrizMaterias[$i][$j], $aux);

									if($validez){
										$elementoHorario = new Horario();

										$elementoHorario->codigoDocente = $codigoDocente[$k]["DOC_CODIGO"];
										$elementoHorario->codigoCurso = $codigo_curso;
										$elementoHorario->hora = $horasBGU[$i];
										$elementoHorario->dia = $diasSemana[$j];

										array_push($vectorhorarios, $elementoHorario);

										break;

									}
								}
								
							}
						
						//Si el docente no esta disponible y ya no hay mas docentes que impartan la misma materia
						}else if($docenteDisponible[0]["COUNT(*)"] == 1 && $k == count($codigoDocente) - 1){
							array_push($errores, "No hay profesores para la materia ".$nombreMaterias[0]["MAT_NOMBRE"]." durante el: ".$diasSemana[$j]." a la hora: ".$horasBGU[$i].".");
							$auxBool = true;
						}
						
					}
					$bachillerato_aux[$nombreMaterias[0]["MAT_NOMBRE"]]--;
				}
			}

			foreach($bachillerato_aux as $item => $valor){
				
				if($valor < 0 || $valor > 0){
					$auxBool = true;
				}
			}
			
			if($auxBool == true){
				
				echo "<div class='alert alert-primary' role='alert'>";
				foreach($bachillerato_aux as $item => $valor){

					if($valor < 0){
						echo "La materia de ".$item." no puede superar las ".$bachillerato[$item]." horas por semana.<br>";

					}else if($valor > 0){
						echo "La cantidad de horas de la materia de ".$item." no puede ser menor que ".$bachillerato[$item]." horas por semana.<br>";

					}
				}
				echo "</div>";
				
				echo "<div class='alert alert-primary' role='alert'>";
				for($i=0; $i<count($errores); $i++){
					echo $errores[$i]."<br>";
				}
				echo "</div>";
				
			}else{
				//insercion horarios a la base de datos
				for($i=0; $i<count($vectorhorarios); $i++){
					$horario->addHorario($vectorhorarios[$i]->codigoDocente, $vectorhorarios[$i]->codigoCurso, $vectorhorarios[$i]->hora, $vectorhorarios[$i]->dia);
					
				}
				echo "hola";
				$curso2->cambiarDisponibilidad($codigo_curso);
				reducirHorasDocente($aux);
				
				$aparecerHorarioAceptar = false;
				
				/*for($i=0; $i<count($vectorhorarios); $i++){
					echo "CURSO: ".$vectorhorarios[$i]->codigoCurso." DOCENTE: ".$vectorhorarios[$i]->codigoDocente." HORA: ".$vectorhorarios[$i]->hora." DIA: ".$vectorhorarios[$i]->dia.".<br>";
					
				}*/
				
			}
			
		/****************************************************Creacion de horario para EGB****************************************************/
		}else if(isset($_POST['add']) && ($aux == 2 || $aux == 3 || $aux == 4)){
			//Auditoriaa
			$registroA = "Agregó Horario EGB";
			$auditoria = new Auditoria();
			$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
			
			$docente = new Docente();
			$curso2 = new Curso();
			$horario = new Horario();
			$materia = new Materia();
			
			for($i=0; $i<7; $i++){
				
				for($j=0; $j<5; $j++){
					
					$matrizMaterias[$i][$j] = $_POST[$i.$j];
				
				}
			}
			
			//validacion numero de horas
			for($i=0; $i<7; $i++){
				
				for($j=0; $j<5; $j++){
					
					$nombreMaterias = $materia->getMateriaPorCodigo($matrizMaterias[$i][$j]);
					$codigoDocente = $docente->getDocentePorCodigoMateria($matrizMaterias[$i][$j]); 
					
					if($aux == 2){
						$numHoras = $egbSuperior[$nombreMaterias[0]["MAT_NOMBRE"]];
						
					}else if($aux == 3){
						$numHoras = $egbMedia[$nombreMaterias[0]["MAT_NOMBRE"]];
						
						
					}else{
						$numHoras = $egbElemental[$nombreMaterias[0]["MAT_NOMBRE"]];
						
					}
					
					for($k=0; $k<count($codigoDocente); $k++){

						$docenteDisponible = $docente->verificarHoraDocente($codigoDocente[$k]["DOC_CODIGO"], $diasSemana[$j], $horasEGB[$i]);
						$horasDocente = $docente->horasDisponibles($codigoDocente[$k]["DOC_CODIGO"]);
						
						foreach($vectorDocentes as $item => $value){
							
							if($matrizMaterias[$i][$j] == $item){
								$existenciaMateria = true;
								break;
								
							}else{
								$existenciaMateria = false;
								
							}
						}
						
						//Si la materia no existe en el horario, y el docente esta disponible, tanto en horario, como en numero de horas por docente
						if($existenciaMateria == false && $docenteDisponible[0]["COUNT(*)"] == 0 && $horasDocente[0]["DOC_NUMERO_HORAS"] >= $numHoras){
							$vectorDocentes[$matrizMaterias[$i][$j]] = $codigoDocente[$k]["DOC_CODIGO"];
							
							$elementoHorario = new Horario();
							
							$elementoHorario->codigoDocente = $codigoDocente[$k]["DOC_CODIGO"];
							$elementoHorario->codigoCurso = $codigo_curso;
							$elementoHorario->hora = $horasEGB[$i];
							$elementoHorario->dia = $diasSemana[$j];
							
							array_push($vectorhorarios, $elementoHorario);
							break;
						
						//Si la materia ya existe en el horario, y el docente esta disponible, tanto en horario, como en numero de horas por docente
						}else if($existenciaMateria == true && $docenteDisponible[0]["COUNT(*)"] == 0 && $horasDocente[0]["DOC_NUMERO_HORAS"] >= $numHoras){
							
							$elementoHorario = new Horario();
							
							$disponibilidad = $docente->verificarHoraDocente($vectorDocentes[$matrizMaterias[$i][$j]], $diasSemana[$j], $horasEGB[$i]);
							$disponibilidadHoras = $docente->horasDisponibles($vectorDocentes[$matrizMaterias[$i][$j]]);
							
							if($disponibilidad[0]["COUNT(*)"] == 0 && $disponibilidadHoras >= $numHoras){
								
								$elementoHorario->codigoDocente = $vectorDocentes[$matrizMaterias[$i][$j]];
								$elementoHorario->codigoCurso = $codigo_curso;
								$elementoHorario->hora = $horasEGB[$i];
								$elementoHorario->dia = $diasSemana[$j];

								array_push($vectorhorarios, $elementoHorario);
								break;
								
							}else{
									
								if($codigoDocente[$k]["DOC_CODIGO"] != $vectorDocentes[$matrizMaterias[$i][$j]]){
									$validez = cambiarProfesorArreglo($codigoDocente[$k]["DOC_CODIGO"], $matrizMaterias[$i][$j], $aux);

									if($validez){
										$elementoHorario = new Horario();

										$elementoHorario->codigoDocente = $codigoDocente[$k]["DOC_CODIGO"];
										$elementoHorario->codigoCurso = $codigo_curso;
										$elementoHorario->hora = $horasEGB[$i];
										$elementoHorario->dia = $diasSemana[$j];

										array_push($vectorhorarios, $elementoHorario);

										break;

									}
								}
								
							}
						
						//Si el docente no esta disponible y ya no hay mas docentes que impartan la misma materia
						}else if($docenteDisponible[0]["COUNT(*)"] == 1 && $k == count($codigoDocente) - 1){
							array_push($errores, "No hay profesores para la materia ".$nombreMaterias[0]["MAT_NOMBRE"]." durante el: ".$diasSemana[$j]." a la hora: ".$horasEGB[$i].".");
							$auxBool = true;
						}
						
					}
					
					if($aux == 2){
						$egbSuperior_aux[$nombreMaterias[0]["MAT_NOMBRE"]]--;
						
					}else if($aux == 3){
						$egbMedia_aux[$nombreMaterias[0]["MAT_NOMBRE"]]--;
						
					}else{
						$egbElemental_aux[$nombreMaterias[0]["MAT_NOMBRE"]]--;
						
					}
					
				}
			}

			if($aux == 2){
				
				foreach($egbSuperior_aux as $item => $valor){
				
					if($valor < 0 || $valor > 0){
						$auxBool = true;
					}
				}

			}else if($aux == 3){
				
				foreach($egbMedia_aux as $item => $valor){
				
					if($valor < 0 || $valor > 0){
						$auxBool = true;
					}
				}

			}else{
				
				foreach($egbElemental_aux as $item => $valor){
				
					if($valor < 0 || $valor > 0){
						$auxBool = true;
					}
				}

			}
			
			
			if($auxBool == true){
				
				echo "<div class='alert alert-primary' role='alert'>";
				
				
				if($aux == 2){
				
					foreach($egbSuperior_aux as $item => $valor){

						if($valor < 0){
							echo "La materia de ".$item." no puede superar las ".$egbSuperior[$item]." horas por semana.<br>";

						}else if($valor > 0){
							echo "La cantidad de horas de la materia de ".$item." no puede ser menor que ".$egbSuperior[$item]." horas por semana.<br>";

						}
					}

				}else if($aux == 3){

					foreach($egbMedia_aux as $item => $valor){

						if($valor < 0){
							echo "La materia de ".$item." no puede superar las ".$egbMedia[$item]." horas por semana.<br>";

						}else if($valor > 0){
							echo "La cantidad de horas de la materia de ".$item." no puede ser menor que ".$egbMedia[$item]." horas por semana.<br>";

						}
					}

				}else{

					foreach($egbElemental_aux as $item => $valor){

						if($valor < 0){
							echo "La materia de ".$item." no puede superar las ".$egbElemental[$item]." horas por semana.<br>";

						}else if($valor > 0){
							echo "La cantidad de horas de la materia de ".$item." no puede ser menor que ".$egbElemental[$item]." horas por semana.<br>";

						}
					}

				}
				
				echo "</div>";
				
				echo "<div class='alert alert-primary' role='alert'>";
				for($i=0; $i<count($errores); $i++){
					echo $errores[$i]."<br>";
				}
				echo "</div>";
				
			}else{
				//insercion horarios a la base de datos
				for($i=0; $i<count($vectorhorarios); $i++){
					$horario->addHorario($vectorhorarios[$i]->codigoDocente, $vectorhorarios[$i]->codigoCurso, $vectorhorarios[$i]->hora, $vectorhorarios[$i]->dia);
					
				}

				$curso2->cambiarDisponibilidad($codigo_curso);
				reducirHorasDocente($aux);
				$aparecerHorarioAceptar = false;
				
				/*for($i=0; $i<count($vectorhorarios); $i++){
					echo "CURSO: ".$vectorhorarios[$i]->codigoCurso." DOCENTE: ".$vectorhorarios[$i]->codigoDocente." HORA: ".$vectorhorarios[$i]->hora." DIA: ".$vectorhorarios[$i]->dia.".<br>";
					
				}*/
				
			}
			
		}
		
		$curso = new Curso();
		$result = $curso->getCursosSinHorario();

		require_once("crear_horario.php");
		
		break;
		
	
	case "ver-horario":
		
		//Auditoriaa
		$registroA = "Observó Horario";
		$auditoria = new Auditoria();
		$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
		
		$codigo_curso = $_POST['curso'];
		
		$curso1 = new Curso();
		$nombreCurso = $curso1->getCursoPorCodigo($codigo_curso);
		
		//Si el curso seleccionado es de bachillerato
		if(strpos($nombreCurso[0]["CUR_CURSO"],'BGU') != false){
			$aux = 1;

		//Si es de educacion general basica
		}else{
			
			//Si el curso seleccionado es de educacion general basica superior
			if($nombreCurso[0]["CUR_CURSO"] == "10" || $nombreCurso[0]["CUR_CURSO"] == "9" || $nombreCurso[0]["CUR_CURSO"] == "8"){
				$aux = 2;
			
			//Si el curso seleccionado es de educacion general basica media
			}else if($nombreCurso[0]["CUR_CURSO"] == "7" || $nombreCurso[0]["CUR_CURSO"] == "6" || $nombreCurso[0]["CUR_CURSO"] == "5"){
				$aux = 3;
			
			//Si el curso seleccionado es de educacion general basica elemental
			}else if($nombreCurso[0]["CUR_CURSO"] == "4" || $nombreCurso[0]["CUR_CURSO"] == "3" || $nombreCurso[0]["CUR_CURSO"] == "2"){
				$aux = 4;
				
			}

		}
		
		$curso = new Curso();
		$result = $curso->getCursosConHorario();
		
		require_once("ver_horario.php");
		
		break;
		
	case "ver-horario-docente":
		//Auditoriaa
			$registroA = "Observó Horario";
			$auditoria = new Auditoria();
			$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
		
		$codigo_curso = $_POST['curso'];
		
		$curso1 = new Curso();
		$nombreCurso = $curso1->getCursoPorCodigo($codigo_curso);
		
		//Si el curso seleccionado es de bachillerato
		if(strpos($nombreCurso[0]["CUR_CURSO"],'BGU') != false){
			$aux = 1;

		//Si es de educacion general basica
		}else{
			
			//Si el curso seleccionado es de educacion general basica superior
			if($nombreCurso[0]["CUR_CURSO"] == "10" || $nombreCurso[0]["CUR_CURSO"] == "9" || $nombreCurso[0]["CUR_CURSO"] == "8"){
				$aux = 2;
			
			//Si el curso seleccionado es de educacion general basica media
			}else if($nombreCurso[0]["CUR_CURSO"] == "7" || $nombreCurso[0]["CUR_CURSO"] == "6" || $nombreCurso[0]["CUR_CURSO"] == "5"){
				$aux = 3;
			
			//Si el curso seleccionado es de educacion general basica elemental
			}else if($nombreCurso[0]["CUR_CURSO"] == "4" || $nombreCurso[0]["CUR_CURSO"] == "3" || $nombreCurso[0]["CUR_CURSO"] == "2"){
				$aux = 4;
				
			}

		}
		
		$curso = new Curso();
		$result = $curso->getCursosConHorario();
		
		require_once("ver_horarioDocente.php");
		
		break;
		
	case "ver-horario-alumno":
		
		//Auditoriaa
			$registroA = "Observó Horario";
			$auditoria = new Auditoria();
			$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
		
		$codigo_curso = $_GET['curso'];

		$curso1 = new Curso();
		$nombreCurso = $curso1->getCursoPorCodigo($codigo_curso);
		
		//Si el curso seleccionado es de bachillerato
		if(strpos($nombreCurso[0]["CUR_CURSO"],'BGU') != false){
			$aux = 1;

		//Si es de educacion general basica
		}else{
			
			//Si el curso seleccionado es de educacion general basica superior
			if($nombreCurso[0]["CUR_CURSO"] == "10" || $nombreCurso[0]["CUR_CURSO"] == "9" || $nombreCurso[0]["CUR_CURSO"] == "8"){
				$aux = 2;
			
			//Si el curso seleccionado es de educacion general basica media
			}else if($nombreCurso[0]["CUR_CURSO"] == "7" || $nombreCurso[0]["CUR_CURSO"] == "6" || $nombreCurso[0]["CUR_CURSO"] == "5"){
				$aux = 3;
			
			//Si el curso seleccionado es de educacion general basica elemental
			}else if($nombreCurso[0]["CUR_CURSO"] == "4" || $nombreCurso[0]["CUR_CURSO"] == "3" || $nombreCurso[0]["CUR_CURSO"] == "2"){
				$aux = 4;
				
			}

		}
		
		$result = $curso1->getCursoPorCodigo($codigo_curso);
		
		require_once("ver_horarioAlumno.php");
		
		break;
		
	
	case "eliminar-horario":
		
		//Auditoriaa
			$registroA = "Eliminó Horario";
			$auditoria = new Auditoria();
			$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
		
		$codigoCurso = $_GET['curso'];
		
		$horario = new Horario();
		$curso = new Curso();
		$docente = new Docente();
		$materia = new Materia();
		
		$nombreCurso = $curso->getCursoPorCodigo($codigoCurso);
		
		if(strpos($nombreCurso[0]["CUR_CURSO"],'BGU') != false){
			$limite = 40;
			$aux = 1;

		//Si es de educacion general basica
		}else{
			$limite = 35;
			
			//Si el curso seleccionado es de educacion general basica superior
			if($nombreCurso[0]["CUR_CURSO"] == "10" || $nombreCurso[0]["CUR_CURSO"] == "9" || $nombreCurso[0]["CUR_CURSO"] == "8"){
				$aux = 2;
			
			//Si el curso seleccionado es de educacion general basica media
			}else if($nombreCurso[0]["CUR_CURSO"] == "7" || $nombreCurso[0]["CUR_CURSO"] == "6" || $nombreCurso[0]["CUR_CURSO"] == "5"){
				$aux = 3;
			
			//Si el curso seleccionado es de educacion general basica elemental
			}else if($nombreCurso[0]["CUR_CURSO"] == "4" || $nombreCurso[0]["CUR_CURSO"] == "3" || $nombreCurso[0]["CUR_CURSO"] == "2"){
				$aux = 4;
				
			}

		}
		
		/*$arrayRecibido = $_GET['matMaterias'];
		
		$matrizMaterias = stripslashes($arrayRecibido);
		$matrizMaterias = urldecode($matrizMaterias);
		$matrizMateriasCompleto = unserialize($matrizMaterias);*/
		
		$horarios = $horario->getHorarioPorCurso($codigoCurso);
		
		for($i=0; $i<$limite; $i++){
			
			if($vectorDocentes[$horarios[$i]["MAT_CODIGO"]] == NULL){
				$vectorDocentes[$horarios[$i]["MAT_CODIGO"]] = $horarios[$i]["DOC_CODIGO"];
			}
		}
		

		//Actualizamos el numero de horas disponibles del docente (aumentar)
		foreach($vectorDocentes as $item => $value){
			$nomMateria = $materia->getMateriaPorCodigo($item);
			
			if($aux == 1){
				$numeroHoras = $bachillerato[$nomMateria[0]["MAT_NOMBRE"]];
				
			}else if($aux == 2){
				$numeroHoras = $egbSuperior[$nomMateria[0]["MAT_NOMBRE"]];
				
			}else if($aux == 3){
				$numeroHoras = $egbMedia[$nomMateria[0]["MAT_NOMBRE"]];
				
			}else if($aux == 4){
				$numeroHoras = $egbElemental[$nomMateria[0]["MAT_NOMBRE"]];
				
			}
			
			$docente->aumentarHorasDocente($value, $numeroHoras);
			
		}
		
		$horario->eliminarHorario($codigoCurso);
		$curso->cambiarDisponibilidadCursoDisponible($codigoCurso);
		
		
		header("Location: acciones_BD.php?action=ver-horario");
		
		break;
		
		
	
	case "modificar-horario":
		
		
		
		$codigoCurso = $_GET['curso'];
		
		$horario = new Horario();
		$curso = new Curso();
		$docente = new Docente();
		$materia = new Materia();
		
		$nombreCurso = $curso->getCursoPorCodigo($codigoCurso);
		
		if(strpos($nombreCurso[0]["CUR_CURSO"],'BGU') != false){
			$limite = 40;
			$aux = 1;

		//Si es de educacion general basica
		}else{
			$limite = 35;
			
			//Si el curso seleccionado es de educacion general basica superior
			if($nombreCurso[0]["CUR_CURSO"] == "10" || $nombreCurso[0]["CUR_CURSO"] == "9" || $nombreCurso[0]["CUR_CURSO"] == "8"){
				$aux = 2;
			
			//Si el curso seleccionado es de educacion general basica media
			}else if($nombreCurso[0]["CUR_CURSO"] == "7" || $nombreCurso[0]["CUR_CURSO"] == "6" || $nombreCurso[0]["CUR_CURSO"] == "5"){
				$aux = 3;
			
			//Si el curso seleccionado es de educacion general basica elemental
			}else if($nombreCurso[0]["CUR_CURSO"] == "4" || $nombreCurso[0]["CUR_CURSO"] == "3" || $nombreCurso[0]["CUR_CURSO"] == "2"){
				$aux = 4;
				
			}

		}
		
		$horarios = $horario->getHorarioPorCurso($codigoCurso);
		
		for($i=0; $i<$limite; $i++){

			if($vectorValidacionDocentes[$horarios[$i]["MAT_CODIGO"]] == NULL){
				$vectorValidacionDocentes[$horarios[$i]["MAT_CODIGO"]] = $horarios[$i]["DOC_CODIGO"];

			}
			
		}
		
		if($_POST['modificar']){
			
			/******************************************************Actualizar horario BGU******************************************************/
			if($aux == 1){
				//Auditoriaa
				$registroA = "Modificó Horario BGU";
				$auditoria = new Auditoria();
				$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
				
				$docente = new Docente();
				$curso2 = new Curso();
				$horario = new Horario();
				$materia = new Materia();

				for($i=0; $i<8; $i++){

					for($j=0; $j<5; $j++){

						$matrizMaterias[$i][$j] = $_POST[$i.$j];
					}
				}

				//validacion numero de horas
				for($i=0; $i<8; $i++){

					for($j=0; $j<5; $j++){

						$nombreMaterias = $materia->getMateriaPorCodigo($matrizMaterias[$i][$j]);
						$codigoDocente = $docente->getDocentePorCodigoMateria($matrizMaterias[$i][$j]); 

						for($k=0; $k<count($codigoDocente); $k++){

							$horasDocente = $docente->horasDisponibles($codigoDocente[$k]["DOC_CODIGO"]);
							$docenteDisponible = $docente->verificarHoraDocenteUpdate($codigoDocente[$k]["DOC_CODIGO"], $diasSemana[$j], $horasBGU[$i], $codigoCurso);

							foreach($vectorDocentes as $item => $value){

								if($matrizMaterias[$i][$j] == $item){
									$existenciaMateria = true;
									break;

								}else{
									$existenciaMateria = false;

								}
							}

							//Si la materia no existe en el horario, y el docente esta disponible, tanto en horario, como en numero de horas por docente
							if($existenciaMateria == false && $docenteDisponible[0]["COUNT(*)"] == 0 && $horasDocente[0]["DOC_NUMERO_HORAS"] >= $bachillerato[$nombreMaterias[0]["MAT_NOMBRE"]]){
								$vectorDocentes[$matrizMaterias[$i][$j]] = $codigoDocente[$k]["DOC_CODIGO"];

								$elementoHorario = new Horario();

								$elementoHorario->codigoDocente = $codigoDocente[$k]["DOC_CODIGO"];
								$elementoHorario->codigoCurso = $codigoCurso;
								$elementoHorario->hora = $horasBGU[$i];
								$elementoHorario->dia = $diasSemana[$j];

								array_push($vectorhorarios, $elementoHorario);
								break;

							//Si la materia ya existe en el horario, y el docente esta disponible, tanto en horario, como en numero de horas por docente
							}else if($existenciaMateria == true && $docenteDisponible[0]["COUNT(*)"] == 0 && $horasDocente[0]["DOC_NUMERO_HORAS"] >= $bachillerato[$nombreMaterias[0]["MAT_NOMBRE"]]){

								$elementoHorario = new Horario();

								$disponibilidad = $docente->verificarHoraDocenteUpdate($vectorDocentes[$matrizMaterias[$i][$j]], $diasSemana[$j], $horasBGU[$i], $codigoCurso);
								$disponibilidadHoras = $docente->horasDisponibles($vectorDocentes[$matrizMaterias[$i][$j]]);

								if($disponibilidad[0]["COUNT(*)"] == 0 && $disponibilidadHoras >= $bachillerato[$nombreMaterias[0]["MAT_NOMBRE"]]){

									$elementoHorario->codigoDocente = $vectorDocentes[$matrizMaterias[$i][$j]];
									$elementoHorario->codigoCurso = $codigoCurso;
									$elementoHorario->hora = $horasBGU[$i];
									$elementoHorario->dia = $diasSemana[$j];

									array_push($vectorhorarios, $elementoHorario);
									break;

								}else{

									//if($codigoDocente[$k]["DOC_CODIGO"] != $vectorDocentes[$matrizMaterias[$i][$j]]){
										$validez = cambiarProfesorArreglo($codigoDocente[$k]["DOC_CODIGO"], $matrizMaterias[$i][$j], $aux);

										if($validez){
											$elementoHorario = new Horario();

											$elementoHorario->codigoDocente = $codigoDocente[$k]["DOC_CODIGO"];
											$elementoHorario->codigoCurso = $codigoCurso;
											$elementoHorario->hora = $horasBGU[$i];
											$elementoHorario->dia = $diasSemana[$j];

											array_push($vectorhorarios, $elementoHorario);

											break;

										}
									//}

								}

							//Si el docente no esta disponible y ya no hay mas docentes que impartan la misma materia
							}else if($docenteDisponible[0]["COUNT(*)"] == 1 && $k == count($codigoDocente) - 1){
								array_push($errores, "No hay profesores para la materia ".$nombreMaterias[0]["MAT_NOMBRE"]." durante el: ".$diasSemana[$j]." a la hora: ".$horasBGU[$i].".");
								$auxBool = true;
							}

						}
						$bachillerato_aux[$nombreMaterias[0]["MAT_NOMBRE"]]--;
					}
				}

				foreach($bachillerato_aux as $item => $valor){

					if($valor < 0 || $valor > 0){
						$auxBool = true;
					}
				}

				if($auxBool == true){

					echo "<div class='alert alert-primary' role='alert'>";
					foreach($bachillerato_aux as $item => $valor){

						if($valor < 0){
							echo "La materia de ".$item." no puede superar las ".$bachillerato[$item]." horas por semana.<br>";

						}else if($valor > 0){
							echo "La cantidad de horas de la materia de ".$item." no puede ser menor que ".$bachillerato[$item]." horas por semana.<br>";

						}
					}
					echo "</div>";

					echo "<div class='alert alert-primary' role='alert'>";
					for($i=0; $i<count($errores); $i++){
						echo $errores[$i]."<br>";
					}
					echo "</div>";
					
				}else{
					
					//aumentamos las horas disponibles de los docentes, puesto que, se modificar el horario
					foreach($vectorValidacionDocentes as $item => $value){
						$nomMateria = $materia->getMateriaPorCodigo($item);

						//echo $nomMateria[0]["MAT_NOMBRE"];

						if($aux == 1){
							$numeroHoras = $bachillerato[$nomMateria[0]["MAT_NOMBRE"]];

						}else if($aux == 2){
							$numeroHoras = $egbSuperior[$nomMateria[0]["MAT_NOMBRE"]];

						}else if($aux == 3){
							$numeroHoras = $egbMedia[$nomMateria[0]["MAT_NOMBRE"]];

						}else if($aux == 4){
							$numeroHoras = $egbElemental[$nomMateria[0]["MAT_NOMBRE"]];

						}

						$docente->aumentarHorasDocente($value, $numeroHoras);

					}
					
					//actualizacion de horarios a la base de datos
					for($i=0; $i<count($vectorhorarios); $i++){
						$horario->updateHorario($vectorhorarios[$i]->codigoDocente, $vectorhorarios[$i]->codigoCurso, $vectorhorarios[$i]->hora, $vectorhorarios[$i]->dia);

					}
					reducirHorasDocente($aux);
					
					header("Location: acciones_BD.php?action=ver-horario");
					
				}
				
			/******************************************************Actualizar horario EGB******************************************************/
			}else if($aux == 2 || $aux == 3 || $aux == 4){
				//Auditoriaa
				$registroA = "Modificó Horario EGB";
				$auditoria = new Auditoria();
				$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
				
				$docente = new Docente();
				$curso2 = new Curso();
				$horario = new Horario();
				$materia = new Materia();

				for($i=0; $i<7; $i++){

					for($j=0; $j<5; $j++){

						$matrizMaterias[$i][$j] = $_POST[$i.$j];

					}
				}

				//validacion numero de horas
				for($i=0; $i<7; $i++){

					for($j=0; $j<5; $j++){

						
						$codigoDocente = $docente->getDocentePorCodigoMateria($matrizMaterias[$i][$j]); 
						/*$nombreMaterias = $materia->getMateriaPorCodigo($matrizMaterias[$i][$j]);
						if($aux == 2){
							$numHoras = $egbSuperior[$nombreMaterias[0]["MAT_NOMBRE"]];

						}else if($aux == 3){
							$numHoras = $egbMedia[$nombreMaterias[0]["MAT_NOMBRE"]];


						}else{
							$numHoras = $egbElemental[$nombreMaterias[0]["MAT_NOMBRE"]];

						}*/

						for($k=0; $k<count($codigoDocente); $k++){

							$docenteDisponible = $docente->verificarHoraDocenteUpdate($codigoDocente[$k]["DOC_CODIGO"], $diasSemana[$j], $horasEGB[$i], $codigoCurso);
							$horasDocente = $docente->horasDisponibles($codigoDocente[$k]["DOC_CODIGO"]);

							foreach($vectorDocentes as $item => $value){

								if($matrizMaterias[$i][$j] == $item){
									$existenciaMateria = true;
									break;

								}else{
									$existenciaMateria = false;

								}
							}

							//Si la materia no existe en el horario, y el docente esta disponible, tanto en horario, como en numero de horas por docente
							if($existenciaMateria == false && $docenteDisponible[0]["COUNT(*)"] == 0 && $horasDocente[0]["DOC_NUMERO_HORAS"] >= $numHoras){
								$vectorDocentes[$matrizMaterias[$i][$j]] = $codigoDocente[$k]["DOC_CODIGO"];

								$elementoHorario = new Horario();

								$elementoHorario->codigoDocente = $codigoDocente[$k]["DOC_CODIGO"];
								$elementoHorario->codigoCurso = $codigo_curso;
								$elementoHorario->hora = $horasEGB[$i];
								$elementoHorario->dia = $diasSemana[$j];

								array_push($vectorhorarios, $elementoHorario);
								break;

							//Si la materia ya existe en el horario, y el docente esta disponible, tanto en horario, como en numero de horas por docente
							}else if($existenciaMateria == true && $docenteDisponible[0]["COUNT(*)"] == 0 && $horasDocente[0]["DOC_NUMERO_HORAS"] >= $numHoras){

								$elementoHorario = new Horario();

								$disponibilidad = $docente->verificarHoraDocenteUpdate($vectorDocentes[$matrizMaterias[$i][$j]], $diasSemana[$j], $horasEGB[$i], $codigoCurso);
								$disponibilidadHoras = $docente->horasDisponibles($vectorDocentes[$matrizMaterias[$i][$j]]);

								if($disponibilidad[0]["COUNT(*)"] == 0 && $disponibilidadHoras >= $numHoras){

									$elementoHorario->codigoDocente = $vectorDocentes[$matrizMaterias[$i][$j]];
									$elementoHorario->codigoCurso = $codigo_curso;
									$elementoHorario->hora = $horasEGB[$i];
									$elementoHorario->dia = $diasSemana[$j];

									array_push($vectorhorarios, $elementoHorario);
									break;

								}else{

									//if($codigoDocente[$k]["DOC_CODIGO"] != $vectorDocentes[$matrizMaterias[$i][$j]]){
										$validez = cambiarProfesorArreglo($codigoDocente[$k]["DOC_CODIGO"], $matrizMaterias[$i][$j], $aux);

										if($validez){
											$elementoHorario = new Horario();

											$elementoHorario->codigoDocente = $codigoDocente[$k]["DOC_CODIGO"];
											$elementoHorario->codigoCurso = $codigo_curso;
											$elementoHorario->hora = $horasEGB[$i];
											$elementoHorario->dia = $diasSemana[$j];

											array_push($vectorhorarios, $elementoHorario);

											break;

										}
									//}

								}

							//Si el docente no esta disponible y ya no hay mas docentes que impartan la misma materia
							}else if($docenteDisponible[0]["COUNT(*)"] == 1 && $k == count($codigoDocente) - 1){
								array_push($errores, "No hay profesores para la materia ".$nombreMaterias[0]["MAT_NOMBRE"]." durante el: ".$diasSemana[$j]." a la hora: ".$horasEGB[$i].".");
								$auxBool = true;
							}

						}

						if($aux == 2){
							$egbSuperior_aux[$nombreMaterias[0]["MAT_NOMBRE"]]--;

						}else if($aux == 3){
							$egbMedia_aux[$nombreMaterias[0]["MAT_NOMBRE"]]--;

						}else{
							$egbElemental_aux[$nombreMaterias[0]["MAT_NOMBRE"]]--;

						}

					}
				}

				if($aux == 2){

					foreach($egbSuperior_aux as $item => $valor){

						if($valor < 0 || $valor > 0){
							$auxBool = true;
						}
					}

				}else if($aux == 3){

					foreach($egbMedia_aux as $item => $valor){

						if($valor < 0 || $valor > 0){
							$auxBool = true;
						}
					}

				}else{

					foreach($egbElemental_aux as $item => $valor){

						if($valor < 0 || $valor > 0){
							$auxBool = true;
						}
					}

				}


				if($auxBool == true){

					echo "<div class='alert alert-primary' role='alert'>";


					if($aux == 2){

						foreach($egbSuperior_aux as $item => $valor){

							if($valor < 0){
								echo "La materia de ".$item." no puede superar las ".$egbSuperior[$item]." horas por semana.<br>";

							}else if($valor > 0){
								echo "La cantidad de horas de la materia de ".$item." no puede ser menor que ".$egbSuperior[$item]." horas por semana.<br>";

							}
						}

					}else if($aux == 3){

						foreach($egbMedia_aux as $item => $valor){

							if($valor < 0){
								echo "La materia de ".$item." no puede superar las ".$egbMedia[$item]." horas por semana.<br>";

							}else if($valor > 0){
								echo "La cantidad de horas de la materia de ".$item." no puede ser menor que ".$egbMedia[$item]." horas por semana.<br>";

							}
						}

					}else{

						foreach($egbElemental_aux as $item => $valor){

							if($valor < 0){
								echo "La materia de ".$item." no puede superar las ".$egbElemental[$item]." horas por semana.<br>";

							}else if($valor > 0){
								echo "La cantidad de horas de la materia de ".$item." no puede ser menor que ".$egbElemental[$item]." horas por semana.<br>";

							}
						}

					}

					echo "</div>";

					echo "<div class='alert alert-primary' role='alert'>";
					for($i=0; $i<count($errores); $i++){
						echo $errores[$i]."<br>";
					}
					echo "</div>";
					
				}else{
					
					//aumentamos las horas disponibles de los docentes, puesto que, se modificar el horario
					foreach($vectorValidacionDocentes as $item => $value){
						$nomMateria = $materia->getMateriaPorCodigo($item);
						
						//echo $nomMateria[0]["MAT_NOMBRE"];

						if($aux == 1){
							$numeroHoras = $bachillerato[$nomMateria[0]["MAT_NOMBRE"]];

						}else if($aux == 2){
							$numeroHoras = $egbSuperior[$nomMateria[0]["MAT_NOMBRE"]];

						}else if($aux == 3){
							$numeroHoras = $egbMedia[$nomMateria[0]["MAT_NOMBRE"]];

						}else if($aux == 4){
							$numeroHoras = $egbElemental[$nomMateria[0]["MAT_NOMBRE"]];

						}

						$docente->aumentarHorasDocente($value, $numeroHoras);

					}
					
					//actualizacion horarios a la base de datos
					for($i=0; $i<count($vectorhorarios); $i++){
						$horario->updateHorario($vectorhorarios[$i]->codigoDocente, $vectorhorarios[$i]->codigoCurso, $vectorhorarios[$i]->hora, $vectorhorarios[$i]->dia);

					}
					reducirHorasDocente($aux);
					
					header("Location: acciones_BD.php?action=ver-horario");

				}
				
			}
			
		}
		
		
		require_once("modificar_horario.php");
		
		break;
		
		
	case "ver-horario-admin":
		
		//Auditoriaa
		$registroA = "Observó Horario";
		$auditoria = new Auditoria();
		$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
		
		$codigo_curso = $_POST['curso'];
		
		$curso1 = new Curso();
		$nombreCurso = $curso1->getCursoPorCodigo($codigo_curso);
		
		//Si el curso seleccionado es de bachillerato
		if(strpos($nombreCurso[0]["CUR_CURSO"],'BGU') != false){
			$aux = 1;

		//Si es de educacion general basica
		}else{
			
			//Si el curso seleccionado es de educacion general basica superior
			if($nombreCurso[0]["CUR_CURSO"] == "10" || $nombreCurso[0]["CUR_CURSO"] == "9" || $nombreCurso[0]["CUR_CURSO"] == "8"){
				$aux = 2;
			
			//Si el curso seleccionado es de educacion general basica media
			}else if($nombreCurso[0]["CUR_CURSO"] == "7" || $nombreCurso[0]["CUR_CURSO"] == "6" || $nombreCurso[0]["CUR_CURSO"] == "5"){
				$aux = 3;
			
			//Si el curso seleccionado es de educacion general basica elemental
			}else if($nombreCurso[0]["CUR_CURSO"] == "4" || $nombreCurso[0]["CUR_CURSO"] == "3" || $nombreCurso[0]["CUR_CURSO"] == "2"){
				$aux = 4;
				
			}

		}
		
		$curso = new Curso();
		$result = $curso->getCursosConHorario();
		
		require_once("ver_horario_admin.php");
		
		break;
}



function cambiarProfesorArreglo($codigoProfesor, $codigoMateria, $aux){
	
	$docente = new Docente();
	$materia = new Materia();
	$bool = true;
	
	global $vectorhorarios;
	global $vectorDocentes;
	global $bachillerato;
	global $egbSuperior;
	global $egbMedia;
	global $egbElemental;
	
	$docenteDisponibleHoras = $docente->horasDisponibles($codigoProfesor);
	$nomMateria = $materia->getMateriaPorCodigo($codigoMateria);
	
	if($aux == 1){
		$numHoras = $bachillerato[$nomMateria[0]["MAT_NOMBRE"]];
		
	}else if($aux == 2){
		$numHoras = $egbSuperior[$nomMateria[0]["MAT_NOMBRE"]];
		
	}else if($aux == 3){
		$numHoras = $egbMedia[$nomMateria[0]["MAT_NOMBRE"]];
		
	}else{
		$numHoras = $egbElemental[$nomMateria[0]["MAT_NOMBRE"]];
		
	}
	
	
	if($docenteDisponibleHoras[0]["DOC_NUMERO_HORAS"] >= $numHoras){
		
		for($i=0; $i<count($vectorhorarios); $i++){

			$codMateria1 = $docente->getMateriaPorCodigoDocente($vectorhorarios[$i]->codigoDocente);

			if($codigoMateria == $codMateria1[0]["MAT_CODIGO"]){
				$docenteDisponible = $docente->verificarHoraDocente($codigoProfesor, $vectorhorarios[$i]->dia, $vectorhorarios[$i]->hora);


				if($docenteDisponible[0]["COUNT(*)"] == 1){
					$bool = false;

				}

			}

		}
		
	}else{
		$bool = false;
		
	}
	
	if($bool){

		foreach($vectorDocentes as $item => $value){
			
			if($item == $codigoMateria){
				$vectorDocentes[$item] = $codigoProfesor;
				
			}
		}
		
		for($i=0; $i<count($vectorhorarios); $i++){
			$codMateria2 = $docente->getMateriaPorCodigoDocente($vectorhorarios[$i]->codigoDocente);
			
			if($codigoMateria == $codMateria2[0]["MAT_CODIGO"]){
				$vectorhorarios[$i]->codigoDocente = $codigoProfesor;

			}
		
		}
	}
	
	return $bool;
}

function reducirHorasDocente($aux){
	
	global $vectorDocentes;
	global $bachillerato;
	global $egbSuperior;
	global $egbMedia;
	global $egbElemental;
	
	$docente = new Docente();
	$materia = new Materia();
	
	foreach($vectorDocentes as $item => $value){
		
		$nomMateria = $materia->getMateriaPorCodigo($item);
		
		if($aux == 1){
			$docente->actualizarHorasDocente($value, $bachillerato[$nomMateria[0]["MAT_NOMBRE"]]);
			
		}else if($aux == 2){
			$docente->actualizarHorasDocente($value, $egbSuperior[$nomMateria[0]["MAT_NOMBRE"]]);
			
		}else if($aux == 3){
			$docente->actualizarHorasDocente($value, $egbMedia[$nomMateria[0]["MAT_NOMBRE"]]);
			
		}else{
			$docente->actualizarHorasDocente($value, $egbElemental[$nomMateria[0]["MAT_NOMBRE"]]);
			
		}
		
		
		
	}
}
?>
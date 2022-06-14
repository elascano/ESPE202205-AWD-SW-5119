<?php
	require_once "aud.php";
    require_once "Alumno.php";
    require_once "Persona.php";

	session_start();

	$usuarioIp=$_SESSION['usuario'][1];
	$macAddress=$_SESSION['usuario'][2];
	$fechaIngreso = $_SESSION['usuario'][3];
	$horaIngreso = date('H:i:s');
	$cedula=$_SESSION['usuario'][6];

    if(!empty($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action = "nothing";
    }
    function encriptPassword($pass){
        $passEncript = password_hash($pass,PASSWORD_DEFAULT);
        return $passEncript;
    }
    switch($action){
        case "addAlumno":
            if(isset($_POST['add'])){
				//Auditoriaa
				$registroA = "Agregó Alumno";
				$auditoria = new Auditoria();
				$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
				//Fin auditoria
                $cedula = $_POST['cedula']; 
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido']; 
                $usuario = $_POST['usuario']; 
                $clave = $_POST['clave'];
                $passEncrip = encriptPassword($clave);
                $rol = 2;
                $telefono = $_POST['telefono']; 
                $correo = $_POST['email']; 
                $fecha = $_POST['fechaNacimiento'];
                $curCodigo = 1;
                $estado = $_POST['estado'];
                $persona = new Persona();
                $alumno = new Alumno();
                $insertPersonaId = $persona->addPersona($cedula, $nombre, $apellido, $usuario, $passEncrip, $rol, $telefono, $correo, $fecha);
                $insertAlumnoId = $alumno->addAlumno($cedula, $nombre, $apellido, $usuario, $passEncrip, $rol, $telefono, $correo, $fecha, $curCodigo, $estado);
                if(empty($insertAlumnoId) || empty($insertPersonaId)){
                
                   echo '<br><div class="alert alert-success" role="alert">
                     El estudiante se agregó con exito.
                    </div>';
                    header("refresh:2;url=actionsAdminAlumno.php?action=seeAlumnos");
                }else{
                    echo'<br>
                    <div class="alert alert-danger" role="alert">
                        Ha ocurrido un error al agregar un nuevo estudiante.
                    </div>';
                }
            }
            require_once "../html/administrador/agregarAlumno.php";
            break;
        case "editAlumno":
            $codigo = $_GET["codigo"];
            $persona = new Persona();
            $alumno = new Alumno();
            if(isset($_POST['edit'])){
				//Auditoria
				$registroA = "Edito Alumno";
				$auditoria = new Auditoria();
				$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
				
                $usuario = $_POST['usuario']; 
                $clave = $_POST['clave']; 
                $telefono = $_POST['telefono']; 
                $correo = $_POST['email'];
                $persona->editPersona($usuario, $clave, $telefono, $correo, $codigo);
                $alumno->editAlumno($usuario, $clave, $telefono, $correo, $codigo); 
            }
            $result = $alumno->getAlumnoById($codigo);
            require_once "../html/administrador/modificarAlumno.php";
            break;
        case "seeAlumnos":
            $alumno = new Alumno();
            if(isset($_POST['search'])){
				//Auditoria
				$registroA = "Observó Lista de Alumnos";
				$auditoria = new Auditoria();
				$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
               
				$cursoSelect = $_POST['cursos'];
                $result = $alumno->getAlumnosByCurso($cursoSelect);
            }
            //$result = $alumno->getAlumnos();
            require_once "../html/administrador/verAlumnos.php";
            break;
        case "deleteAlumno":
			//Auditoria
			$registroA = "Elimino Alumno";
			$auditoria = new Auditoria();
			$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
			
            $codigo = $_GET["codigo"];
            $alumno = new Alumno();
            $alumno->deleteAlumno($codigo);
            $result = $alumno->getAlumnos();
            require_once "../html/administrador/verAlumnos.php";
            break;
    }
?>
<?php
	require_once "aud.php";
    require_once "Docente.php";
    require_once "Persona.php";
    require_once "Materia.php";
	
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
        case "addDocente":
            if(isset($_POST['add'])){
				//Auditoriaa
				
				$registroA = "Agregó Docente";
				$auditoria = new Auditoria();
				$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
				
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido']; 
                $fecha = $_POST['fechaNacimiento'];
                $cedula = $_POST['cedula']; 
                $usuario = $_POST['usuario']; 
                $clave = $_POST['clave']; 
                $passEncrip = encriptPassword($clave);
                $telefono = $_POST['telefono']; 
                $correo = $_POST['email']; 
                $especialidad = $_POST['especialidad'];
                $rol = "4";
                $matCodigo = $_POST['matCodigo'];
                $materia = new Materia();
                $res = $materia->getMateriaById($matCodigo);
                $docNivel = ($res[0]["MAT_NIVEL"] == "EB") ? "E" : "B";
                echo $nivel;
                $docNum = 30;
                $persona = new Persona();
                $docente = new Docente();
                $insertPersonaId = $persona->addPersona($cedula, $nombre, $apellido, $usuario,$passEncrip, $rol, $telefono, $correo, $fecha);
                $insertDocenteID = $docente->addDocente($cedula, $nombre, $apellido, $usuario, $passEncrip, $rol, $telefono, $correo, $fecha, $matCodigo, $especialidad, $docNivel, $docNum);
                if(empty($insertDocenteID) || empty($insertPersonaId)){
                    echo '<br><div class="alert alert-success" role="alert">
                    El docente se agregó con exito.
                </div>';
                header("Location: actionsAdminDocente.php?action=seeDocentes");
                }else{
                    echo'<br>
                    <div class="alert alert-danger" role="alert">
                        Ha ocurrido un error al agregar un nuevo docente.
                    </div>';
                    
                }
            }
            require_once "../html/administrador/agregarDocente.php";
            break;
        case "editDocente":
            $codigo = $_GET["codigo"];
            $docente = new Docente();
            $persona = new Persona();
            if(isset($_POST['edit'])){
				//Auditoriaa
				
				$registroA = "Edito Docente";
				$auditoria = new Auditoria();
				$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
				
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $usuario = $_POST['usuario']; 
                $clave = $_POST['clave']; 
                $telefono = $_POST['telefono']; 
                $correo = $_POST['email'];
                //$persona->editPersona($usuario, $clave, $telefono, $correo, $codigo);
                $docente->editDocente($nombre,$apellido,$usuario, $clave, $telefono, $correo, $codigo);
            }
            $result = $docente->getDocenteById($codigo);
            require_once "../html/administrador/modificarDocente.php";
            break;
        case "seeDocentes":
			//Auditoriaa
			$registroA = "Observó Lista de Docentes";
			$auditoria = new Auditoria();
			$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
			
            $docente = new Docente();
            $result = $docente->getDocentes();
            require_once "../html/administrador/verDocentes.php";
            break;
    }
?>
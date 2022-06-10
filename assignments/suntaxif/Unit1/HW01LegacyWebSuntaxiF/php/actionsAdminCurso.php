<?php
    //Acciones para el administrador
	require_once "aud.php";
    require_once "DB.php";
    require_once "Curso.php";
	
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

    switch($action){
        case "addCurso":
            if(isset($_POST['add'])){
				//Auditoriaa
				$registroA = "Agregó Curso";
				$auditoria = new Auditoria();
				$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
				
                $nombre = $_POST['curso'];
                $paralelo = $_POST['paralelo'];
                $cursoN = new Curso();
                if($cursoN->verificarCurso($nombre,$paralelo)){
                    echo '<br><div class="alert alert-danger" role="alert">
                    El curso '.$nombre.' ya existe, inténtelo de nuevo.
                    </div>';
                }else{
                    $insertCurso = $cursoN->addCurso($nombre, $paralelo);
                    if(empty($insertCurso)){
                        echo '<br><div class="alert alert-danger" role="alert">
                        Ha ocurrido un error al agregar un nuevo curso.
                        </div>';
                    }else{
                        echo'<br><div class="alert alert-success" role="alert">
                        El curso se agregó con exito.
                        </div>';
                        header("refresh:2;url=actionsAdminCurso.php?action=seeCurso");
                    }
                }
            }
            require_once ("../html/administrador/agregarCurso.php");
            break;
        case "editCurso":
            $codigo = $_GET["codigo"];
            $curso = new Curso();
            if(isset($_POST['add'])){
				//Auditoriaa
				$registroA = "Edito Curso";
				$auditoria = new Auditoria();
				$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);

                $paralelo = $_POST['paralelo'];
                $curso->editCurso($paralelo, $codigo);
				
				header("Location: actionsAdminCurso.php?action=seeCurso");
            }
            $result = $curso->getCursoById($codigo);
            require_once ("../html/administrador/modificar_curso.php");
            break;
        case "deleteCurso":
			//Auditoria
			$registroA = "Elimino Curso";
			$auditoria = new Auditoria();
			$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
			
            $codigo = $_GET["codigo"];
            $curso = new Curso();
            $curso->deleteCurso($codigo);
            $result = $curso->getCursos();
            require_once "../html/administrador/verCursos.php";
            break;
        case "seeCurso":
			//Auditoria
			$registroA = "Observó Lista de Cursos";
			$auditoria = new Auditoria();
			$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
			
            $curso = new Curso();
            $result = $curso->getCursos();
            require_once "../html/administrador/verCursos.php";
            break;
    }
?>
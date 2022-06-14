<?php
	require_once "aud.php";
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
        $action = "nada";
    }

    switch($action){
        case "addMateria":
            require_once "../html/administrador/agregarMateria.php";
            break;
        case "addMateriaBGU":
            $title = "Agregar Materia BGU";
            $materias = array("Matematica", "Fisica", "Quimica", "Biologia", "Historia", "Ciudadania", "Filosofia", "Lengua y literatura","Ingles", "Educacion artistica", "Educacion fisica", "Emprendimiento", "Informatica");//Arreglo con las materias BGU
            if(isset($_POST['add'])){
				//Auditoriaa
				
				$registroA = "Agregó Materia BGU";
				$auditoria = new Auditoria();
				$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
				
                $nombre = $_POST['nombre'];
                $area = $_POST['area'];
                $nivel = "B";
                $materia = new Materia();
                if($materia->comprobeMateria($nombre, $nivel)){
                    echo '<br><div class="alert alert-danger" role="alert">
                    La materia '.$nombre.' ya fue agregada, inténtelo de nuevo.
                    </div>';
                }else{
                    $insertMateriaId = $materia->addMateria($area, $nombre, $nivel);
                    if(empty($insertMateriaId)){
                        echo '<br><div class="alert alert-danger" role="alert">
                        Ha ocurrido al agregar una nueva materia.
                        </div>';
                    }else{
                        echo'<br><div class="alert alert-success" role="alert">
                            La materia se agregó con exito.
                        </div>';
                    }
                }
            }
            require_once "../html/administrador/agregarMateriaForm.php";
            break;
        case "addMateriaEGB":
            $title = "Agregar Materia EGB";
            $materias = array("Lenguaje","Matematica","Estudios Sociales","Ciencias Naturales", "Educacion artistica", "Educacion Fisica", "Ingles", "Proyectos");//Arreglo con las materias EGB
            if(isset($_POST['add'])){
				//Auditoriaa
				
				$registroA = "Agregó Materia EGB";
				$auditoria = new Auditoria();
				$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
                $nombre = $_POST['nombre'];
                $area = $_POST['area'];
                $nivel = "EB";
                $materia = new Materia();
                if($materia->comprobeMateria($nombre, $nivel)){
                    echo '<br><div class="alert alert-danger" role="alert">
                    La materia '.$nombre.' ya fue agregada, inténtelo de nuevo.
                    </div>';
                }else{
                    $insertMateriaId = $materia->addMateria($area, $nombre, $nivel);
                    if(empty($insertMateriaId)){
                        echo '<br><div class="alert alert-danger" role="alert">
                        Ha ocurrido al agregar una nueva materia.
                        </div>';
                    }else{
                        echo'<br><div class="alert alert-success" role="alert">
                            La materia se agregó con exito.
                        </div>';
                    }
                }
            }
            require_once "../html/administrador/agregarMateriaForm.php";
            break;
        case "editMateria":
            $codigo = $_GET['codigo'];
            $materia = new Materia();
            if(isset($_POST['edit'])){
				//Auditoriaa
				
				$registroA = "Edito una Materia";
				$auditoria = new Auditoria();
				$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
				
                $nombre = $_POST['nombre'];
                $nivel = $_POST['nivel'];
                $materia->editMateria($nombre, $nivel, $codigo);
            }
            $result = $materia->getMateriaById($codigo);
            require_once "../html/administrador/modificarMateria.php";
            break;
        case "seeMateria":
			//Aditoria
			$registroA = "Observó Lista de Materias";
				$auditoria = new Auditoria();
				$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
			
            $materia = new Materia();
            $result = $materia->getMaterias();
            require_once "../html/administrador/verMaterias.php";
            break;
    }
?>
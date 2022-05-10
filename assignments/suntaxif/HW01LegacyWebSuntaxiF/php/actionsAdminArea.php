<?php
	require_once "aud.php";
    require_once "Area.php";
	
	session_start();
	$usuarioIp=$_SESSION['usuario'][1];
	$macAddress=$_SESSION['usuario'][2];
	$fechaIngreso = $_SESSION['usuario'][3];
	$horaIngreso = date('H:i:s');
	$cedula=$_SESSION['usuario'][6];

    if(!empty($_GET["action"])){
        $action = $_GET["action"];
    }else{
        $action = "nada";
    }

    switch($action){
        case "addArea":
            $area = new Area();
            if(isset($_POST['add'])){
				//Auditoriaa
				$registroA = "Agregó Área";
				$auditoria = new Auditoria();
				$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
				
                $nombre = $_POST['nombre'];
                $insertAreaId = $area->addArea($nombre);
                if(empty($insertAreaId)){
                    echo '<br><div class="alert alert-danger" role="alert">
                        Ha ocurrido un error al agregar una nueva área.
                    </div>';
                }else{
                    echo'<br><div class="alert alert-success" role="alert">
                        El área se agregó con exito.
                    </div>';
                    header("refresh:2;url=actionsAdminArea.php?action=seeAreas");
                }
            }
            require_once "../html/administrador/agregarArea.php";
            break;
        case "editArea":
            $codigo = $_GET['codigo'];
            $area = new Area();
            if(isset($_POST['edit'])){
				//Auditoriaa
				$registroA = "Edito Área";
				$auditoria = new Auditoria();
				$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
				
                $nombre = $_POST['nombre'];
                $area->editArea($nombre, $codigo);
				
				header("Location: actionsAdminArea.php?action=seeAreas");
            }
            $result = $area->getAreaById($codigo);
            require_once "../html/administrador/modificarArea.php";
            break;
        case "seeAreas":
			//AUDITORIA
			$registroA = "Observó Lista de Áreas";
			$auditoria = new Auditoria();
			$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);
			
            $area = new Area();
            $result = $area->getAreas();
            require_once "../html/administrador/verAreas.php";
            break;
    }
?>
<?php
require_once "aud.php";
session_start();
	$usuarioIp=$_SESSION['usuario'][1];
	$macAddress=$_SESSION['usuario'][2];
	$fechaIngreso = $_SESSION['usuario'][3];
	$horaIngreso = date('H:i:s');
	$cedula=$_SESSION['usuario'][6];

//Auditoria
	$registroA = "Finalizó Sesión";
	$auditoria = new Auditoria();
	$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);

session_destroy();
header('Location: ../index.php');
?>
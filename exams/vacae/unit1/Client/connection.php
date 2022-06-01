<?php
	require 'vendor/autoload.php';
	$connection = new MongoDB\Client;

	$mongo = new MongoDB\Client('mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/?retryWrites=true&w=majority');
	$db = $mongo->farmaciadb;
	$medicines = $db->users;


	$user = $_POST['user'];
  	$pass = $_POST['password'];

	$condicionU = array("user"=>$user,"pass"=>$pass);
	
	if ($medicines->count($condicionU) == 1 ){
		header("Location: main.php");
	}
	else{
		echo 'El usuario o password es incorrecto, DEBER CREAR ESTA PAGINA DE ERROR PARA QUE TENGA ENLACE AL INDEX NUEVAMENTE , <a href="index.html">vuelva a intenarlo</a>.<br/>';
		echo 'USUARIO: '+ $user;
	}


	
?>
<?php

include ('conexionS.php');

    if (isset($_POST['ingresar'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $user = $_POST['user'];
        $clave = $_POST['clave'];
        $correo = $_POST['correo'];
        $area = $_POST['area'];
        $nivel = $_POST['nivel'];
        
		$clave_cifrada = password_hash($clave,PASSWORD_DEFAULT);
        $query = "INSERT INTO `usuario`(`nombre`, `apellido`, `cedula`, `user`, `clave`, `correo`,`curso`, `rol`, `area`, `nivel`) VALUES ('$nombre', '$apellido', '$cedula', '$user','$clave_cifrada','$correo', 'N/A','Docente','$area','$nivel')";
        
        $result = mysqli_query($conexionS, $query);
        
        if(!$result){
            header("Location: ../../html/error.html");
            die("Error, trabajamos en ello");
        }

        $_SESSION['message'] = 'Guardado exitosamente';
        $_SESSION['message_type'] = 'success';

        header("Location: indexS.php");
    
    
    }
?>
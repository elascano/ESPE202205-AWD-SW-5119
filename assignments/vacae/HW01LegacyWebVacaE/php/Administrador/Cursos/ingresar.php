<?php

include ('conexionS.php');

    if (isset($_POST['ingresar'])){
        $nombre = $_POST['nombre'];
        

        $query = "INSERT INTO `cursos`(`nombre`) VALUES ('$nombre')";
        
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
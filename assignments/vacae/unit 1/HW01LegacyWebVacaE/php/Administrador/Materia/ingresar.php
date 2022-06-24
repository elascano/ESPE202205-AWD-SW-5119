<?php

include ('conexionS.php');

    if (isset($_POST['ingresar'])){
        $nombre = $_POST['nombre'];
        $area = $_POST['area'];
        $nivel = $_POST['nivel'];
        $horas = $_POST['horas'];
        

        $query = "INSERT INTO `materias`(`mat_nombre`, `mat_area`, `mat_nivel`, `mat_horas`) VALUES ('$nombre', '$area', '$nivel', '$horas')";
        
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
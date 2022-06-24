<?php
    include("conexionS.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $squery = "UPDATE materias SET estado=1 WHERE mat_codigo = $id";
        $result = mysqli_query($conexionS,$squery);

        if(!$result){
            die("ERROR!");
        }

        $_SESSION['message'] = 'Activado Correctamente';
        $_SESSION['message_type'] = 'danger'; //color del mensaje
        header("Location: ver.php");
    }
?>
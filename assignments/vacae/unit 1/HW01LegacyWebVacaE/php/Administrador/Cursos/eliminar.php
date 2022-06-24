<?php
    include("conexionS.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $squery = "UPDATE cursos SET estado=0 WHERE id = $id";
        $result = mysqli_query($conexionS,$squery);

        if(!$result){
            die("ERROR!");
        }

        $_SESSION['message'] = 'Eliminado satisfactoriamente';
        $_SESSION['message_type'] = 'danger'; //color del mensaje
        header("Location: ver.php");
    }
?>
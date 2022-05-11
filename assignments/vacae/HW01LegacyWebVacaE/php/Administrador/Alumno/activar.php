<?php
    include("conexionS.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $squery = "UPDATE usuario SET estado=1 WHERE id = $id";
        $result = mysqli_query($conexionS,$squery);

        if(!$result){
            die("ERROR!");
        }

        $_SESSION['message'] = 'Activado Correctamente';
        $_SESSION['message_type'] = 'danger'; //color del mensaje
        header("Location: ver.php");
    }
?>
<?php
include 'ConectionMongoDb.php';

    $idDelete = $_GET["idDelete"];

    $condicion = array("Id" => $idDelete);

    if ($students->count($condicion) == 1){
        $students->deleteOne($condicion);

    }
    header("Refresh: 0;url=index.php?mensaje=1");
    exit;

?>
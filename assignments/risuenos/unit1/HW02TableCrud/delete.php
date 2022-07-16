<?php
include "db_connec.php";
$id = $_GET['id'];
$sql = "DELETE FROM `userdata` WHERE `id` = $id";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: index.php?msg=Usuario eliminado.");
}else{
    header("Location: index.php?msg=Error al eliminar usuario.");
}
?>
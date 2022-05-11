<?php
session_start();
header("location:login.php");
// Destruye la sesion actual
session_destroy();
?>  
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilosLogin.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
      <div class="wrapper fadeInDown">
        <div id="formContent">
          <div class="fadeIn first">
            <img src="img/imgLogo.png" id="icon" class="logo" alt="User Icon" />
          </div>
          <div class="pt-2">
            <form action="#" method="post" id="form1" name="form1">
              <input
                type="text"
                id="login"
                class="fadeIn second"
                name="PER_USUARIO"
                for="PER_USUARIO"
                placeholder="Usuario"
              />
              <input
                type="password"
                id="password"
                class="fadeIn third"
                name="PER_CLAVE"
                for="PER_CLAVE"
                placeholder="Contraseña"
              />
              <div class="pt-2">
                <button class="btn btn-primary mb-4 btn-tam" type="submit" name="login" id="botonLogin">
                  Iniciar Sesión
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>

</html>

<?php
include_once 'php/conexion.php';
require_once 'php/encriptar.php';
require_once 'php/auditoria.php';

session_start();

if (isset($_GET['cerrar_sesion'])) {
    session_unset();

    // destroy the session 
    session_destroy();
}

//redirijo usuarios a su pagina permitida
if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
        case 1:
            header('location: html/administrador/administrador.php');
            break;

        case 2:
            header('location: html/alumno/alumno.php');
            break;

        case 3:
            header('location: html/supervisor/supervisor.php');
            break;

        case 4:
            header('location: html/docente/docente.php');
            break;

        default:
    }
}

//validando que exista el usuario y password
if (isset($_POST['PER_USUARIO']) && isset($_POST['PER_CLAVE'])) {
    $username = $_POST['PER_USUARIO'];
    $password = $_POST['PER_CLAVE'];

    $db = new Conexion();
    $query = $db->connect()->prepare('SELECT * FROM persona WHERE PER_USUARIO = :PER_USUARIO ');
    $query->execute(['PER_USUARIO' => $username]);
    
    $row = $query->fetch(PDO::FETCH_NUM);

    //echo $row[4];

    if (password_verify($password,$row[4])) {
        $rol = $row[5];
        $_SESSION['user'] = $row[0];
        $_SESSION['rol'] = $rol;
        switch ($rol) {
            case 1:
                header('location: html/administrador/administrador.php');
                break;

            case 2:
                header('location: html/alumno/alumno.php');
                break;

            case 3:
                header('location: html/supervisor/supervisor.php');
                break;

            case 4:
                header('location: html/docente/docente.php');
                break;

            default:
        }
    } else {
        // no existe el usuario
        echo '<script> alert("Nombre de usuario o contraseña incorrecto");</script>';
    }
}
function encriptPassword($pass){
    $passEncript = password_hash($pass,PASSWORD_DEFAULT);
    return $passEncript;
}

?>
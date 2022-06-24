<?php
include("conexionS.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $squery = "SELECT * FROM materias WHERE mat_codigo = $id";
    $result = mysqli_query($conexionS, $squery);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        //$id = $row['id'];
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $cedula = $row['cedula'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $clave = $_POST['clave'];

    $query = "UPDATE materias set mat_horas = '$clave' WHERE mat_codigo = '$id'";
    mysqli_query($conexionS, $query);

    $_SESSION['message'] = 'Horas actualizadas correctamente';
    $_SESSION['message_type'] = 'warning';

    header("Location: ver.php");
}


?>

<?php include('includes/headerS.php') ?>
<div class="container p-4">
    <div class="row">
        <div class="card card-body">
            <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="form-group">
                <input type="number" name="clave" rows='2' class="form-control" placeholder="horas" min="0" >
                </div>
                <br><br>
                <button class="btn btn-success " name="update">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footerS.php') ?>
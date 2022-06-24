<?php
include("conexionS.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $squery = "SELECT * FROM cursos WHERE id = $id";
    $result = mysqli_query($conexionS, $squery);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $nombre = $row['nombre'];
        
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $clave = $_POST['clave'];

    $query = "UPDATE cursos set nombre = '$clave' WHERE id = '$id'";
    mysqli_query($conexionS, $query);

    $_SESSION['message'] = 'Curso actualizado correctamente';
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
                <input type="text" name="clave" rows='2' class="form-control" placeholder="Nombre Curso" autofocus required>
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
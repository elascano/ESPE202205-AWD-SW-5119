<?php
include "db_connec.php";

if(isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO `userdata`(`firstName`, `lastName`, `email`, `gender`) VALUES ('$firstName','$lastName','$email','$gender')";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg=Nuevo usuario registrado exitosamente.");
    }else{
        echo "Failed: " . mysqli_error($conn);
    }
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #141301;color: #E5E7E6">
        Operaciones CRUD con PHP
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Agregar a un nuevo usuario</h3>
            <p class="text-muted">Completa el formulario</p>      
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width: 300px;">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstName">Nombre</label>
                            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Andrés" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastName">Apellido</label>
                            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Coronel" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                        <div class="form-group">
                            <label for="email">Apellido</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="example@example.com" required>
                        </div>
                </div>

                <div class="form-group mb-3">
                    <label for="gender">Genero:</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="Hombre" value="Hombre">
                    <label for="Hombre" class="form-input-label">Hombre</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="Mujer" value="Mujer">
                    <label for="Mujer" class="form-input-label">Mujer</label>
                </div>
      
                <div>
                    <button type="submit" class="btn btn-success" name="submit">Guardar</button>
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
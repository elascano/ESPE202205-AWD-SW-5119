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
       <?php
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>'.$msg.'</strong>
          </div>';
        }
       ?>
       <a href="add_new.php" class="btn btn-primary mb-3">Agregar nuevo</a>
   

    <table class="table table-hover text-center">
    <thead class="table-dark">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Email</th>
        <th scope="col">Genero</th>
        <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "db_connec.php";
        $sql = "SELECT * FROM `userdata`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
            <td scope="row"><?php echo $row['id'] ?></td>
            <td scope="row"><?php echo $row['firstName'] ?></td>
            <td scope="row"><?php echo $row['lastName'] ?></td>
            <td scope="row"><?php echo $row['email'] ?></td>
            <td scope="row"><?php echo $row['gender'] ?></td>
            
            
            <td>
                <a href="edit.php?id= <?php echo $row['id'] ?>" class="btn btn-dark">Editar</a>
                <a href="delete.php?id= <?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a>
            </td>
            </tr>
        <?php
            $id = $row['id'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $email = $row['email'];
            
      
        }
        ?>
        
       
    </tbody>
    </table>
    </div>
</body>
</html>
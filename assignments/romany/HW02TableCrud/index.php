<?php include("db_connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="nav">
        <h1>REGISTRO DE LIBROS</h1><br><br>
        <a href="save.php" class = "button-register">Registrar</a>
    </nav>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Autor</th>
                <th>Publicacion</th>
                <th>Editorial</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM books";
            $tasks=mysqli_query($con,$query);
            while ($row=mysqli_fetch_array($tasks)){?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['author'];?></td>
                    <td><?php echo $row['yearOfPublication'];?></td>
                    <td><?php echo $row['editorial'];?></td>
                    <td>
                        <a href="update.php?id=<?php echo $row['id']?>">
                            Editar
                        </a>
                        <a href="delete.php?id=<?php echo $row['id']?>">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</body>

</html>
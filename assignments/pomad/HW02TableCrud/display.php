<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Crud Operation | Display</title>
</head>
<body>
    <div class="container">
        <div class="form__div">
            <h1 class="title">Lista de Animes</h1>
            <button class="form__button_save">
                <a href="index.php">Añadir</a>    
            </button>
            <table>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $querySelect = "Select * from `anime_information`";
                        $queryResult =  mysqli_query($dbConnection, $querySelect);
                        if($queryResult){
                            while($row = mysqli_fetch_assoc($queryResult)){
                                $id = $row['id'];
                                $title = $row['title'];
                                $description = $row['description'];
                                $author = $row['author'];
                                $gender = $row ['gender'];
                                echo '<tr> 
                                <th scope="row">'.$id.'</th> 
                                <td>'.$title.'</td> 
                                <td>'.$description.'</td> 
                                <td>'.$author.'</td> 
                                <td>'.$gender.'</td> 
                                <td>
                                <button class="form__button_update"><a href="update.php?updateid='.$id.'">Editar</a></button>
                                <button class="form__button_delete"><a href="delete.php?deleteid='.$id.'">Eliminar</a></button>
                                </td>
                                </tr>';
                            }
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>
<?php
include 'connect.php';
$id = $_GET['updateid'];
$querySelect = "Select * from `anime_information` where id = $id";
$queryResult = mysqli_query($dbConnection, $querySelect);
$row =  mysqli_fetch_assoc($queryResult);
$title = $row['title'];
$description = $row['description'];
$author = $row['author'];
$gender = $row ['gender'];

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $author = $_POST['author'];
    $gender = $_POST['gender'];

    $queryUpdate = "update  `anime_information` set id = '$id', 
                                                    title = '$title',
                                                    description = '$description', 
                                                    author = '$author',
                                                    gender = '$gender'
                                                    where id= $id";

    $queryResult = mysqli_query($dbConnection, $queryUpdate);

    if($queryResult){
        header('location:display.php');
    }else{
        die(mysqli_error($dbConnection));
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Crud Operation | Update</title>
  </head>
  <body>
      <div class="form__div container">
        <h1 class="title">Editar Anime</h1>
        <button class="form__button_save">
            <a href="display.php" >Regresar</a>
        </button>
        <form method="post">
            <div class="form__item">
                <label>Título</label>
                <textarea name="title" class="form__input" rows="1">
                    <?php echo $title;?>
                </textarea>
            </div>
            <div class="form__item">
                <label>Descripción</label>
                <textarea name="description" class="form__input" rows="3">
                    <?php echo $description;?>
                </textarea>
            </div>
            <div class="form__item">
                <label>Autor</label>
                <textarea name="author" class="form__input" rows="1">
                    <?php echo $author;?>
                </textarea>
            </div>
            <div class="form__item">
                <label>Genero</label>
                <textarea name="gender" class="form__input" rows="1">
                    <?php echo $gender;?>
                </textarea>
            </div>

            <button type="submit" class="form__button_update"
            name="submit">Editar</button>
        </form>
      </div>
  </body>
</html>
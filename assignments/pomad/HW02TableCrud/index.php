<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $author = $_POST['author'];
    $gender = $_POST['gender'];

    $queryInsert = "insert into `anime_information`(title, description, author, gender)
    values('$title', '$description', '$author', '$gender')";

    $queryResult = mysqli_query($dbConnection, $queryInsert);

    if($queryResult){
    //   echo"Data inserted successfully";
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
    <title>Crud Operation | Insert</title>
  </head>
  <body>
      <div class="form__div container">
        <h1 class="title">Registro</h1>
        <br>
        <form method="post">
            <div class="form__item">
                <label>Título</label>
                <input type="text" class="form__input" 
                name="title" autocomplete="off">
            </div>
            <div class="form__item">
                <label>Descripción</label>
                <textarea name="description" autocomplete="off" class="form__input" rows="3"></textarea>
            </div>
            <div class="form__item">
                <label>Autor</label>
                <input type="text" class="form__input"
                name="author" autocomplete="off">
            </div>
            <div class="form__item">
                <label>Genero</label>
                <input type="text" class="form__input"
                name="gender" autocomplete="off">
            </div>
            <button type="submit" class="form__button_save"
            name="submit">Guardar</button>
        </form>
      </div>
  </body>
</html>
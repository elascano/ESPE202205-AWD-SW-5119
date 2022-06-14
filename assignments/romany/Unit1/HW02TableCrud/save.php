<?php
include("db_connection.php");
if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $author = $_POST['author']; 
    $yearOfPublication = $_POST['yearOfPublication'];
    $editorial = $_POST['editorial'];
    $id = $_POST['id'];
    $query = "INSERT INTO books(id, title, author, yearOfPublication,editorial) VALUES ('$id','$title','$author', '$yearOfPublication','$editorial')";
    $result = mysqli_query($con, $query);
    echo $title;
    if (!$result) {
        die("Couldn't insert'");
    }
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>OPERACIONES CRUD </title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200;500&display=swap');
        </style>
</head>
<body>
    <section class="form-register">
    <form action="save.php" method="POST">
        <h1>Registrar un Libro</h1>
        <input class="fields" type="text" name="id"  placeholder="Codigo">
        <input class="fields" type="text" name="title"  placeholder="Titulo">
        <input class="fields" type="text" name="author"  placeholder="Autor">
        <input class="fields" type="text" name="yearOfPublication"  placeholder="Año de publicación">
        <input class="fields" type="text" name="editorial" placeholder="Editorial"> 
        <input type="submit" class="button" name="save_task" value="Registrar">  
    </form>
    </section>
</body>
</html>
<?php
include("db_connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM books WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $title = $row['title'];
        $author = $row['author'];
        $yearOfPublication = $row['yearOfPublication'];
        $editorial = $row['editorial'];
    }
    if (isset($_POST['update'])) {
        echo 'actualizando';
        $id = $_GET['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $yearOfPublication = $_POST['yearOfPublication'];
        $editorial = $_POST['editorial'];
        $query="UPDATE books set title='$title', author='$author', yearOfPublication='$yearOfPublication', editorial='$editorial' where id='$id'";
        mysqli_query($con,$query);
        header("Location:index.php");
    }
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
    <form action="update.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <h1>ACTUALIZAR INFORMACIÓN</h1>
        <input class="fields" type="text" name="title"  placeholder="Titulo" value = "<?php echo $title;?>">
        <input class="fields" type="text" name="author"  placeholder="Autor" value = "<?php echo $author;?>">
        <input class="fields" type="text" name="yearOfPublication"  placeholder="Año de publicación" value = "<?php echo $yearOfPublication;?>">
        <input class="fields" type="text" name="editorial" placeholder="Editorial" value = "<?php echo $editorial;?>"> 
        <input type="submit" class="button" name="update" value="Actualizar" >  
    </form>
    </section>
</body>
</html>
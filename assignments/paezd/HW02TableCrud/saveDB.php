Los datos han sido guardados
<a href="index.php">Nuevo dato</a>
<a href="list.php">Mostrar todos los datos</a>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "systemhome";

    $mysqli = new mysqli($servername, $username, $password, $dbname);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
      }

      $bedroom = $_POST['bedroom'];
      $badroom = $_POST['badroom'];
      $area = $_POST['area'];
      $addres = $_POST['addres'];

      $sql = "INSER INTO home(bedroom,badroom,area,addres) values = ('$bedroom','$badroom','$area','$addres');";

      $mysqli->query($sql)

?>
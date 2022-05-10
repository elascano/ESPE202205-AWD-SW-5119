<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center">HOLA EGB</h1>
    <form>
    <label for="cursosEGB">Cursos:</label>
    <select name="cursosEGB" id="idcursosEGB">
      <option value="segundob">2do EGB</option>
      <option value="tercerob">3ro EGB</option>
      <option value="cuartob">4to EGB</option>
      <option value="quintob">5to EGB</option>
      <option value="sextob">6to EGB</option>
      <option value="septimob">7mo EGB</option>
      <option value="octavob">8vo EGB</option>
      <option value="novenob">9no EGB</option>
      <option value="decimob">10mo EGB</option>
    </select>

    <input type="submit" name="solicitar" value="Solicitar" >
</form>


<?php
  if ( isset( $_POST[ 'solicitar' ] ) ) {

    if ( count( $_SESSION[ 'cliente' ] ) === 0 ) {
      echo( "<p>No hay clientes</p>" );
    } else {

      echo"<br>";

      echo "<table border=1";
      echo "<tr>";
      echo "<th>Horario</th>";
      echo "<th>Martes</th>";
      echo "<th>Miercoles</th>";
      echo "<th>Jueves</th>";
      echo "<th>Viernes</th>";
      echo "<th>Direccion</th>";
      echo "<th>Telefono</th>";
      echo "</tr>";

      foreach ( $_SESSION[ 'cliente' ] as $key => $value ) {
        ?>
        
  <tr>
    <td><?php echo $value['nombre']; ?></td>
    <td><?php echo $value['cedula']; ?></td>
    <td><?php echo $value['fechaN']; ?></td>
    <td><?php echo $value['genero']; ?></td>
    <td><?php echo $value['estadoC']; ?></td>
    <td><?php echo $value['direccion']; ?></td>
    <td><?php echo $value['telefono']; ?></td>
  </tr>
      
  <?php
  }
  echo "</table>";
  }
  }
  ?>
</body>
</html>
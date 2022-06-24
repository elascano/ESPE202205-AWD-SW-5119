<!doctype html>
<html>
<head>
	 <title>Inventario</title>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/tableStyle.css" rel="stylesheet" type="text/css">
</head>

	<body><br>
<br>

</div>
<div ><h1>Inventario de Zapatos Registrados</h1>
<br>
<br>
<?php
	session_start();
  $nombreServidor = "localhost";
  $nombreUsuario = "admin";
  $passwordBaseDeDatos = "admin";
  $nombreBaseDeDatos = "shoesdb";
  
  // Crear conexión con la base de datos.
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
   
  // Validar la conexión de base de datos.
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
		$consulta= "SELECT * FROM shoes";
	
    $result=mysqli_query($conn,$consulta);
?>
<table id="customers">
  <tr>
  <th>Codigo</th>
  <th>Marca</th>
  <th>Modelo</th>
  <th>Categoría</th>
  <th>Género</th>
  <th>Talla</th>
  <th>Precio</th>
  </tr>
<?php
	
//Mostramos los registros
while ($row=mysqli_fetch_array($result))
{
echo '<tr><td>'.$row["shoes_index"].'</td>';
echo '<td>'.$row["shoes_brand"].'</td>';
echo '<td>'.$row["shoes_model"].'</td>';
echo '<td>'.$row["shoes_category"].'</td>';	
echo '<td>'.$row["shoes_gender"].'</td>';
echo '<td>'.$row["shoes_size"].'</td>';
echo '<td>'.$row["shoes_price"].' $ </td></tr>';
}
mysqli_free_result($result)
?>
</table>
</div>

</body>
</html>
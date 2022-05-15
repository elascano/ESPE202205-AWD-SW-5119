<?php 

	$conexion=mysqli_connect('localhost','root','','systemhome');

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<br>

	<table >
		<tr>
			<td>ID</td>
			<td>Habitaciones</td>
			<td>Banio</td>
			<td>Area</td>
			<td>Ubicacion</td>	
		</tr>

		<?php 
		$sql="SELECT * from home";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result));{
		 ?>

		<tr>
			<td><?php echo $mostrar['ID'] ?></td>
			<td><?php echo $mostrar['Bedrooms'] ?></td>
			<td><?php echo $mostrar['Bathrooms'] ?></td>
			<td><?php echo $mostrar['Area'] ?></td>
			<td><?php echo $mostrar['Addres'] ?></td>
		</tr>
	<?php 
	}
	 ?>
	</table>

</body>
</html>
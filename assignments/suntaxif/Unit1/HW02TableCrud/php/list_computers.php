<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>List of computers</title>
<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
<?php
	$conn = new mysqli("localhost", "admin", "admin", "advanced_web");

	if ($conn ->connect_error) {
			die("Connection failed: " . $conn ->connect_error);
	}
	
	$query ="SELECT * FROM computers";
	$resultado = mysqli_query($conn,$query);
?>
	<div class="form">
	  <table align="center">
		  <thead>
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Trademark</th>
			  <th scope="col">Model</th>
			  <th scope="col">Storage</th>
			  <th scope="col">Processor</th>
			  <th scope="col">Price</th>
			</tr>
		  </thead>
		  <tbody>
			  <?php
				while ($row=mysqli_fetch_array($resultado))
					{
						echo '<tr><td>'.$row["id"].'</td>';
						echo '<td>'.$row["trademark"].'</td>';
						echo '<td>'.$row["model"].'</td>';
						echo '<td>'.$row["storage"].'</td>';
						echo '<td>'.$row["processor"].'</td>';
						echo '<td>'.$row["price"].'</td></tr>';
					}
				mysqli_free_result($result)
			  ?>
		  </tbody>
		</table>

	</div>
	
</body>
</html>

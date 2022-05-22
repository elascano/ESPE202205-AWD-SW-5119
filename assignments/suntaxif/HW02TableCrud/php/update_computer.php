<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update computers</title>
<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
<?php

 $conn = new mysqli("localhost", "admin", "admin", "advanced_web");

	if ($conn ->connect_error) {
			die("Connection failed: " . $conn ->connect_error);
	}
 
$sSQL="SELECT trademark,model FROM computers Order By trademark";

$result=mysqli_query($conn,$sSQL);

?>
	<div class="form">
		<form method="post" action="send_update.php">

			<h1>Update Computer</h1>
			<fieldset>
				<label for="computers"><b>Computer:</b></label>
				<?php
				echo '<select name="computer">';

				while ($row=mysqli_fetch_array($result))
				{echo  '<option>'.$row["trademark"];}
				?>
				</select>
			
			<p><label for="model"><b>Model:</b></label>
         	<input type="text" id="idmodel" name="model" required></p>
			
			
			<p><label for="storage"><b>Storage:</b></label>
          	<input type="text" id="idstorage" name="storage">
          	GB</p>
			
		 	<p><label for="processor"><b>Processor:</b></label>
         	<input type="text" id="idprocessor" name="processor"></p>
			
			
			<p><label for="price"><b>Price:</b></label>
          	<input type="text" id="idprice" name="price"></p>


			</fieldset>

			<button type="submit">Update</button>
		</form>
	</div>
	
</body>
</html>

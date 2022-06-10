<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Send update</title>
<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
	
	
<?php

$conn = new mysqli("localhost", "admin", "admin", "advanced_web");
	
	if ($conn ->connect_error) {
			die("Connection failed: " . $conn ->connect_error);
	}

	
$computer=$_POST['computer'];		
$model=$_POST['model'];
$storage=$_POST['storage'];
$processor=$_POST['processor'];
$price=$_POST['price'];

$sSQL="DELETE from computers  WHERE trademark='$computer' and model='$model'";

mysqli_query($conn,$sSQL);

?>
	
	 <form  method="post">
        <h1>Successfull</h1>
		<div align="center">
		 <img src="../img/check.png" width="380" height="150">
		 </div>
	 </form>
	
</body>
</html>

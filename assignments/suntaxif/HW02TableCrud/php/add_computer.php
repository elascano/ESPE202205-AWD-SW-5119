<?php

	$trademark=$_POST['trademark']; 
	$model=$_POST['model'];
	$storage=$_POST['storage'];
	$processor=$_POST['processor'];
	$price=$_POST['price'];
	

	$conn = new mysqli("localhost", "admin", "admin", "advanced_web");

	if ($conn ->connect_error) {
			die("Connection failed: " . $conn ->connect_error);
	}


  $query = "INSERT INTO computers(trademark, model, storage, processor,price) VALUES ('$trademark','$model','$storage','$processor','$price')";
  $resultado = mysqli_query($conn,$query);
  
  if($resultado){

    header("Location: ../html/successfull.html");
	   }
   else
	   {
        header("Location: ../html/error.html");
   }
?>
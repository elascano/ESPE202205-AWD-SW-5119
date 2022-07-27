<?php
	require_once("connectDB.php");
	$Name = $_POST["name"];
	$Id = $_POST["id"];
	$lastName = $_POST["lastName"];
	$age = $_POST["age"];
	$gener = $_POST["gener"];
	$course = $_POST["course"];
	
	$newMedicine = array("name"=>$Name,"idStudent"=>$Id,"lastName"=>$lastName,"age"=>$age,"course"=>$course,"genre"=>$gener);
	$students->insertOne($newMedicine);

	header("Refresh: 0;url=index.php?mensaje=2")
?>
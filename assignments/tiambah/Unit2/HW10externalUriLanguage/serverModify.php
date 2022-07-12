<?php
    include 'ConectionMongoDb.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST')
	{   
        $nameModified = $_POST["nameStudentModified"];
        $lastnameModified= $_POST["lastnameStudentModified"];
        $idModified = $_POST["idStudentModified"];
        $phoneModified = $_POST["phoneStudentModified"];
		$conditionToModify=array("Id"=>$idModified);
        $studentModified= array("Name"=>$nameModified, "LastName"=>$lastnameModified, "Id"=>$idModified,"Phone"=>$phoneModified);
        $students->updateOne($conditionToModify,['$set' => $studentModified]);
		header("Refresh: 0;url=index.php?mensaje=3");
		exit;
	}
?>
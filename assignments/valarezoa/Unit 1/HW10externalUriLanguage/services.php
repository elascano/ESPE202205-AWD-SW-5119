<?php
	include 'ConectionMongoDb.php';
	//Rest Method GET
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($_GET['idStudent']))
		{
	        $id = $_GET["idStudent"];
            $condicionU = array("Id"=>$id);
            if ($students->count($condicionU) == 1 ){
                $arrayStudents = $students->find($condicionU);
                foreach ($arrayStudents as $objStudent)
                {
                   $queryStringId= $objStudent["Name"]." ".$id." ".$objStudent["LastName"]." ".$objStudent["Phone"];
                }
                
            }
			header("Refresh: 0;url=findStudent.php?condition=".$queryStringId);
			exit;				
			
			} else {
            $arrayStudentsComplete = $students->find();
            $queryStringComplete = "";
            foreach ($arrayStudentsComplete as $objStudentComplete)
                {
                   $queryStringComplete=$queryStringComplete." ". $objStudentComplete["Name"]." ".$objStudentComplete["Id"]." ".$objStudentComplete["LastName"]." ".$objStudentComplete["Phone"];
                }
			
			header("HTTP/1.1 200 OK");
			echo $queryStringComplete;
			exit;		
		}
	}
	
	//Post Method
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
        $name = $_POST["nameStudent"];
        $lastname= $_POST["lastnameStudent"];
        $id = $_POST["idStudent"];
        $phone = $_POST["phoneStudent"];
		$objectStudent = array("Name"=>$name,"LastName"=>$lastname,"Id"=>$id,"Phone"=>$phone);
        $students->insertOne($objectStudent);
		header("Refresh: 0;url=index.php?mensaje=2");
		exit;
	}
	
	//Put Method
	if($_SERVER['REQUEST_METHOD'] == 'PUT')
	{   
        $nameModified = $_GET["nameStudentModified"];
        $lastnameModified= $_GET["lastnameStudentModified"];
        $idModified = $_GET["idStudentModified"];
        $phoneModified = $_GET["phoneStudentModified"];
		$conditionToModify=array("Id"=>$idModified);
        $studentModified= array("Name"=>$nameModified, "LastName"=>$lastnameModified, "Id"=>$idModified,"Phone"=>$phoneModified);
        $students->updateOne($conditionToModify,['$set' => $studentModified]);
		header("HTTP/1.1 200 Ok");
		exit;
	}
	
	//DELETE Method
	if($_SERVER['REQUEST_METHOD'] == 'DELETE')
	{
        $idDelete = $_GET["idDelete"];

	    $condicion = array("Id" => $idDelete);
	
	    if ($students->count($condicion) == 1){
	    	$students->deleteOne($condicion);

    	}
		header("Refresh: 0;url=index.php?mensaje=1");
		exit;
	}
	
	header("HTTP/1.1 400 Bad Request");
?>
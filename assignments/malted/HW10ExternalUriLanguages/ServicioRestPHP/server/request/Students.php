<?php

    //echo "Method HTTP: ".$_SERVER['REQUEST_METHOD'];
    //echo 'Information: ' .file_get_contents('php://input');

    //user requests
    header("Content-Type: application/json"); //The client is informed to be sent a JSON
    include_once("../class/Student.php");
    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'),true);
            $student = new Student($_POST["id"],$_POST["name"],$_POST["lastname"],$_POST["genre"],$_POST["age"]);
            $student -> saveStudent();
            $result ["message"] = "Save Student" ." " .json_encode($_POST);
            echo json_encode($result);
        break;

        case 'GET':
            if(isset($_GET['id'])){
                Student::getStudentId($_GET['id']);
            }
            else {
                Student::getStudent(); //way of calling the function when this is static without creating an instance
            }
        break;

        case 'PUT':
            $_PUT = json_decode(file_get_contents('php://input'),true);
            $student = new Student($_PUT["id"],$_PUT["name"],$_PUT["lastname"],$_PUT["genre"],$_PUT["age"]);
            $student -> updateStudent($_GET['id']);
            $result ["message"] = "Update student with id: " .$_GET['id'].", Information to update: " .json_encode($_PUT);
            echo json_encode($result);
        break;

        case 'DELETE':
            Student ::deleteStudent($_GET['id']);
            $result ["message"] = "Delete students with id: " .$_GET['id'];
            echo json_encode($result);
        break;
    }

?>
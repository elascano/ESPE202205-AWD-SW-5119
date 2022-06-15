<?php
    require_once ("DBController.php");
    require_once ("Car.php");

    $db_handle = new DBController();

    if (!empty($_GET["action"])) {
        $action = $_GET["action"];
    }else{$action = "";
    }
    switch ($action) {
        case "car-add":
            if (isset($_POST['add'])) {
                $plate_id = $_POST['plate_id'];
                $brand = $_POST['brand'];
                $model = $_POST['model'];
                $colour = $_POST['colour'];
                $year = $_POST['year'];
                
                $car = new Car();
                $insertId = $car->addCar($plate_id, $brand, $model, $colour, $year);
                if (empty($insertId)) {
                    $response = array(
                        "message" => "Problem adding a new car record",
                        "type" => "error"
                    );
                } else {
                    header("Location: table.php");
                }
            }
            require_once "car-add.php";
            break;
        
        case "car-edit":
            $car_id = $_GET["id"];
            $car = new Car();
            
            if (isset($_POST['add'])) {
                $plate_id = $_POST['plate_id'];
                $brand = $_POST['brand'];
                $model = $_POST['model'];
                $colour = $_POST['colour'];
                $year = $_POST['year'];
                
                $car->editCar($plate_id, $brand, $model, $colour, $year, $car_id);
                
                header("Location: table.php");
            }
            
            $result = $car->getCarById($car_id);
            require_once "car-edit.php";
            break;
        
        case "car-delete":
            $car_id = $_GET["id"];
            $car = new Car();
            
            $car->deleteCar($car_id);
            
            $result = $car->getAllCars();
            require_once "carTable.php";
            break;
        
        default:
            $car = new Car();
            $result = $car->getAllCars();
            require_once "carTable.php";
            break;
    }
?>
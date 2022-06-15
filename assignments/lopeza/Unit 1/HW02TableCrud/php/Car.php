<?php 
require_once ("DBController.php");
class Car
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addCar($plate_id, $brand, $model, $colour, $year) {
        $query = "INSERT INTO car (car_plate_id ,car_brand ,car_model ,car_colour, car_year) VALUES (?, ?, ?, ?, ?)";
        $paramType = "ssssi";
        $paramValue = array(
            $plate_id,
            $brand,
            $model,
            $colour,
            $year
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editCar($plate_id, $brand, $model, $colour, $year, $car_id) {
        $query = "UPDATE car SET car_plate_id  = ?,car_brand  = ?,car_model  = ?,car_colour = ?, car_year = ? WHERE car_id_number = ?";
        $paramType = "ssssii";
        $paramValue = array(
            $plate_id,
            $brand,
            $model,
            $colour,
            $year,
            $car_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteCar($car_id) {
        $query = "DELETE FROM car WHERE car_id_number = ?";
        $paramType = "i";
        $paramValue = array(
            $car_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getCarById($car_id) {
        $query = "SELECT * FROM car WHERE car_id_number = ?";
        $paramType = "i";
        $paramValue = array(
            $car_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    function getAllCars() {
        $sql = "SELECT * FROM car ORDER BY car_id_number";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>
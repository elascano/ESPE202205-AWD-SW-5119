<?php
    require_once "DB.php";

    class Area{
        private $db;

        function __construct(){
            $this->db = new DB();
        }

        function addArea($nombre){
            $query = "INSERT INTO area(are_nombre) VALUES (?)";
            $paramType = "s";
            $paramValue = array(
                $nombre
            );
            $insertId = $this->db->insert($query, $paramType, $paramValue);
            return $insertId;
        }

        function editArea($nombre, $codigo){
            $query = "UPDATE area SET are_nombre = ? WHERE are_codigo = ?";
            $paramType = "si";
            $paramValue = array($nombre, $codigo);
            $this->db->update($query, $paramType, $paramValue);
        }

        function getAreaById($codigo){
            $query = "SELECT * FROM area WHERE are_codigo = ?";
			$paramType = "i";
			$paramValue = array(
				$codigo
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
        }

        function getAreas(){
            $sql = "SELECT * FROM area  ORDER BY are_codigo";
			$result = $this->db->runBaseQuery($sql);
			return $result;
        }
    }
?>
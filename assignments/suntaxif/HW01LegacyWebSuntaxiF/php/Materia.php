<?php
    require_once "DB.php";

    class Materia{
        private $db;

        function __construct(){
            $this->db = new DB();
        }

        function addMateria($area, $nombre, $nivel){
            $query = "INSERT INTO materia(ARE_CODIGO, MAT_NOMBRE, MAT_NIVEL) VALUES (?, ?, ?)";
            $paramType = "iss";
            $paramValue = array(
                $area, 
                $nombre,
                $nivel
            );
            $insertId = $this->db->insert($query, $paramType, $paramValue);
            return $insertId;
        }
        
        function editMateria($nombre, $nivel, $codigo){
            $query = "UPDATE materia SET MAT_NOMBRE = ?, MAT_NIVEL = ? WHERE MAT_CODIGO = ?";
            $paramType = "ssi";
            $paramValue = array($nombre, $nivel, $codigo);
            $this->db->update($query, $paramType, $paramValue);
        }

        function getMaterias(){
            $sql = "SELECT * FROM materia ORDER BY MAT_CODIGO";
			$result = $this->db->runBaseQuery($sql);
			return $result;
        }

        function getMateriaById($codigo){
            $query = "SELECT * FROM materia WHERE MAT_CODIGO = ?";
			$paramType = "i";
			$paramValue = array(
				$codigo
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
        }
		
		function getMateriasBachillerato() {
			$sql = "SELECT * FROM `materia` WHERE `MAT_NIVEL` = 'B' ORDER BY `MAT_CODIGO`";
			$result = $this->db->runBaseQuery($sql);
			return $result;
    	}
		
		function getMateriasEduacionBasica(){
			$sql = "SELECT * FROM `materia` WHERE `MAT_NIVEL` = 'EB' ORDER BY `MAT_CODIGO`";
			$result = $this->db->runBaseQuery($sql);
			return $result;
			
		}
		
		function getMateriaPorCodigo($codigoMateria){
			$sql = "SELECT MAT_NOMBRE FROM materia WHERE MAT_CODIGO = $codigoMateria";
			$result = $this->db->runBaseQuery($sql);
			return $result;
		}
		
		function comprobeMateria($nombre, $nivel){
            $result = $this->getMaterias();
            if(!empty($result)){
                foreach($result as $k => $v){
                    if($result[$k]['MAT_NOMBRE'] == $nombre && $result[$k]['MAT_NIVEL'] == $nivel){
                        return true;
                    }
                }
            }
            return false;
        }

    }
?>
<?php
    require_once "DB.php";
    
    class Curso{
        private $db;

        function __construct(){
            $this->db = new DB();
        }

        function addCurso($nombre, $paralelo){
            $query = "INSERT INTO curso(cur_curso, cur_paralelo) VALUES (?, ?)";
            $paramType = "ss";
            $paramValue = array(
                $nombre, 
                $paralelo
            );
            $insertId = $this->db->insert($query, $paramType, $paramValue);
            return $insertId;
        }

        function editCurso($paralelo, $codigo){
            $query = "UPDATE curso SET cur_paralelo = ? WHERE cur_codigo = ?";
            $paramType = "si";
            $paramValue = array($paralelo, $codigo);
            $this->db->update($query, $paramType, $paramValue);
        }

        /*function getCursos(){
            $sql = "SELECT * FROM curso ORDER BY cur_codigo";
			$result = $this->db->runBaseQuery($sql);
			return $result;
        }*/

        function getCursoById($codigo){
            $query = "SELECT * FROM curso WHERE cur_codigo = ?";
			$paramType = "i";
			$paramValue = array(
				$codigo
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
        }

        function deleteCurso($codigo){
            $query = "UPDATE curso SET cur_disponible= 0 WHERE cur_codigo= ?";
			$paramType = "i";
			$paramValue = array(
				$codigo
			);
			$this->db->update($query, $paramType, $paramValue);
        }
        function verificarCurso($nombre, $paralelo){
            $result = $this->getCursos();
            if(!empty($result)){
                foreach($result as $k => $v){
                    if($result[$k]['CUR_CURSO'] == $nombre && $result[$k]['CUR_PARALELO'] == $paralelo){
                        return true;
                    }
                }
            }
            return false;
        }
		
		function getCursos() {
			$sql = "SELECT * FROM `curso` ORDER BY `CUR_CODIGO`";
			$result = $this->db->runBaseQuery($sql);
			return $result;
    	}
		
		function getCursoPorCodigo($codigo){
			$query = "SELECT `CUR_CURSO`, `CUR_PARALELO`, `CUR_CODIGO`  FROM `curso` WHERE `CUR_CODIGO` = ?";
			$paramType = "i";
			$paramValue = array(
				$codigo
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
		}
		
		function getCursosConHorario(){
			$query = "SELECT * FROM `curso` WHERE `CUR_DISPONIBLE` = ? ORDER BY `CUR_CODIGO`";
			$paramType = "i";
			$disponible = 0;
			
			$paramValue = array(
				$disponible
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
			
		}
		
		function getCursosSinHorario(){
			$query = "SELECT * FROM `curso` WHERE `CUR_DISPONIBLE` = ? ORDER BY `CUR_CODIGO`";
			$paramType = "i";
			$disponible = 1;
			
			$paramValue = array(
				$disponible
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
		}
		
		function cambiarDisponibilidad($codigoCurso){
			
			$query = "UPDATE `curso` SET `CUR_DISPONIBLE`= ? WHERE `CUR_CODIGO`= ?";
			$paramType = "ii";
			
			$disponible = 0;
			
			$paramValue = array(
				$disponible,
				$codigoCurso
				
			);

			$this->db->update($query, $paramType, $paramValue);
			
		}
		
		function cambiarDisponibilidadCursoDisponible($codigoCurso){
			
			$query = "UPDATE `curso` SET `CUR_DISPONIBLE`= ? WHERE `CUR_CODIGO`= ?";
			$paramType = "ii";
			
			$disponible = 1;
			
			$paramValue = array(
				$disponible,
				$codigoCurso
				
			);

			$this->db->update($query, $paramType, $paramValue);
			
		}
    }
?>
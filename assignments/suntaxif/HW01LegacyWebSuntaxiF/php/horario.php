<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	
	<?php 
	
	require_once("DB.php");
	
	class Horario {
		
		private $db_handle;
		public $codigoDocente;
		public $codigoCurso;
		public $hora;
		public $dia;
    
		function __construct() {
			$this->db_handle = new DB();
		}
		
		function addHorario($codigoDocente, $codigoCurso, $hora, $dia){
			$query = "INSERT INTO `horario` (`DOC_CODIGO`, `CUR_CODIGO`, `HOR_HORA`, `HOR_DIA`) VALUES (?, ?, ?, ?)";
			$paramType = "iiss";
			$paramValue = array(
				$codigoDocente,
				$codigoCurso,
				$hora,
				$dia
			);

			$insertId = $this->db_handle->insert($query, $paramType, $paramValue);
		}
		
		function updateHorario($codigoDocente, $codigoCurso, $hora, $dia){
			$query = "UPDATE horario SET DOC_CODIGO = ? WHERE HOR_ESTADO = 1 AND CUR_CODIGO = ? AND HOR_HORA = ? AND HOR_DIA = ?";
			$paramType = "iiss";
			$paramValue = array(
				$codigoDocente,
				$codigoCurso,
				$hora,
				$dia
			);

			$this->db_handle->update($query, $paramType, $paramValue);
		}
		
		function getHorarios() {
			$sql = "SELECT * FROM `horario` ORDER BY `HOR_CODIGO`";
			$result = $this->db_handle->runBaseQuery($sql);
			return $result;
    	}
		
		function getHorarioPorCurso($codigoCurso){
			$query = "SELECT m.MAT_NOMBRE, d.PER_NOMBRES, m.MAT_CODIGO, d.DOC_CODIGO FROM materia m, horario h, docente d WHERE m.MAT_CODIGO = d.MAT_CODIGO AND h.DOC_CODIGO = d.DOC_CODIGO AND h.CUR_CODIGO = ? AND h.HOR_ESTADO = 1 ORDER BY h.HOR_CODIGO";
			$paramType = "i";
			$paramValue = array(
				$codigoCurso
			);

			$result = $this->db_handle->runQuery($query, $paramType, $paramValue);
			return $result;
		}
		
		function eliminarHorario($codigoCurso){
			$query = "UPDATE horario SET HOR_ESTADO = 0 WHERE CUR_CODIGO = ?";
			$paramType = "i";
			$paramValue = array(
				$codigoCurso
			);

			$this->db_handle->update($query, $paramType, $paramValue);
			
		}
		
	}
	
	?>
	
	
</body>
</html>
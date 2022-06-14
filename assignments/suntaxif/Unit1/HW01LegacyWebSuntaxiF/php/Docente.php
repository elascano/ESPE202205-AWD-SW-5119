<?php
    require_once "DB.php";
    require_once "Persona.php";

    class Docente{
        private $db;

        function __construct(){
            $this->db = new DB();
        }

        function addDocente($cedula, $nombre, $apellido, $usuario, $clave, $rol, $telefono, $correo, $fecha, $matCodigo, $especialidad, $docNivel, $docNum){
            $query = "INSERT INTO docente(PER_CEDULA, PER_NOMBRES, PER_APELLIDOS, PER_USUARIO, PER_CLAVE, PER_ROL, PER_TELEFONO, PER_CORREO, PER_FECHA_NACIMIENTO,  MAT_CODIGO, DOC_ESPECIALIDAD, DOC_NIVEL, DOC_NUMERO_HORAS) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $paramType = "sssssisssissi";
            $paramValue = array($cedula, $nombre, $apellido, $usuario, $clave, $rol, $telefono, $correo, $fecha, $matCodigo, $especialidad, $docNivel, $docNum);
            $insertId = $this->db->insert($query, $paramType, $paramValue);
            return $insertId;
        }

        function editDocente($nombre,$apellido,$usuario, $clave, $telefono, $correo, $codigo){
            $persona = new Persona();
            $persona->editPersonaN($nombre,$apellido,$usuario, $clave, $telefono, $correo, $codigo);
            $query = "UPDATE docente SET PER_NOMBRES = ?,PER_APELLIDOS = ?, PER_USUARIO = ?, PER_CLAVE = ?, PER_TELEFONO = ?, PER_CORREO = ?  WHERE PER_CEDULA = ?";
            $paramType = "sssssss";
            $paramValue = array($nombre,$apellido,$usuario, $clave, $telefono, $correo, $codigo);
            $this->db->update($query, $paramType, $paramValue);
        }

        function getDocentes(){
            $sql = "SELECT * FROM docente ORDER BY DOC_CODIGO";
            $result = $this->db->runBaseQuery($sql);
            return $result;
        }
        
        function getDocenteById($codigo){
            $query = "SELECT * FROM docente WHERE PER_CEDULA = ?";
			$paramType = "i";
			$paramValue = array(
				$codigo
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
        }
		
		function getDocentePorCodigoMateria($codigoMateria){
			$query = "SELECT `DOC_CODIGO` FROM `docente` WHERE `MAT_CODIGO` = ?"; //tal vez con DISTINCT
			$paramType = "i";
			$paramValue = array(
				$codigoMateria
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
		}
		
		function getMateriaPorCodigoDocente($codigoDocente){
			$query = "SELECT `MAT_CODIGO` FROM `docente` WHERE `DOC_CODIGO` = ?";
			$paramType = "i";
			$paramValue = array(
				$codigoDocente
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
		}
		
		function verificarHoraDocente($codigoDocente, $dia, $hora){
			$query = "SELECT COUNT(*) FROM horario WHERE DOC_CODIGO = ? AND HOR_DIA = ? AND HOR_HORA = ? AND HOR_ESTADO = 1";
			$paramType = "iss";
			$paramValue = array(
				$codigoDocente,
				$dia,
				$hora
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
			
		}
		
		function verificarHoraDocenteUpdate($codigoDocente, $dia, $hora, $codigoCurso){
			$query = "SELECT COUNT(*) FROM horario WHERE DOC_CODIGO = ? AND HOR_DIA = ? AND HOR_HORA = ? AND CUR_CODIGO != ? AND HOR_ESTADO = 1";
			$paramType = "issi";
			$paramValue = array(
				$codigoDocente,
				$dia,
				$hora,
				$codigoCurso
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
			
		}
		
		function horasDisponibles($codigoDocente){
			$query = "SELECT DOC_NUMERO_HORAS FROM docente WHERE DOC_CODIGO = ?";
			$paramType = "i";
			$paramValue = array(
				$codigoDocente
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
		}
		
		function actualizarHorasDocente($codigoDocente, $horasReducir){
			$query = "UPDATE docente SET DOC_NUMERO_HORAS = (DOC_NUMERO_HORAS - ?) WHERE DOC_CODIGO = ?";
			$paramType = "ii";
			
			$paramValue = array(
				$horasReducir,
				$codigoDocente
			);

			$this->db->update($query, $paramType, $paramValue);
		}
		
		function aumentarHorasDocente($codigoDocente, $horasAumentar){
			$query = "UPDATE docente SET DOC_NUMERO_HORAS = (DOC_NUMERO_HORAS + ?) WHERE DOC_CODIGO = ?";
			$paramType = "ii";
			
			$paramValue = array(
				$horasAumentar,
				$codigoDocente
			);

			$this->db->update($query, $paramType, $paramValue);
		}

    }
?>
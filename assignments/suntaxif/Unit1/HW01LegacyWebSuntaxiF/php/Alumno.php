<?php
    require_once "DB.php";

    class Alumno{
        private $db;

        function __construct(){
            $this->db = new DB();
        }

        function addAlumno($cedula, $nombre, $apellido, $usuario, $clave, $rol, $telefono, $correo, $fecha, $curCodigo, $estado){
            $query = "INSERT INTO estudiante(per_cedula, per_nombres, per_apellidos, per_usuario, per_clave, per_rol, per_telefono, per_correo, per_fecha_nacimiento, cur_codigo, est_activo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $paramType = "sssssisssii";
            $paramValue = array($cedula, $nombre, $apellido, $usuario, $clave, $rol, $telefono, $correo, $fecha, $curCodigo, $estado);
            $insertId = $this->db->insert($query, $paramType, $paramValue);
            return $insertId;
        }

        function editAlumno($usuario, $clave, $telefono, $correo, $codigo){
            $query = "UPDATE estudiante SET per_usuario = ?, per_clave = ?, per_telefono = ?, per_correo = ? WHERE PER_CEDULA = ?";
            $paramType = "ssssi";
            $paramValue = array($usuario, $clave, $telefono, $correo, $codigo);
            $this->db->update($query, $paramType, $paramValue);
        }

        function getAlumnos(){
            $sql = "SELECT * FROM estudiante WHERE EST_ACTIVO = 1 ORDER BY EST_CODIGO";
            $result = $this->db->runBaseQuery($sql);
            return $result;
        }

        function getAlumnoById($codigo){
            $query = "SELECT * FROM estudiante WHERE PER_CEDULA = ? and EST_ACTIVO = 1";
			$paramType = "i";
			$paramValue = array(
				$codigo
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
        }

        function getAlumnoByCedula($cedula){
            $query = "SELECT CUR_CODIGO FROM estudiante WHERE PER_CEDULA = ? and EST_ACTIVO = 1";
			$paramType = "s";
			$paramValue = array(
				$cedula
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
        }   

        function deleteAlumno($codigo){
            $query = "UPDATE estudiante SET EST_ACTIVO = 0 WHERE PER_CEDULA = ?";
            $paramType = "i";
            $paramValue = array($codigo);
            $this->db->update($query, $paramType, $paramValue);
            
        }

        function getAlumnosByCurso($curso){
            $query = "SELECT * FROM estudiante WHERE CUR_CODIGO = ? and EST_ACTIVO = 1";
			$paramType = "i";
			$paramValue = array(
				$curso
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
        }
    }
?>
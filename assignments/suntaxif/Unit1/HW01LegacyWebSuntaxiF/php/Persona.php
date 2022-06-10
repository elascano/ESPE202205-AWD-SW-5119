<?php
    require_once "DB.php";

    class Persona{
        private $db;

        function __construct(){
            $this->db = new DB();
        }

        function addPersona($cedula, $nombre, $apellido, $usuario, $clave, $rol, $telefono, $correo, $fecha){
            $query = "INSERT INTO persona(per_cedula, per_nombres, per_apellidos, per_usuario, per_clave, per_rol, per_telefono, per_correo, per_fecha_nacimiento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $paramType = "sssssisss";
            $paramValue = array($cedula, $nombre, $apellido, $usuario, $clave, $rol, $telefono, $correo, $fecha);
            $insertId = $this->db->insert($query, $paramType, $paramValue);
            return $insertId;
        }
        
        function editPersona($usuario, $clave, $telefono, $correo, $codigo){
            $query = "UPDATE persona SET per_usuario = ?, per_clave = ?, per_telefono = ?, per_correo = ? WHERE per_Cedula = ?";
            $paramType = "ssssi";
            $paramValue = array($usuario, $clave, $telefono, $correo, $codigo);
            $this->db->update($query, $paramType, $paramValue);
        }

        function editPersonaN($nombre,$apellido,$usuario, $clave, $telefono, $correo, $codigo){
            $query = "UPDATE persona SET per_nombres = ?, per_apellidos = ?, per_usuario = ?, per_clave = ?, per_telefono = ?, per_correo = ? WHERE per_Cedula = ?";
            $paramType = "sssssss";
            $paramValue = array($nombre,$apellido,$usuario, $clave, $telefono, $correo, $codigo);
            $this->db->update($query, $paramType, $paramValue);
        }
		
		function getPersonaPorUsuario($usuario){
			$query = "SELECT PER_CEDULA FROM persona WHERE PER_USUARIO = ?";
			$paramType = "s";
			$paramValue = array(
				$usuario
			);

			$result = $this->db->runQuery($query, $paramType, $paramValue);
			return $result;
		}
		
    }
?>
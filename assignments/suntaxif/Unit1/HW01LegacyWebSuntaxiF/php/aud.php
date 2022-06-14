<?php
    date_default_timezone_set('America/Guayaquil');
    require_once "DB.php";

    class Auditoria{
        private $db;

        function __construct(){
            $this->db = new DB();
        }

        function addAuditoria($cedula,$usuarioIp,$macAddress, $fecha, $hora,$registroAct){
            $query = "INSERT INTO `auditoria`(`PER_CEDULA`,  `AUD_IP`, `AUD_MAC`,`AUD_FECHA`, `AUD_HORA`,`AUD_PROCESO`) VALUES (?, ?, ?, ?, ?, ?)";
            $paramType = "ssssss";
            $paramValue = array($cedula, $usuarioIp,$macAddress,$fecha, $hora,$registroAct);
            $insertId = $this->db->insert($query, $paramType, $paramValue);
            
        }
   
		
		
    }
?>
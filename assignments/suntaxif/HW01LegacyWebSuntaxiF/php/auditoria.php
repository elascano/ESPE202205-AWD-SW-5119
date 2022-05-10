<?php
session_start();
date_default_timezone_set('America/Guayaquil');

require_once("Persona.php");
require_once("aud.php");

$_SESSION["usuario"] = array();  
	
	    if (isset($_POST['login'])) {
			$usuario = $_POST["PER_USUARIO"];
    		$usuarioIp = getRealIP();
			$macAddress = macAddress();
			$fechaIngreso = date('Y-m-d');
			$horaIngreso = date('H:i:s');
			$registroAct = "Inicio Sesión";
			$persona = new Persona();
			$auditoria = new Auditoria();
			
			$_SESSION['usuario'][0]=$usuario;
			$_SESSION['usuario'][1]=$usuarioIp;
			$_SESSION['usuario'][2]=$macAddress;
			$_SESSION['usuario'][3]=$fechaIngreso;
			$_SESSION['usuario'][4]=$$horaIngreso;
			$_SESSION['usuario'][5]=$registroAct;
			
            $cedula = $persona->getPersonaPorUsuario($usuario);
			
			$_SESSION['usuario'][6]=$cedula[0]["PER_CEDULA"];
			$auditoria->addAuditoria($cedula[0]["PER_CEDULA"],$usuarioIp ,$macAddress ,$fechaIngreso, $horaIngreso,$registroAct);
        }
		

		function getRealIP() {
			if (!empty($_SERVER['HTTP_CLIENT_IP']))
				return $_SERVER['HTTP_CLIENT_IP'];

			if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
				return $_SERVER['HTTP_X_FORWARDED_FOR'];

				//return $_S
			return $_SERVER['REMOTE_ADDR'];
		}
		
		function macAddress(){
			$ipAddress=getRealIP();
			$macAddr=false; #run the external command, break output into lines 
			$arp=`arp -a $ipAddress`;
			$lines=explode("\n", $arp); #look for the output line describing our IP address 
			foreach($lines as $line) 
			{ 
				$cols=preg_split('/\s+/', trim($line)); 
				if ($cols[0]==$ipAddress)
				{ 
					$macAddr=$cols[1]; 
				} 
			}	
			return $macAddr;
		}


	
	

?>
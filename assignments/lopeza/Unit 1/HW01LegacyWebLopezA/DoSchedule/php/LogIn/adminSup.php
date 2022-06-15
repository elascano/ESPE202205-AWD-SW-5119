<?php


session_start();
   
  // Obtengo los datos cargados en el formulario de login.
  $user = $_POST['username'];
  $GLOBALS['user'];
  $clave = $_POST['password'];
   
  // Datos para conectar a la base de datos.
  $nombreServidor = "localhost";
  $nombreUsuario = "admin";
  $passwordBaseDeDatos = "admin";
  $nombreBaseDeDatos = "horarios";

  
  
  // Crear conexión con la base de datos.
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
   
  // Validar la conexión de base de datos.
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
 
   // Consulta a la base de datos.
  $query = "SELECT * FROM pr_admin_supervisor WHERE usu_user='$user' AND usu_tipo='adm'";
  $resultado = mysqli_query($conn,$query);
  //Verifica que la consulta se realizo con o sin coincidencias en la base 
  if ($resultado) {
      // Verificando si el usuario existe en la base de datos, cuenta los registros que cumplen con las condiciones (usuario y password).
      $row = mysqli_fetch_array($resultado);
      if ($row>0) {
          if(password_verify($clave, $row[2])==1){
            // Guardo en la sesión el user del usuario.
          $_SESSION['user'] = $user;
          // Redirecciono al usuario a la página principal del sitio.
          registerAudit($user);
          header("Location: ../../html/LogIn/adminP.php");
          }else{
              header("Location: ../../html/error1.html");
          }
      } else {
          
        $query2 = "SELECT * FROM pr_admin_supervisor WHERE usu_user='$user' AND usu_tipo='sup'";
        $resultado2 = mysqli_query($conn,$query2);

        $row2 = mysqli_fetch_array($resultado2);
    if($row2>0){
        if(password_verify($clave, $row2[2])==1){
            // Guardo en la sesión el user del usuario.
        $_SESSION['user'] = $user;
        // Redirecciono al usuario a la página principal del sitio.
        registerAudit($user);
          header("Location: ../../html/LogIn/supervisor.php");
          }else{
              header("Location: ../../html/error1.html");
          }
    }else{
        header("Location: ../../html/error.html");}
    }
      
         
      }

      function registerAudit($username){
          try {
              $connect = new PDO('mysql:host=localhost;dbname=horarios;charset=utf8;','admin','admin');
			$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              $ip = getIPAddress();
			$SQL = "INSERT INTO audit (username, action, actiontable, userip) VALUES (?,?,?,?)";
			$result = $connect->prepare($SQL);
			$result->execute(array(
									$username,
									"login",
									"none",
									$ip
									)
							);			
		} catch (Exception $e) {
			die('Error Register Audit Admin '.$e->getMessage());
		} finally{
			$result = null;
		}
      }

      function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     if($ip=="::1"){
         $ip = $_SERVER['SERVER_ADDR'];
     }
     $ip = $_SERVER['SERVER_ADDR'];
     return $ip;  
}  
  
?>
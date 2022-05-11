<?php
    session_start();
$id= $_SESSION['id'];
    if(!isset($_SESSION['rol'])){
        header('location: ../login.php');
    }else{
        if($_SESSION['rol'] != 'Docente'){
            header('location: ../login.php');
        }
    }


?>
<?php include("conexion.php") 
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Docente</title>
    
<link href="../../css/estiloperfil.css" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,200&display=swap" rel="stylesheet">
	<link href="../../css/ace-responsive-menu.css" rel="stylesheet" type="text/css" />
</head>
<body id="portada">
	<header>
		<div class="contenedor"><h2 class="logotipo"><i class="fas fa-chalkboard-teacher" style="margin-right: 10px;"></i>Docente</h2>
			<a href="../cerrar_sesion.php">
			<button><i class="fas fa-power-off"></i> Cerrar Sesion</button></a>
			
        
	  </div>
    </header>
	<div class="contenedormenu">
	<div class="vertical-menu">
				<nav>
       
        <!-- Responsive Menu Structure-->
        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
        <ul id="respMenu" class="ace-responsive-menu" data-menu-style="accordion" style="border-top: 2px solid #FF5737;border-right: 2px solid #FF5737;background: #F5F5F5;">
             <li>
                <a href="javascript:;">
					<i class='far fa-calendar'></i>
                   <span class="title">Horario</span>
			<span class="arrow"></span> 
                </a>
                <!-- Level Two-->
                <ul>
                    <li>
                        <a href="../horarios/php/horariodocente.php?id=<?php echo $id; ?>" target="frame">
                            <i class='far fa-calendar-plus'></i>
                           Ver Horario
                        </a>
                    </li>
                 
                    </ul>
                    </li>
			
		</ul>
		</nav>

	</div>
		<h2 class="ip" ><?php
            function getRealIP() {
                if (!empty($_SERVER['HTTP_CLIENT_IP']))
                    return $_SERVER['HTTP_CLIENT_IP'];
                   
                if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
                    return $_SERVER['HTTP_X_FORWARDED_FOR'];
               return $_SERVER['REMOTE_ADDR'];
            }		
            $myIP=getRealIP();
            echo " $myIP ";	
        ?></h2>
	</div>
	
	<div class="frameusuarios">
		<iframe  id="frame" name="frame">
			
		</iframe>
	</div>
	


<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>  
	 <script src="../../js/jquery-1.10.1.min.js" type="text/javascript"></script>
    <script src="../../js/ace-responsive-menu.js" type="text/javascript"></script>
	
	<!--Plugin Initialization-->
     <script type="text/javascript">
         $(document).ready(function () {
             $("#respMenu").aceResponsiveMenu({
                 resizeWidth: '768', // Set the same in Media query       
                 animationSpeed: 'fast', //slow, medium, fast
                 accoridonExpAll: false //Expands all the accordion menu on click
             });
         });
	</script>
</body>
</html>
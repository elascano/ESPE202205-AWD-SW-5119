<!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estilo.css">
<title>Docente</title>
</head>

<body>
<div class="contenedor">
    <div class="menuv">
    
        <div class="wrapper">
            <div class="sidebar">
            <h2>ADMINISTRADOR</h2>
                 <ul>
                 <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                 <li><a href="../../php/CRUD CREAR DOCENTE/crearDocente.php" target="iframe_c"><i class="fa fa-user"></i>Ingresar Docente</a></li>
                 <li><a href="../../php/CRUD OBJETOS AREAS/index.php" target="iframe_c"><i class="fa fa-user"></i>Area</a></li>
                 <li><a href="../../php/CRUD OBJETOS MATERIAS/index.php" target="iframe_c"><i class="fa fa-user"></i>Materia</a></li>
                 <li><strong><a href="#"><?php session_start(); echo $_SESSION['user'];?></a></strong>
                    <ul>
                        <li><a href="../../index.html">Salir</a></li>
                    </ul>
                </li>
                 </ul>
        
             </div>
		</div>		
    </div>	
    <div class="frame">
    <iframe src="../LogIn/home.html" name="iframe_c" height="680px" width="1080" title="Iframe Example"></iframe>
    </div>
    <div class="logo">
<br>
<br>
<br>
<br>
    <img src="../../imges/LogIn/logo.png"
    width="150px"
        height="120px"
    
    >
    </div>

 </div>	


    
    
   

</body>
</html>
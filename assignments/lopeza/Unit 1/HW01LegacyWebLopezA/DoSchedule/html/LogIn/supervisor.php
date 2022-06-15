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
            <h2>Supervisor</h2>
                 <ul>
                 <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                 <li><a href="../Horarios/listaprofesores.html" target="iframe_c"><i class="fa fa-user"></i>Horario Docentes</a></li>
                 <li><a href="../Horarios/listacursos.html" target="iframe_c"><i class="fa fa-user"></i>Horario Estudiantes</a></li>
                 <li><a href="../Horarios/listacursosadmin.html" target="iframe_c"><i class="fa fa-user"></i>Administrar Horario</a></li>
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
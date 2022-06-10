<!DOCTYPE html>
<iframe_a lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <title>Supervisor</title>
  </head>
  <body>
	  
	<?php
        session_start();
        if(!isset($_SESSION['rol'])){
            header("Location: ../../index.php");
        }else if($_SESSION['rol'] != 3){
          header("Location: ../../index.php?action=".$_SESSION['rol']);
        }
    ?>  
	
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <!-- Opciones Horario -->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle text-white"
                  href="#"
                  id="navbarDropdownMenuLink"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Horario
                </a>
                <ul
                  class="dropdown-menu"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                <li>
                    <a class="dropdown-item" href="../../php/acciones_BD.php?action=crear-horario" target="iframe_a">Agregar Horario</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../../php/acciones_BD.php?action=ver-horario" target="iframe_a"
                      >Ver Horario</a
                    >
                  </li>
                </ul>
              </li>
              <!-- EXIT -->
              <li class="nav-item ">
                <a
                  class="nav-link text-white "
                  href="../../php/salir.php"
                  role="button"
                  aria-expanded="false"
                >
                  Salir
                </a>
                
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <!-- Iframe -->
    <div class="container">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe
          name="iframe_a"
          id="iframe"
          width="100%"
          height="720cm"
          class="embed-responsive-item"
          src="principalSupervisor.html"
        ></iframe>
      </div>
    </div>
  </body>
</iframe_a>
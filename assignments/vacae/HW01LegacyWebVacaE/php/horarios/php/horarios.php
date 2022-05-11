<!DOCTYPE html>
<html lang="en">
<head>
  <title>Curso</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/style.css" type="text/css" rel="stylesheet" />
	<link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,200&display=swap" rel="stylesheet">
</head>
	
<body>
	<div class="principal">
	<div class="contenedor-izquierdo">
		<div style="text-align: right; margin: 20px 0px 10px;"><h1>Horario Cursos</h1>
  <a id="btnAddAction" href="newHorario.php" style="font-weight: 600;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="green" class="bi bi-plus-circle" viewBox="0 0 16 16" style="margin-right: 15px;">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>Agregar Horario</a>
</div>
<div id="toys-grid">
  <table cellpadding="10" cellspacing="1">
      <thead>
          <tr>
              <th><strong>Codigo</strong></th>
              <th><strong>Nivel</strong></th>
              <th><strong>Paralelo</strong></th>
              <th><strong>Accion</strong></th>

          </tr>
      </thead>
      <tbody>
              <?php
              session_start();
              $nombreServidor = "localhost";
              $nombreUsuario = "admin";
              $passwordBaseDeDatos = "admin";
              $nombreBaseDeDatos = "sistemaescolar";
              
              // Crear conexión con la base de datos.
              $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
               
              // Validar la conexión de base de datos.
              if ($conn ->connect_error) {
                die("Connection failed: " . $conn ->connect_error);
              }
              $consulta= "SELECT * FROM horarios";
	
                $result=mysqli_query($conn,$consulta);
              if (!empty($result)) {
                while ($row=mysqli_fetch_array($result)){
                  
                      ?>
    <tr>
              <td><?php echo $row["hor_codigo"]; ?></td>
              <td><?php echo $row["hor_nivel"]; ?></td>
              <td><?php echo $row["hor_paralelo"]; ?></td>
              <td>
				                        <a href="showHorario.php?id=<?php echo $row['hor_codigo']; ?>&nivel=<?php echo $row["hor_nivel"]; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#1503EC" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg></a>
				  <a onclick="return confirm('Confirma Eliminar Horario?');" href="deleteHorario.php?id=<?php echo $row['hor_codigo'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#E74C3C " class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                    </svg></a>
          
              </td>
          </tr>
              <?php
                  }
              }
              ?>
          
      
      
      <tbody>
  
  </table>
</div>
		</div>
		<div class="contenedor-derecho">
			<div style="text-align: right; margin: 80px 0px 10px;"><h1>Horario Docentes</h1>
</div>
<div id="toys-grid">
  <table cellpadding="10" cellspacing="1">
      <thead>
          <tr>
              <th><strong>Codigo</strong></th>
              <th><strong>Profesor</strong></th>
              <th><strong>Area</strong></th>
              <th><strong>Accion</strong></th>

          </tr>
      </thead>
      <tbody>
              <?php
              session_start();
              
              $rol = 'Docente';
              $consulta= "SELECT distinct id,nombre,apellido,area FROM usuario WHERE EXISTS (SELECT * FROM registrom where registrom.reg_codigoprof=usuario.id)";
	
                $result=mysqli_query($conn,$consulta);
              if (!empty($result)) {
                while ($row=mysqli_fetch_array($result)){
                  
                      ?>
    <tr>
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["nombre"]." ".$row["apellido"]; ?></td>
              <td><?php echo $row["area"]; ?></td>
              <td><a class="btnEditAction"
                  href="showHorariop.php?id=<?php echo $row["id"]; ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#1503EC" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg>
                  </a>
                  <!--<a onclick="return confirm('Confirma Eliminar Horario?');" class="btnDeleteAction" 
                  href="deleteHorariop.php?id=< echo $row["id"]; ?>">
                  <img src="../image/icon-delete.png" />
                  </a>-->
              </td>
          </tr>
              <?php
                  }
              }
              ?>
          
      
      
      <tbody>
  
  </table>
</div>
			</div>
		</div>
			
	
	

</body>
</html>
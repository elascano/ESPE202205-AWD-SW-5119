<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link href="../css/style.css" type="text/css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,200&display=swap" rel="stylesheet">
</head>

<body>
	
	<div class="principal">
	<div class="contenedor-izquierdo">
	<?php
$id = $_GET['id'];
$nivel = $_GET['nivel'];?>

    <br><br><div style="text-align: right; margin: 20px 0px 10px;"><h3>Materias Con Docente Asignado</h3><br>
  <a style="font-weight: 600;" id="btnAddAction" href="newMateria.php?id=<?php echo $id; ?>&nivel=<?php echo $nivel; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="green" class="bi bi-plus-circle" viewBox="0 0 16 16" style="margin-right: 15px;">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>Agregar Materia</a>
</div>
<div id="toys-grid">
  <table cellpadding="10" cellspacing="1">
      <thead>
          <tr>
              <th><strong>Codigo</strong></th>
              <th><strong>Materia</strong></th>
              <th><strong>Area</strong></th>
              <th><strong>Profesor</strong></th>
              <th><strong>Accion</strong></th>
          </tr>
      </thead>
      <tbody>
<?php



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

  $consulta= "SELECT distinct m.mat_codigo,m.mat_nombre,m.mat_area,r.reg_codigoprof,u.nombre,u.apellido FROM registrom r, materias m,usuario u where r.reg_codigomat = m.mat_codigo and r.reg_codigohor = '$id' and u.id = r.reg_codigoprof";
	
                $result=mysqli_query($conn,$consulta);
              if (!empty($result)) {
                while ($row=mysqli_fetch_array($result)){
                  
                      ?>
    <tr>
              <td><?php echo $row["mat_codigo"]; ?></td>
              <td><?php echo $row["mat_nombre"]; ?></td>
              <td><?php echo $row["mat_area"]; ?></td>
              <td><?php echo $row["nombre"]." ".$row["apellido"]; ?></td>
              
              
      
              <td>
                  <a onclick="return confirm('Eliminar Materia? Se eliminará del horario todas las horas correspondientes a la materia seleccionada');" class="btnDeleteAction" 
                  href="deleteMateria.php?id=<?php echo $id; ?>&materia=<?php echo $row["mat_codigo"]; ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#E74C3C " class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                    </svg>
                  </a>
              </td>
          </tr>
              <?php
                  }
              }
              ?>
          
      
      
      <tbody>
  
  </table>
</div>
<br><br><div style="text-align: right; margin: 20px 0px 10px;"><h3>Materias Con Docente NO Asignado</h3><br>
 </div>
<div id="toys-grid">
  <table cellpadding="10" cellspacing="1">
      <thead>
          <tr>
              <th><strong>Codigo</strong></th>
              <th><strong>Materia</strong></th>
              <th><strong>Area</strong></th>
              <th><strong>Profesor</strong></th>
              <th><strong>Accion</strong></th>
          </tr>
      </thead>
      <tbody>
<?php


  $consulta= "SELECT distinct m.mat_codigo,m.mat_nombre,m.mat_area,r.reg_codigoprof FROM registrom r, materias m where r.reg_codigomat = m.mat_codigo and r.reg_codigohor = '$id' and r.reg_codigoprof = 0";
	
                $result=mysqli_query($conn,$consulta);
              if (!empty($result)) {
                while ($row=mysqli_fetch_array($result)){
                  
                      ?>
    <tr>
              <td><?php echo $row["mat_codigo"]; ?></td>
              <td><?php echo $row["mat_nombre"]; ?></td>
              <td><?php echo $row["mat_area"]; ?></td>
              <td><a style="color: red; font-weight: 600;" class="btnEditAction"
                  href="addProf.php?id=<?php echo $id;?>&nivel=<?php echo $nivel;?>&codm=<?php echo $row["mat_codigo"];?>&materia=<?php echo $row["mat_area"];?>">
                  Asignar Profesor
                  </a>
                  
                  </td>
              
              
              
              <td>
                  <a onclick="return confirm('Eliminar Materia? Se eliminará del horario todas las horas correspondientes a la materia seleccionada');" class="btnDeleteAction" 
                  href="deleteMateria.php?id=<?php echo $id; ?>&materia=<?php echo $row["mat_codigo"]; ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#E74C3C " class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                    </svg>
                  </a>
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
<div id="toys-grid" > <h3>HORARIO DEL CURSO</h3><br>
  <table cellpadding="20" cellspacing="2">
      <thead>
          <tr>
              <th><strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspHora&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong></th>
              <th><strong>Lunes</strong></th>
              <th><strong>Martes</strong></th>
              <th><strong>Miercoles</strong></th>
              <th><strong>Jueves</strong></th>
              <th><strong>Viernes</strong></th>
          </tr>
      </thead>
      <tbody>
<?php
 $primera = '7:10 - 7:50';
 $segunda ='7:50 - 8:30';
 $tercera ='8:30 - 9:10';
 $cuarta ='9:35 - 10:15';
 $quinta ='10:15 - 10:55';
 $sexta ='10:55 - 11:35';
 $septima ='12:00 - 12:40';
 $octava ='12:40 - 13:20';
 $array = array($primera, $segunda,$tercera,$cuarta,$quinta,$sexta,$septima, $octava);
  for($n =0;$n<8;$n++){
    ?><tr>
    <td><?php echo $array[$n]; ?></td> 
    <?php
  $consultaH= "SELECT m.mat_nombre,r.reg_dia,r.reg_hora FROM registrom r, materias m where r.reg_codigomat = m.mat_codigo and r.reg_codigohor=$id and r.reg_hora = '$array[$n]'  order by r.reg_dia";
	$result2=mysqli_query($conn,$consultaH);
  $nr 		= mysqli_num_rows($result2);  
  if ($nr != 0) {
    $cont = 0;
    while ($row2=mysqli_fetch_array($result2)){
          ?>
          <?php 
          if ($row2["reg_dia"]==1){
            ?><td><?php echo $row2["mat_nombre"]; ?></td> <?php
            $cont=1;
            
          }elseif($row2["reg_dia"]==2){
            if($cont != 1){
              ?><td>  </td>
              <td><?php echo $row2["mat_nombre"]; ?></td>
               <?php
               $cont=2;
            }else{
              ?>
            <td><?php echo $row2["mat_nombre"]; ?></td>
             <?php
             $cont=2;
            }
            
          }elseif($row2["reg_dia"]==3){
            if($cont != 2){
              for($i=$cont+1;$i<=2;$i++){
                ?><td>  </td><?php
              } ?>
              <td><?php echo $row2["mat_nombre"]; ?></td>
               <?php
               $cont=3;
            }else{
              ?>
            <td><?php echo $row2["mat_nombre"]; ?></td>
             <?php
             $cont=3;
            }
            
          }elseif($row2["reg_dia"]==4){
            if($cont != 3){
              for($i=$cont+1;$i<=3;$i++){
                ?><td>  </td>
              <?php
              } ?>
              <td><?php echo $row2["mat_nombre"]; ?></td>
               <?php
               $cont=4;
            }else{
              ?>
            <td><?php echo $row2["mat_nombre"]; ?></td>
             <?php
             $cont=4;
            }
          }elseif($row2["reg_dia"]==5){
            if($cont != 4){
              for($i=$cont+1;$i<=4;$i++){
                ?><td>  </td>
              <?php
              } ?>
              <td><?php echo $row2["mat_nombre"]; ?></td>
               <?php
               $cont=5;
              }else{
                ?>
              <td><?php echo $row2["mat_nombre"]; ?></td>
               <?php
               $cont=5;
              }
          }else{
            ?>
                <td>  </td>
              <?php
          }
          
          }
          for($t=$cont;$t<5;$t++){
            ?>
            <td> </td>
          <?php
          }
              }else { ?>
                <td> </td>
                <td>  </td>
                <td>  </td>
                <td> </td>
                <td> </td>
              <?php
              }
              ?>


    </tr>
  <?php } ?>  
          
      
      
      <tbody>
  
  </table>
</div>
	</div>
	</div>
	
	
	
	

</body>
</html>
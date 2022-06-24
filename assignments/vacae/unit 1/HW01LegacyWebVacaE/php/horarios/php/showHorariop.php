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

    <br><br><div style="text-align: right; margin: -38px 0px 10px;"><h3>Materias Del Docente</h3><br>
  
</div>
<div id="toys-grid" style="text-align: right; margin: -10px 0px 10px;">
  <table cellpadding="10" cellspacing="1" >
      <thead>
          <tr>
              <th><strong>Codigo</strong></th>
              <th><strong>Materia</strong></th>
              <th><strong>Area</strong></th>
              <th><strong>Curso</strong></th>
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

  $consulta= "SELECT distinct m.mat_codigo,m.mat_nombre,m.mat_area,h.hor_nivel,h.hor_paralelo FROM registrom r, materias m,horarios h where r.reg_codigomat = m.mat_codigo and r.reg_codigoprof = '$id' and h.hor_codigo = r.reg_codigohor";
	
                $result=mysqli_query($conn,$consulta);
              if (!empty($result)) {
                while ($row=mysqli_fetch_array($result)){
                  
                      ?>
    <tr>
              <td><?php echo $row["mat_codigo"]; ?></td>
              <td><?php echo $row["mat_nombre"]; ?></td>
              <td><?php echo $row["mat_area"]; ?></td>
              <td><?php echo $row["hor_nivel"]."  ".$row["hor_paralelo"]; ?></td>
              
              
      
              <td>
                  <a onclick="return confirm('Confirma Eliminar Materia?');" class="btnDeleteAction" 
                  href="deleteMateriaP.php?id=<?php echo $id; ?>&materia=<?php echo $row["mat_codigo"]; ?>">
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
			<div id="toys-grid"> <h3>HORARIO DEL Docente</h3><br>
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
  $consultaH= "SELECT m.mat_nombre,h.hor_nivel,h.hor_paralelo,r.reg_dia,r.reg_hora FROM registrom r, materias m,horarios h where r.reg_codigomat = m.mat_codigo and r.reg_codigohor=h.hor_codigo and r.reg_codigoprof=$id and r.reg_hora = '$array[$n]'  order by r.reg_dia";
	$result2=mysqli_query($conn,$consultaH);
  $nr 		= mysqli_num_rows($result2);  
  if ($nr != 0) {
    $cont = 0;
    while ($row2=mysqli_fetch_array($result2)){
          ?>
          <?php 
          if ($row2["reg_dia"]==1){
            ?><td><?php echo $row2["mat_nombre"]." ".$row2["hor_nivel"]."  ".$row2["hor_paralelo"];  ?></td> <?php
            $cont=1;
            
          }elseif($row2["reg_dia"]==2){
            if($cont != 1){
              ?><td></td>
              <td><?php echo $row2["mat_nombre"]." ".$row2["hor_nivel"]."  ".$row2["hor_paralelo"]; ?></td>
               <?php
               $cont=2;
            }else{
              ?>
            <td><?php echo $row2["mat_nombre"]." ".$row2["hor_nivel"]."  ".$row2["hor_paralelo"]; ?></td>
             <?php
             $cont=2;
            }
            
          }elseif($row2["reg_dia"]==3){
            if($cont != 2){
              for($i=$cont+1;$i<=2;$i++){
                ?><td> </td><?php
              } ?>
              <td><?php echo $row2["mat_nombre"]." ".$row2["hor_nivel"]."  ".$row2["hor_paralelo"]; ?></td>
               <?php
               $cont=3;
            }else{
              ?>
            <td><?php echo $row2["mat_nombre"]." ".$row2["hor_nivel"]."  ".$row2["hor_paralelo"]; ?></td>
             <?php
             $cont=3;
            }
            
          }elseif($row2["reg_dia"]==4){
            if($cont != 3){
              for($i=$cont+1;$i<=3;$i++){
                ?><td> </td>
              <?php
              } ?>
              <td><?php echo $row2["mat_nombre"]." ".$row2["hor_nivel"]."  ".$row2["hor_paralelo"]; ?></td>
               <?php
               $cont=4;
            }else{
              ?>
            <td><?php echo $row2["mat_nombre"]." ".$row2["hor_nivel"]."  ".$row2["hor_paralelo"]; ?></td>
             <?php
             $cont=4;
            }
          }elseif($row2["reg_dia"]==5){
            if($cont != 4){
              for($i=$cont+1;$i<=4;$i++){
                ?><td>  </td>
              <?php
              } ?>
              <td><?php echo $row2["mat_nombre"]." ".$row2["hor_nivel"]."  ".$row2["hor_paralelo"]; ?></td>
               <?php
               $cont=5;
              }else{
                ?>
              <td><?php echo $row2["mat_nombre"]." ".$row2["hor_nivel"]."  ".$row2["hor_paralelo"]; ?></td>
               <?php
               $cont=5;
              }
          }else{
            ?>
                <td> </td>
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
                <td></td>
                <td> </td>
                <td>  </td>
                <td>  </td>
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
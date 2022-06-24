<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link href="../css/style.css" type="text/css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,200&display=swap" rel="stylesheet">
</head>

<body>
	
	<div class="principal2">
	<div class="contenedor-izquierdo">
		<?php
    $id = $_GET['id'];
    $nivel = $_GET['nivel'];
    $materia = $_GET['materia'];
    $codm = $_GET['codm'];
    
    $basica = "Basica";
    $media = "Media";
    $superior ="Superior";
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


echo '<form class="formulario" name="frmAdd" method="post" action="addProfeH.php" id="frmAdd">';
                    // Consulta a la base de datos.
                    if($nivel == "2do" ||$nivel == "3ro"||$nivel == "4to"||$nivel == "5to"||$nivel == "6to"||$nivel == "7mo"){
                        $query = "SELECT id,nombre,apellido FROM usuario where nivel = '$basica' and area = '$materia'";
                    }elseif($nivel == "8vo" ||$nivel == "9no"||$nivel == "10mo"){
                        $query = "SELECT id,nombre,apellido FROM usuario where nivel = '$media' and area = '$materia'";
                    }else{
                        $query = "SELECT id,nombre,apellido FROM usuario where nivel = '$superior' and area = '$materia'";
                    }
                   $result3 = mysqli_query($conn,$query);
                   echo'<div id="mail-status"></div>';
                   echo '<div><h1> Maestros para '.$materia.'</h1><br>';
                   echo'<label style="padding-top: 20px;">Profesores Correspondientes a la Asignatura</label> <span
                           id="name-info" class="info"></span><br /> <select name="profe" class="demoInputBox" id="profe">';                 

                 
                 //Generamos el menu desplegable
                 while ($row=mysqli_fetch_array($result3))
                 {?>
                 <option value = "<?php echo $row["id"]?>"><?php echo $row["nombre"]." ".$row["apellido"]?>

                <?php } ?>
                 
                </select>
                  
                <input type="hidden"
          name="codigohor" id="codigohor" class="demoInputBox" value="<?php echo $id; ?>">
          <input type="hidden"
          name="codigomat" id="codigomat" class="demoInputBox" value="<?php echo $codm; ?>">

 
  
  
  <div >
      <input type="submit" name="add" id="btnSubmit" value="Asignar" />
	  
	  
  </div>
  </div>
</form>

		</div>
		<div class="contenedor-derecho">
			<div id="toys-grid"> <br><h3>HORARIO DEL CURSO</h3><br>
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
              ?><td> </td>
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
                ?><td></td><?php
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
                ?><td> </td>
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
                ?><td> </td>
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
          
          }for($t=$cont;$t<5;$t++){
            ?>
            <td> </td>
          <?php
          }
              }else { ?>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td>  </td>
              <?php
              }
              ?>


    </tr>
  <?php } ?>  
          
      
      
      <tbody>
  
  </table>
</div>
			</div></div>

</body>
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	
	<?php
	
	require_once("horario.php");
	
	?>
	
  <div class="div_principal">
	<form method="POST" class="row g-3" action="">
		<select name="curso">

			<option value="0" disabled>Seleccione un curso</option>

		<?php

		if(!empty($result)){

			foreach($result as $k => $v){
				
				if($_POST['curso'] == $result[$k]["CUR_CODIGO"]){
				?>
					<option selected value="<?php echo $result[$k]["CUR_CODIGO"] ?>"><?php echo $result[$k]["CUR_CURSO"]." ".$result[$k]["CUR_PARALELO"] ?></option>
					

				<?php
				}else{
			    ?>
					
					<option value="<?php echo $result[$k]["CUR_CODIGO"] ?>"><?php echo $result[$k]["CUR_CURSO"]." ".$result[$k]["CUR_PARALELO"] ?></option>
			
				<?php
				}
			}
		}

		?>
		</select>
		
		<input type="submit" class="btn btn-primary" name="ver" value="Ver horario">
		
		<?php
	//echo ($aux);
	if($aux != NULL){
		
		?>

		<table cellpadding="10" cellspacing="1" class="table table-striped">
            <thead>
                <tr>
					<th><strong>Hora</strong></th>
                    <th><strong>Lunes</strong></th>
                    <th><strong>Martes</strong></th>
                    <th><strong>Miercoles</strong></th>
                    <th><strong>Jueves</strong></th>
                    <th><strong>Viernes</strong></th>

                </tr>
            </thead>
            <tbody>
				
	<?php
	
	$horario = new Horario();
				
	$resultado = $horario->getHorarioPorCurso($_POST['curso']);
	$k = 0;
	
	if($aux == 1){
		for($i=0; $i<8; $i++) {

		 ?>
			<tr>
				<td><?php echo $horasBGU[$i] ?></td>
				<?php
				for($j=0; $j<5; $j++){
				?>

				<td>
					<?php 

					echo $resultado[$k]["MAT_NOMBRE"]."<br>";
					echo $resultado[$k]["PER_NOMBRES"];


					?>


				</td>

				<?php
				$k++;
				}
				?>
			</tr>
		  <?php
		 }
		
	}else if($aux == 2 || $aux == 3 || $aux == 4){
		
		for($i=0; $i<7; $i++) {

		 ?>
			<tr>
				<td><?php echo $horasEGB[$i] ?></td>
				<?php
				for($j=0; $j<5; $j++){
				?>

				<td>
					<?php 

					echo $resultado[$k]["MAT_NOMBRE"]."<br>";
					echo $resultado[$k]["PER_NOMBRES"];


					?>


				</td>

				<?php
				$k++;
				}
				?>
			</tr>
		  <?php
		 }
		
	}
	
	?>
		</tbody>
	</table>
		
	<?php
			
	}
	?>
		
  </form>
	
</body>
</html>
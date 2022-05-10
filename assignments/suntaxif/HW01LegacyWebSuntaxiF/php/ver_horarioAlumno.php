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
		<select name="curso" disabled>
            
        <option selected value="<?php echo $result[0]["CUR_CODIGO"] ?>"><?php echo $result[0]["CUR_CURSO"]." ".$result[0]["CUR_PARALELO"] ?></option>
		
		</select>
		
		
		
		<?php
	
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
				
	$resultado = $horario->getHorarioPorCurso($codigo_curso);
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
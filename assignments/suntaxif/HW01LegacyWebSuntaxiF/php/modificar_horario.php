<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	
	<?php
	
	require_once("Materia.php");
	
	?>
	
  <div class="div_principal">
	<form method="POST" class="row g-3" action="">
		
		<select name="curso" disabled>
			<option selected value=<?php echo $codigoCurso ?> ><?php echo $nombreCurso[0]["CUR_CURSO"]." ".$nombreCurso[0]["CUR_PARALELO"] ?></option>
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
	
	$materia = new Materia();
	
	if($aux == 1){
		
			$resultado = $materia->getMateriasBachillerato();
			$m = 0;
            for($i=0; $i<8; $i++) {
				
             ?>
          		<tr>
					<td><?php echo $horasBGU[$i] ?></td>
					<?php
					for($j=0; $j<5; $j++){
					?>
					<td>
						<select name="<?php echo $i.$j ?>"> 

							<?php  

							foreach($resultado as $k => $v){
								
								if($horarios[$m]["MAT_CODIGO"] == $resultado[$k]["MAT_CODIGO"]){
									
								?>
								<option selected value="<?php echo $resultado[$k]["MAT_CODIGO"] ?>"><?php echo $resultado[$k]["MAT_NOMBRE"] ?></option>

								<?php
								}else{
									
								?>
								
								<option value="<?php echo $resultado[$k]["MAT_CODIGO"] ?>"><?php echo $resultado[$k]["MAT_NOMBRE"] ?></option>
							
								<?php
								}
							}

							?>

						</select>
					
				
					</td>
					<?php
					$m++;
					}
					?>
                </tr>
              <?php
				
             }
         
		
		
	}else if($aux == 2 || $aux == 3 || $aux == 4){
		
		$resultado = $materia->getMateriasEduacionBasica();
		$m = 0;
		for($i=0; $i<7; $i++) {

		 ?>
			<tr>
				<td><?php echo $horasEGB[$i] ?></td>
				<?php
				for($j=0; $j<5; $j++){
				?>
				<td>
					<select name="<?php echo $i.$j ?>"> 

						<?php  

						foreach($resultado as $k => $v){

							if($horarios[$m]["MAT_CODIGO"] == $resultado[$k]["MAT_CODIGO"]){

							?>
							<option selected value="<?php echo $resultado[$k]["MAT_CODIGO"] ?>"><?php echo $resultado[$k]["MAT_NOMBRE"] ?></option>

							<?php
							}else{

							?>

							<option value="<?php echo $resultado[$k]["MAT_CODIGO"] ?>"><?php echo $resultado[$k]["MAT_NOMBRE"] ?></option>

							<?php
							}
						}

						?>

					</select>


				</td>
				<?php
				$m++;
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
		
	
	<br><br>
	<?php
		if($aux != NULL){
	?>
	<input type="submit" class="btn btn-primary" name="modificar" id="mod_horario" value="Modificar">
		
	<?php
		}
	?>
  </form>
	
</body>
</html>
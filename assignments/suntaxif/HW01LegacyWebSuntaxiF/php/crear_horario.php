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
		<input type="submit" class="btn btn-primary" name="aceptar" value="Aceptar">
		<?php
		
		if($aux != NULL && $aparecerHorarioAceptar == true){
		
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
								if($auxBool == true && $matrizMaterias[$i][$j] == $resultado[$k]["MAT_CODIGO"]){
								?>
								<option selected value="<?php echo $resultado[$k]["MAT_CODIGO"] ?>"><?php echo $resultado[$k]["MAT_NOMBRE"] ?></option> <!--este tiene el selected-->

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
					}
					?>
                </tr>
              <?php
             }
         
		
		
	}else if($aux == 2 || $aux == 3 || $aux == 4){
		
		$resultado = $materia->getMateriasEduacionBasica();
		
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
								if($auxBool == true && $matrizMaterias[$i][$j] == $resultado[$k]["MAT_CODIGO"]){
								?>
								<option selected value="<?php echo $resultado[$k]["MAT_CODIGO"] ?>"><?php echo $resultado[$k]["MAT_NOMBRE"] ?></option> <!--este tiene el selected-->

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
		if($aux != NULL && $aparecerHorarioAceptar == true){
	?>
	<input type="submit" class="btn btn-primary" name="add" id="add_horarios" value="Agregar">
		
	<?php
		}
	?>
  </form>
	
</body>
</html>
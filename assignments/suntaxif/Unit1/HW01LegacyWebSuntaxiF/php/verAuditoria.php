<?php
	$conexion=mysqli_connect('localhost','admin','admin','proyecto7');
 ?>


<!DOCTYPE html>
<html lang="es">
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
    <link src="../../css/estilos.css"/>
    <title>Ver Reportes</title>
  </head>
  <body>
    <div class="container">
      <h3 class="text-center mt-4 text-primary">Lista de acciones realizadas</h3>
      <form class="row g-3 form-alumnos" method="POST">
        <div class="centrar col-10">
          <p>
            <label for="cedula" class="form-label">Cedula</label>
            <select name="cedula" class="form-control" id="cedula">
              <option value="0">Seleccione:</option>
              <?php
// Realizamos la consulta para extraer los datos
          $query = "SELECT * FROM persona";
		  $result = mysqli_query($conexion, $query);
          while ($valores = mysqli_fetch_array($result)) {
// En esta sección estamos llenando el select con datos extraidos de una base de datos.
			?>  
			
				<option value="<?php echo $valores['PER_CEDULA'] ?>"> <?php echo $valores['PER_NOMBRES']." - ".$valores['PER_CEDULA'] ?> </option>
				
			<?php
          }
          ?>
            </select>
          </p>
        </div>
        <div class="col-2 mt-5">
        <input type="submit" class="btn btn-success" name="search" id="search" value="Buscar" />
        </div>
      </form>
		<table class="table table-dark">
		<thead class="">
		<tr class="text-center">
			<th class="table-secondary text-dark" scope="col">Codigo</th>
			<th class="table-secondary text-dark" scope="col">Cedula</th>
			<th class="table-secondary text-dark" scope="col">IP</th>
			<th class="table-secondary text-dark" scope="col">MAC</th>
			<th class="table-secondary text-dark" scope="col">Fecha</th>	
			<th class="table-secondary text-dark" scope="col">Hora</th>	
			<th class="table-secondary text-dark" scope="col">Proceso</th>	
		</tr>
		</thead>
			<tbody>
		<?php 
		$cedula = $_POST['cedula'];
		$sql="SELECT * FROM auditoria WHERE PER_CEDULA = $cedula";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>
		<tr class="text-center">
			<td><?php echo $mostrar['AUD_CODIGO'] ?></td>
			<td><?php echo $mostrar['PER_CEDULA'] ?></td>
			<td><?php echo $mostrar['AUD_IP'] ?></td>
			<td><?php echo $mostrar['AUD_MAC'] ?></td>
			<td><?php echo $mostrar['AUD_FECHA'] ?></td>
			<td><?php echo $mostrar['AUD_HORA'] ?></td>
			<td><?php echo $mostrar['AUD_PROCESO'] ?></td>
		</tr>
	<?php 
	}
	 ?>
			</tbody>
			</table>
      <br/>
    </div>
    
  </body>
</html>

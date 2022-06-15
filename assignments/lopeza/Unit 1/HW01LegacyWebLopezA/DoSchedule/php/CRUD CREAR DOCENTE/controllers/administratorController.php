<?php

class administratorController extends Administrator{

	function index(){
		require_once('views/all/header.php');
		require_once('views/all/nav.php');
		require_once('views/index/index.php');
		require_once('views/index/modals.php');
		require_once('views/all/footer.php');
	}

	function table_users(){
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
				<th>#</th>
				<th>Identificación</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Nacionalidad</th>
				<th>Titulo</th>
				<th>Materia</th>					
				<th>Opciones</th>
				</tr>
			</thead>
			<tbody >		
		<?php
		foreach (parent::get_view_users()	as $data) {
		?>
		<tr>
		<td><?php echo $data->do_codigo; ?> </td>
			<td><?php echo $data->do_identificacion; ?> </td>
			<td><?php echo $data->do_nombres; ?> </td>
			<td><?php echo $data->do_apellidos; ?> </td>
			<td><?php echo $data->do_nacionalidad; ?> </td>
			<td><?php echo $data->do_titulo; ?> </td>
			<td><?php echo $data->do_materia; ?> </td>		
			<td>
			<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			Seleccionar <span class="caret"></span></button>
			<ul class="dropdown-menu" role="menu">
			<li><a href="#" onclick="ModalUpdate('<?php echo $data->do_codigo; ?>','<?php echo $data->do_origen; ?>','<?php echo $data->do_identificacion; ?>','<?php echo $data->do_nombres; ?>','<?php echo $data->do_apellidos; ?>','<?php echo $data->do_nacionalidad; ?>','<?php echo $data->do_genero; ?>','<?php echo $data->do_titulo; ?>','<?php echo $data->do_materia; ?>','<?php echo $data->do_pais; ?>','<?php echo $data->do_provinciaN; ?>','<?php echo $data->do_provinciaR; ?>','<?php echo $data->do_cantonR; ?>','<?php echo $data->do_parroquiaR; ?>','<?php echo $data->do_domicilio; ?>','<?php echo $data->do_nacimiento; ?>','<?php echo $data->do_prefijo1; ?>','<?php echo $data->do_telefonoD; ?>','<?php echo $data->do_extencion; ?>','<?php echo $data->do_estadoC; ?>','<?php echo $data->do_prefijo2; ?>','<?php echo $data->do_celular; ?>','<?php echo $data->do_email; ?>','<?php echo $data->do_discapacidad; ?>','<?php echo $data->do_carne; ?>','<?php echo $data->do_votacion; ?>','<?php echo $data->do_username; ?>','<?php echo $data->do_password; ?>');">Actualizar</a></li>
			<li><a href="#" onclick="deleteUser('<?php echo $data->do_codigo; ?>');">Borrar</a></li>
			<li><a href="#" onclick="estadoD('<?php echo $data->do_codigo; ?>','<?php echo $data->do_estado; ?>');">Desactivar</a></li>
			</ul>
			</div>
			</td>
		</tr>
		<?php
		}
		?>
			</tbody>
		</table>	
	<?php	
    }

	function table_docentes(){		
		?>				
		<table class="table table-bordered">
			<thead>
				<tr>
				<th>#</th>
				<th>Identificación</th>
				<th>Nombres</th>
				<th>Apellidos</th>				
				<th>Estado</th>									
				<th>Opciones</th>
				</tr>
			</thead>
			<tbody >		
		<?php
		foreach (parent::get_view_usersD()	as $data) {
		?>
		<tr>
		<td><?php echo $data->do_codigo; ?> </td>
			<td><?php echo $data->do_identificacion; ?> </td>
			<td><?php echo $data->do_nombres; ?> </td>
			<td><?php echo $data->do_apellidos; ?> </td>			
			<td><?php echo $data->do_estado; ?> </td>				
			<td>
			<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			Seleccionar <span class="caret"></span></button>
			<ul class="dropdown-menu" role="menu">			
			<li><a href="#" onclick="estadoA('<?php echo $data->do_codigo; ?>','<?php echo $data->do_estado; ?>');">Activar</a></li>
			</ul>
			</div>
			</td>
		</tr>
		<?php
		}
		?>
			</tbody>
		</table>	
	<?php	
    }
    
	function deleteuser(){		
		parent::set_delete_user($_REQUEST['codigo']);		
}

	function registeruser(){
		$data = array(
					'origen' => $_REQUEST['origen'],
					'identificacion' => $_REQUEST['identificacion'],
					'nombres' => $_REQUEST['nombres'],
					'apellidos'=> $_REQUEST['apellidos'],
					'nacionalidad' => $_REQUEST['nacionalidad'],
					'genero' => $_REQUEST['genero'],
					'titulo' => $_REQUEST['titulo'],
					'materia' => $_REQUEST['materia'],
					'pais' => $_REQUEST['pais'],
					'provinciaN' => $_REQUEST['provinciaN'],
					'provinciaR' => $_REQUEST['provinciaR'],
					'cantonR' => $_REQUEST['cantonR'],
					'parroquiaR' => $_REQUEST['parroquiaR'],
					'domicilio' => $_REQUEST['domicilio'],
					'nacimiento' => $_REQUEST['nacimiento'],
					'prefijo1' => $_REQUEST['prefijo1'],
					'telefonoD' => $_REQUEST['telefonoD'],
					'extencion' => $_REQUEST['extencion'],
					'estadoC' => $_REQUEST['estadoC'],
					'prefijo2' => $_REQUEST['prefijo2'],
					'celular' => $_REQUEST['celular'],
					'email' => $_REQUEST['email'],
					'discapacidad' => $_REQUEST['discapacidad'],
					'carne' => $_REQUEST['carne'],
					'votacion' => $_REQUEST['votacion'],
					'user' => $_REQUEST['user'],
					'pass' => $_REQUEST['pass']
					);		
					parent::set_register_user($data);		
    }    
    
	function updateuser(){
		$data = array(
			'codigo' => $_REQUEST['codigo'],
			'origen' => $_REQUEST['origen'],
			'identificacion' => $_REQUEST['identificacion'],
			'nombres' => $_REQUEST['nombres'],
			'apellidos'=> $_REQUEST['apellidos'],
			'nacionalidad' => $_REQUEST['nacionalidad'],
			'genero' => $_REQUEST['genero'],
			'titulo' => $_REQUEST['titulo'],
			'materia' => $_REQUEST['materia'],
			'pais' => $_REQUEST['pais'],
			'provinciaN' => $_REQUEST['provinciaN'],
			'provinciaR' => $_REQUEST['provinciaR'],
			'cantonR' => $_REQUEST['cantonR'],
			'parroquiaR' => $_REQUEST['parroquiaR'],
			'domicilio' => $_REQUEST['domicilio'],
			'nacimiento' => $_REQUEST['nacimiento'],
			'prefijo1' => $_REQUEST['prefijo1'],
			'telefonoD' => $_REQUEST['telefonoD'],
			'extencion' => $_REQUEST['extencion'],
			'estadoC' => $_REQUEST['estadoC'],
			'prefijo2' => $_REQUEST['prefijo2'],
			'celular' => $_REQUEST['celular'],
			'email' => $_REQUEST['email'],
			'discapacidad' => $_REQUEST['discapacidad'],
			'carne' => $_REQUEST['carne'],
			'votacion' => $_REQUEST['votacion'],
			'user' => $_REQUEST['user'],
			'pass' => $_REQUEST['pass']		
				);		
			parent::set_update_user($data);		
	}    

	function estadodocente(){
		$data = array(
			'codigo' => $_REQUEST['codigo'],
			'estado' => $_REQUEST['estado']				
				);		
			parent::set_estado_doc($data);		
	} 	
    function estadodocenteA(){
		$data = array(
			'codigo' => $_REQUEST['codigo'],
			'estado' => $_REQUEST['estado']				
				);		
			parent::set_estado_docA($data);		
	} 	
    
    
}


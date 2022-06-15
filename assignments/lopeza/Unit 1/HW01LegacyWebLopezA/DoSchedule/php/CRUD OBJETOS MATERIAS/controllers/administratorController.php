<?php

class administratorController extends Administrator{

	function index(){
		require_once('views/all/header.php');
		require_once('views/all/nav.php');
		require_once('views/index/index.php');
		require_once('views/index/modals.php');
		require_once('views/all/footer.php');
	}

	function table_materias(){
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
				<th>Cod.</th>
				<th>Nombre</th>
				<th>Programa de Estudios</th>
				<th>Area del conocimiento</th>
				<th>Carga horaria</th>
				<th>Estado</th>
				<th>Opciones</th>
				</tr>
			</thead>
			<tbody >
		<?php
		foreach (parent::get_view_materias()	as $data) {
		?>
		<tr>
			<td><?php echo $data->mat_codigo; ?> </td>
			<td><?php echo $data->mat_nombre; ?> </td>
			<td><?php echo $data->mat_programa; ?> </td>
			<td><?php echo $data->mat_area; ?> </td>
			<td><?php echo $data->mat_horaria; ?> </td>
			<td><?php echo $data->mat_estado; ?> </td>
			<td>
			<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			Seleccionar <span class="caret"></span></button>
			<ul class="dropdown-menu" role="menu">
			<li><a href="#" onclick="ModalUpdate('<?php echo $data->mat_codigo; ?>','<?php echo $data->mat_nombre; ?>','<?php echo $data->mat_programa; ?>','<?php echo $data->mat_area; ?>','<?php echo $data->mat_horaria; ?>');">Actualizar</a></li>
			<li><a href="#" onclick="deleteMateria('<?php echo $data->mat_codigo; ?>');">Borrar</a></li>
			<li><a href="#" onclick="ModalBorrar('<?php echo $data->mat_codigo; ?>','<?php echo $data->mat_estado; ?>');">Borrado Lógico</a></li>
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
    
	function deletemateria(){		
			parent::set_delete_materia($_REQUEST['id']);		
    }

	function registermateria(){
		$data = array(
					'name' 		=> $_REQUEST['name'],
					'programa_estudios' => $_REQUEST['programa_estudios'],
					'area' => $_REQUEST['area'],
					'horaria' => $_REQUEST['horaria']
					);		
			parent::set_register_materias($data);		
    }    
    
	function updatemateria(){
		$data = array(
					'id'		=> $_REQUEST['id'],
					'name' 		=> $_REQUEST['name'],
					'programa_estudios' => $_REQUEST['programa_estudios'],
					'area' => $_REQUEST['area'],
					'horaria' => $_REQUEST['horaria']
					);		
			parent::set_update_materia($data);
	}       
	
	function borrarmateria(){
		$data = array(
					'id'		=> $_REQUEST['id'],
					'estado' 		=> $_REQUEST['estado']
					);		
			parent::set_borrar_materia($data);		
	} 
}
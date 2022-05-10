<?php

class administratorController extends Administrator{

	function index(){
		require_once('views/all/header.php');
		require_once('views/all/nav.php');
		require_once('views/index/index.php');
		require_once('views/index/modals.php');
		require_once('views/all/footer.php');
	}

	function table_areas(){
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
				<th>Cod.</th>
				<th>Nombre</th>
				<th>Programa de Estudios</th>
				<th>Estado</th>
				<th>Opciones</th>
				</tr>
			</thead>
			<tbody>		
		<?php
		foreach (parent::get_view_areas()	as $data) {
		?>
		<tr>
			<td><?php echo $data->are_codigo; ?> </td>
			<td><?php echo $data->are_nombre; ?> </td>
			<td><?php echo $data->are_programa; ?> </td>
			<td><?php echo $data->are_estado; ?> </td>
			<td>
			<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			Seleccionar <span class="caret"></span></button>
			<ul class="dropdown-menu" role="menu">
			<li><a href="#" onclick="ModalUpdate('<?php echo $data->are_codigo; ?>','<?php echo $data->are_nombre; ?>','<?php echo $data->are_programa; ?>');">Actualizar</a></li>
			<li><a href="#" onclick="deleteArea('<?php echo $data->are_codigo; ?>');">Borrar</a></li>
			<li><a href="#" onclick="ModalBorrar('<?php echo $data->are_codigo; ?>','<?php echo $data->are_estado; ?>');">Borrado Lógico</a></li>
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
    
	function deletearea(){		
			parent::set_delete_area($_REQUEST['id']);		
    }

	function registerarea(){
		$data = array(
					'name' 		=> $_REQUEST['name'],
					'programa_estudios' => $_REQUEST['programa_estudios']
					);		
					parent::set_register_area($data);		
    }    
    
	function updatearea(){
		$data = array(
					'id'		=> $_REQUEST['id'],
					'name' 		=> $_REQUEST['name'],
					'programa_estudios' => $_REQUEST['programa_estudios']
					);		
			parent::set_update_area($data);		
	}      
	
	function borrararea(){
		$data = array(
					'id'		=> $_REQUEST['id'],
					'estado' 		=> $_REQUEST['estado']
					);		
			parent::set_borrar_area($data);		
	} 
}
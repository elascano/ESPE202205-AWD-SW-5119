<?php

class Administrator extends db{
	
	private function view_materias(){
		try {
			$SQL = "SELECT * FROM pr_materias";
			$result = $this->connect()->prepare($SQL);
			$result->execute();
			return $result->fetchAll(PDO::FETCH_OBJ);	
		} catch (Exception $e) {
			die('Error Administrator(view_materias) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function get_view_materias(){
		return $this->view_materias();
	}

	private function register_materias($data){
		try {
			$SQL = "INSERT INTO pr_materias (mat_nombre, mat_programa, mat_area, mat_horaria) VALUES (?,?,?,?)";
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['name'],
									$data['programa_estudios'],
									$data['area'],
									$data['horaria']
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(register_materias) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_register_materias($data){
		$this->register_materias($data);
	}

	private function update_materia($data){
		try {
			$SQL = 'UPDATE pr_materias SET mat_nombre = ?, mat_programa = ?, mat_area = ?, mat_horaria = ? WHERE mat_codigo = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['name'],
									$data['programa_estudios'],
									$data['area'],
									$data['horaria'],
									$data['id']
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(update_materia) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_update_materia($data){
		$this->update_materia($data);
	}

	private function delete_materia($id){
		try {
			$SQL = 'DELETE FROM pr_materias WHERE mat_codigo = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array($id));			
		} catch (Exception $e) {
			die('Error Administrator(delete_materia) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_delete_materia($id){
		$this->delete_materia($id);
	}
	
	private function view_areas(){
		try {
			$SQL = "SELECT * FROM pr_areas";
			$result = $this->connect()->prepare($SQL);
			$result->execute();
			return $result->fetchAll(PDO::FETCH_OBJ);	
		} catch (Exception $e) {
			die('Error Administrator(view_areas) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function get_view_areas(){
		return $this->view_areas();
	}
	
	private function borrar_materia($data){
		try {
			$SQL = 'UPDATE pr_materias SET mat_estado = ? WHERE mat_codigo = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['estado'],
									$data['id']
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(borrar_materia) '.$e->getMessage());
		} finally {
			$result = null;
		}
	}

	function set_borrar_materia($data){
		$this->borrar_materia($data);
	}
}
?>
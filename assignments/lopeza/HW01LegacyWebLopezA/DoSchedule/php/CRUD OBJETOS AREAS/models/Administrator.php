<?php

class Administrator extends db{
	
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

	private function register_areas($data){
		try {
			$SQL = 'INSERT INTO pr_areas (are_nombre,are_programa) VALUES (?,?)';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['name'],
									$data['programa_estudios'],
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(register_areas) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_register_area($data){
		$this->register_areas($data);
	}

	private function update_area($data){
		try {
			$SQL = 'UPDATE pr_areas SET are_nombre = ?, are_programa = ? WHERE are_codigo = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['name'],
									$data['programa_estudios'],
									$data['id']
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(update_area) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_update_area($data){
		$this->update_area($data);
	}

	private function delete_area($id){
		try {
			$SQL = 'DELETE FROM pr_areas WHERE are_codigo = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array($id));			
		} catch (Exception $e) {
			die('Error Administrator(delete_area) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}
	
	function set_delete_area($id){
		$this->delete_area($id);
	}	
	
	private function borrar_area($data){
		try {
			$SQL = 'UPDATE pr_areas SET are_estado = ? WHERE are_codigo = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['estado'],
									$data['id']
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(borrar_area) '.$e->getMessage());
		} finally {
			$result = null;
		}
	}

	function set_borrar_area($data){
		$this->borrar_area($data);
	}
}
?>
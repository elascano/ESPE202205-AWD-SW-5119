<?php

class Administrator extends db{
	
	private function view_users(){
		try {
			$SQL = "SELECT * FROM registro_docentes WHERE do_estado=1";
			$result = $this->connect()->prepare($SQL);
			$result->execute();
			return $result->fetchAll(PDO::FETCH_OBJ);	
		} catch (Exception $e) {
			die('Error Administrator(view_users) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}
	private function view_usersD(){
		try {
			$SQL = "SELECT * FROM registro_docentes WHERE do_estado=0";
			$result = $this->connect()->prepare($SQL);
			$result->execute();
			return $result->fetchAll(PDO::FETCH_OBJ);	
		} catch (Exception $e) {
			die('Error Administrator(view_usersD) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function get_view_users(){
		return $this->view_users();
	}

	function get_view_usersD(){
		return $this->view_usersD();
	}

	private function register_users($data){
		try {
			$SQL = 'INSERT INTO registro_docentes(do_origen,do_identificacion,do_nombres,do_apellidos,do_nacionalidad,do_genero,do_titulo,do_materia,do_pais,do_provinciaN,do_provinciaR,do_cantonR,do_parroquiaR,do_domicilio,do_nacimiento,do_prefijo1,do_telefonoD,do_extencion,do_estadoC,do_prefijo2,do_celular,do_email,do_discapacidad,do_carne,do_votacion,do_username,do_password) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
			$result = $this->connect()->prepare($SQL);
            $hash = password_hash($data['pass'],PASSWORD_DEFAULT);
            echo $hash;
			$result->execute(array(
									$data['origen'],
									$data['identificacion'],
									$data['nombres'],
									$data['apellidos'],
									$data['nacionalidad'],
									$data['genero'],
									$data['titulo'],									
									$data['materia'],									
									$data['pais'],
									$data['provinciaN'],
									$data['provinciaR'],
									$data['cantonR'],
									$data['parroquiaR'],
									$data['domicilio'],
									$data['nacimiento'],
									$data['prefijo1'],
									$data['telefonoD'],
									$data['extencion'],
									$data['estadoC'],
									$data['prefijo2'],
									$data['celular'],
									$data['email'],
									$data['discapacidad'],
									$data['carne'],
									$data['votacion'],
									$data['user'],
									$hash
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(register_users) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_register_user($data){
		$this->register_users($data);
	}

	private function update_user($data){
		try {
			$SQL = 'UPDATE registro_docentes SET do_origen= ?, do_identificacion = ?, do_nombres = ?, do_apellidos = ?, do_nacionalidad = ?, do_genero = ?, do_titulo = ?, do_materia = ?, do_pais = ?, do_provinciaN = ?, do_provinciaR = ?, do_cantonR = ?, do_parroquiaR = ?, do_domicilio = ?, do_nacimiento = ?, do_prefijo1 = ?, do_telefonoD = ?, do_extencion = ?, do_estadoC = ?, do_prefijo2 = ?, do_celular = ?, do_email = ?, do_discapacidad = ?, do_carne = ?, do_votacion = ?, do_username = ?, do_password = ? WHERE do_codigo = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
				$data['origen'],
				$data['identificacion'],
				$data['nombres'],
				$data['apellidos'],
				$data['nacionalidad'],
				$data['genero'],
				$data['titulo'],									
				$data['materia'],									
				$data['pais'],
				$data['provinciaN'],
				$data['provinciaR'],
				$data['cantonR'],
				$data['parroquiaR'],
				$data['domicilio'],
				$data['nacimiento'],
				$data['prefijo1'],
				$data['telefonoD'],
				$data['extencion'],
				$data['estadoC'],
				$data['prefijo2'],
				$data['celular'],
				$data['email'],
				$data['discapacidad'],
				$data['carne'],
				$data['votacion'],
				$data['user'],
				$data['pass'],
				$data['codigo']
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(update_user) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_update_user($data){
		$this->update_user($data);
	}

	private function delete_user($codigo){
		try {
			$SQL = 'DELETE FROM registro_docentes WHERE do_codigo = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array($codigo));			
		} catch (Exception $e) {
			die('Error Administrator(delete_user) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_delete_user($codigo){
		$this->delete_user($codigo);
	}	

	private function estado_doc($data){
		try {
			$SQL = 'UPDATE registro_docentes SET do_estado= ? WHERE do_codigo = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(				
				0,		
				$data['codigo']		
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(estado_doc) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}
	
	function set_estado_doc($data){
		$this->estado_doc($data);
	}

	private function estado_docA($data){
		try {
			$SQL = 'UPDATE registro_docentes SET do_estado= ? WHERE do_codigo = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(				
				1,		
				$data['codigo']		
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(estado_docA) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}
	
	function set_estado_docA($data){
		$this->estado_docA($data);
	}
}


?>
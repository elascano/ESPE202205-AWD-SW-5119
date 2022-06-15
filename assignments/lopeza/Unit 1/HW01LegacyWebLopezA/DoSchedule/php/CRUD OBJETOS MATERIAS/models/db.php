<?php

class db{	
	protected function connect(){
		try {
			$connect = new PDO('mysql:host=localhost;dbname=horarios;charset=utf8;','admin','admin');
			$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			return $connect;	
		} catch (Exception $e) {
			die('Error db(connect) '.$e->getMessage());
		}
	}
}
?>
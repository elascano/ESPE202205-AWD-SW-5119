<?php
$claseId = $_POST['claseId'];
try {
              $connect = new PDO('mysql:host=localhost;dbname=horarios;charset=utf8;','admin','admin');
			$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$SQL = "DELETE FROM horarios WHERE id = $claseId";
			$result = $connect->prepare($SQL);
			$result->execute();			
		} catch (Exception $e) {
			die('Error Delete Horario '.$e->getMessage());
		} finally{
			$result = null;
		}

?>
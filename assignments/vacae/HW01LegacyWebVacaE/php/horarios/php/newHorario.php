<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link href="../css/style.css" type="text/css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,200&display=swap" rel="stylesheet">
</head>

<body>

<form name="frmAdd" method="post" action="addHorario.php" id="frmAdd" class="formulario">
  <div id="mail-status"></div>
  <div>
      <label style="padding-top: 20px; font-weight: 600;">Nivel</label> <span
          id="name-info" class="info"></span><br /> <?php

$nombreServidor = "localhost";
  $nombreUsuario = "admin";
  $passwordBaseDeDatos = "admin";
  $nombreBaseDeDatos = "sistemaescolar";
  
  // Crear conexión con la base de datos.
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);

$result=mysqli_query($conn,"SELECT nombre FROM cursos WHERE estado=1 Order By id");

echo '<select name="nivel" id="nivel" class="demoInputBox" style="font-family: "Josefin Sans", sans-serif;" ';

	echo '<option>Escoga una opcion</option>';
while ($row = mysqli_fetch_array($result))
{echo '<option>'.$row["nombre"];}
?>
    </select>
  </div>
  <div>
      <label style="font-weight: 600;" >Paralelo</label> <span id="roll-number-info"
          class="info"></span><br /> <select name="paralelo" class="demoInputBox" id="paralelo">
		  <option>A</option>
		  <option>B</option>
          <option>C</option>
    </select>

  </div>
 
  <div>
      <input type="submit" name="add" id="btnSubmit" value="Agregar" />
  </div>
  </div>
</form>
</body>
</html>
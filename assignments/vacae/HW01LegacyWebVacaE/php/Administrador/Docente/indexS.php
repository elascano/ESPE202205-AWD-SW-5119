<?php include("conexionS.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <!--bootstrap-->
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!--Fornt awesomw-->
	
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,200&display=swap" rel="stylesheet">
	<link href="../../../css/estiloformulario.css" rel="stylesheet" type="text/css">

    
    
    
</head>
	
		
<script src="../../../js/funcion.js"></script>
<body>
	

<div class="titulo">
	<h3>Registro de Docente</h3>
</div>
              <?php if (isset($_SESSION['message'])) { ?>
                <div style="width: 20%; position: absolute;" class="alert alert-<? $_SESSION['message-type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php session_unset();
            } ?>

            <div class="card card-body">
                <form action="ingresar.php" method="POST" class="formulario">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" rows ='1' autofocus onkeypress="return soloLetras(event)" required pattern="[A-Za-z]+" title="Caracteres unicamente" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" name="apellido" rows='2' class="form-control" placeholder="Apellido" autofocus onkeypress="return soloLetras(event)" required pattern="[A-Za-z]+" title="Caracteres unicamente" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" name="cedula" rows='2' class="form-control" placeholder="Cedula" class="controls" id="cedula" onChange="validarCed()" onkeypress="return valideKey(event);" maxlength="10" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" name="user" rows='2' class="form-control" placeholder="Usuario" autofocus required>
                    </div>
                    <br>
                    <div class="form-group">
                    <input type="password" name="clave" rows='2' class="form-control" placeholder="Clave" autofocus required pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" title="La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
Puede tener otros símbolos">
                    </div>
                    <br>
					
                    <div class="form-group">
                        <input type="email" name="correo" rows='2' class="form-control" placeholder="Correo" autofocus required>
                    </div>
                    <br>
					<div class="form-group">
                                         
<select name="nivel" id="nivel" class="form-select"  >
<option>Basica</option>
<option>Media</option>
<option>Superior</option>
</select>						
                    </div>	
				
				
                    <br>
                    <div class="form-group">
                                       <?php


$result=mysqli_query($conexionS,"SELECT distinct mat_area FROM materias WHERE estado=1  Order By mat_codigo");

echo '<select name="area" id="area" class="form-select"  ';

	echo '<option>Escoga una opcion</option>';
while ($row = mysqli_fetch_array($result))
{echo '<option>'.$row["mat_area"];}
?>
</select>                    </div>
                    <br>
                    
                    <br>
                    <input type="submit" class="btn btn-success btn-block" name="ingresar" value="Guardar" >
                </form>
            </div>
  

<?php include("includes/footerS.php") ?>
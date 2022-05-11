<?php include("conexionS.php") ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,200&display=swap" rel="stylesheet">
	<link href="../../../css/estiloformulario.css" rel="stylesheet" type="text/css">

</head>

<body> 
	<div style="margin-top: -50px; width: 20%;  float: right;" >

    <input type="search" name="busqueda" onChange="validarCed()" onkeypress="return valideKey(event);" maxlength="10"  placeholder="Cedula">

    <input type="submit" value="Buscar"></div>
	<?php if (isset($_SESSION['message'])) { ?>
                <div  style=" margin-top: -50px;width: 20%; position: absolute;" class="alert alert-<? $_SESSION['message-type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php session_unset();
            } ?>
<!--consulta tabla que muestra-->
        <div class="tabla" >
            <table class="table table-bordered" >
                <thead >
                <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cedula</th>
                    <th>User</th>
                    <th>Clave</th>
                    <th>Correo</th>
                    <th>Nivel</th>
                    <th>Curso</th>
                    <th>Rol</th>
                    <th>Fecha</th>
					<th>Actualizar</th>
					<th>Accion</th>
					<th>Estado</th>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM usuario WHERE rol = 'Alumno' ";
                    $result = mysqli_query($conexionS, $query);

                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                        <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['apellido'] ?></td>
                            <td><?php echo $row['cedula'] ?></td>
                            <td><?php echo $row['user'] ?></td>
                            <td><?php echo $row['clave'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td><?php echo $row['nivel'] ?></td>
                            <td><?php echo $row['curso'] ?></td>
                            <td><?php echo $row['rol'] ?></td>
                            <td><?php echo $row['fecha'] ?></td>
							
                            <td>
                                <a href="editar.php?id=<?php echo $row['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#5DADE2 " class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
									</svg></a></td>
                                <td><a href="eliminar.php?id=<?php echo $row['id'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#E74C3C " class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                    </svg>
                                <a href="activar.php?id=<?php echo $row['id'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-left: 5px;" width="30" height="30" fill="#28B463 " class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                       <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </a>
                            </td>
									<td><?php echo $row['estado'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
	<?php include("includes/footerS.php") ?>
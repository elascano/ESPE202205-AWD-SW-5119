<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <link src="../../css/estilos.css"/>
    <title>Ver Alumnos</title>
  </head>
  <body>
    <div class="container">
      <h3 class="text-center mt-4 text-primary">Lista de Alumnos</h3>
      <form class="row g-3 form-alumnos" method="POST">
        <div class="centrar col-10">
          <label for="cursos" class="form-label">Curso </label>
          <select name="cursos" id="cursos" class="form-select">
            <?php
              require_once "Curso.php";
              $curso = new Curso();
              $resultCursos = $curso->getCursos();
              if(!empty($resultCursos)){
                foreach($resultCursos as $k => $v){
            ?>
            <option value="<?php echo $resultCursos[$k]["CUR_CODIGO"];?>"><?php echo $resultCursos[$k]["CUR_CURSO"]." ".$resultCursos[$k]["CUR_PARALELO"];?></option>
            <?php
                }
              }
            ?>
          </select>
        </div>
        <div class="col-2 mt-5">
        <input type="submit" class="btn btn-success" name="search" id="search" value="Buscar" />
        </div>
      </form>
      <br />
    </div>
    <div class="container">
    <table class="table table-dark">
        <thead class="">
          <tr class="text-center">
            <th class="table-secondary text-dark" scope="col">Cédula</th>
            <th class="table-secondary text-dark" scope="col">Nombres</th>
            <th class="table-secondary text-dark" scope="col">Apellidos</th>
            <th class="table-secondary text-dark" scope="col">Usuario</th>
            <th class="table-secondary text-dark" scope="col">Teléfono</th>
            <th class="table-secondary text-dark" scope="col">Correo</th>
            <th class="table-secondary text-dark" scope="col">Fecha Nacimiento</th>
            <th class="table-secondary text-dark" scope="col">Editar</th>
            <th class="table-secondary text-dark" scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if(!empty($result)){
              foreach($result as $k => $v){
          ?>
          <tr class="text-center">
            <td><?php echo $result[$k]["PER_CEDULA"]?></td>
            <td><?php echo $result[$k]["PER_NOMBRES"]?></td>
            <td><?php echo $result[$k]["PER_APELLIDOS"]?></td>
            <td><?php echo $result[$k]["PER_USUARIO"]?></td>
            <td><?php echo $result[$k]["PER_TELEFONO"]?></td>
            <td><?php echo $result[$k]["PER_CORREO"]?></td>
            <td><?php echo $result[$k]["PER_FECHA_NACIMIENTO"]?></td>
            <td><a class="btn btn-primary" href="actionsAdminAlumno.php?action=editAlumno&codigo=<?php echo $result[$k]["PER_CEDULA"];?>">Editar</a></td>
            <td><a class="btn btn-danger" href="actionsAdminAlumno.php?action=deleteAlumno&codigo=<?php echo $result[$k]["PER_CEDULA"];?>">Eliminar</a></td>
          </tr>
          <?php
              }
            }
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>

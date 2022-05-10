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
    <link rel="stylesheet" href="../../css/miestilo.css" />
    <title>Ver Docentes</title>
  </head>
  <body>
    <div class="container">
    <h3 class="text-center mt-4 text-primary">Lista Docentes</h3>
      <table class="table table-dark">
        <thead>
          <tr class="text-center">
            <th class="table-secondary text-dark" scope="col">Cédula</th>
            <th class="table-secondary text-dark" scope="col">Nombres</th>
            <th class="table-secondary text-dark" scope="col">Apellidos</th>
            <th class="table-secondary text-dark" scope="col">Usuario</th>
            <th class="table-secondary text-dark" scope="col">Teléfono</th>
            <th class="table-secondary text-dark" scope="col">Correo</th>
            <th class="table-secondary text-dark" scope="col">Fecha Nacimiento</th>
            <th class="table-secondary text-dark" scope="col">Especialidad</th>
            <th class="table-secondary text-dark" scope="col">Editar</th>
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
                <td><?php echo $result[$k]["DOC_ESPECIALIDAD"]?></td>
                <td><a class="btn btn-primary" href="actionsAdminDocente.php?action=editDocente&codigo=<?php echo $result[$k]["PER_CEDULA"];?>">Editar</a></td>
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

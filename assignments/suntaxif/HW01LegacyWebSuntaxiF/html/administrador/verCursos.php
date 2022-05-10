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
    <title>Ver Docentes</title>
  </head>
  <body>
    <div class="container">
    <h3 class="text-center mt-4 text-primary">Lista Cursos</h3>
      <table class="table table-dark">
        <thead>
          <tr class="text-center">
            <th class="table-secondary text-dark" scope="col">Codigo</th>
            <th class="table-secondary text-dark" scope="col">Curso</th>
            <th class="table-secondary text-dark" scope="col">Paralelo</th>
            <th class="table-secondary text-dark" scope="col">Accion</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if(!empty($result)){
              foreach($result as $k => $v){
          ?>
          <tr class="text-center">
            <td><?php echo $result[$k]["CUR_CODIGO"]?></td>
            <td><?php echo $result[$k]["CUR_CURSO"]?></td>
            <td><?php echo $result[$k]["CUR_PARALELO"]?></td>
			<td><a class="btn btn-primary" href="actionsAdminCurso.php?action=editCurso&codigo=<?php echo $result[$k]["CUR_CODIGO"];?>">Editar</a></td>
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

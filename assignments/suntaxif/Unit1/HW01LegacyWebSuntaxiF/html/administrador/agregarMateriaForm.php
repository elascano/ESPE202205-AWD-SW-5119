<!DOCTYPE html>
<html lang="en">
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
    <title>Agregar Materia</title>
  </head>
  <body>
    <div class="container">
      <h3 class="text-center"><?php echo $title;?></h3>
      <form class="row g-3" method="POST">
        <div class="col-md-6">
          <label for="nombre" class="form-label">Nombre</label>
          <select name="nombre" id="nombre" class="form-select" required>
            <?php
              require_once "Materia.php";
              $materia = new Materia();
              foreach($materias as $m){
            ?>
                <option value="<?php echo $m?>"><?php echo $m?></option>
            <?php
              }
            ?>
          </select>
        </div>
        <div class="col-md-6">
          <label for="area" class="form-label">Area</label>
          <select id="area" name="area" class="form-select" required>
          <?php
            require_once "Area.php";
            $area = new Area();
            $result = $area->getAreas();
            if(!empty($result)){
              foreach($result as $k => $v){
          ?>
            <option value="<?php echo $result[$k]["ARE_CODIGO"];?>"><?php echo $result[$k]["ARE_NOMBRE"];?></option>
          <?php
              }
            }
          ?>
          </select>
        </div>
        <div class="col-md-12 btn-centrar mt-4">
          <input type="submit" name="add" id="add" class="btn btn-success" value="Agregar">
          <input type="reset" class="btn btn-primary" value="Cancelar">
        </div>
      </form>
    </div>
  </body>
</html>

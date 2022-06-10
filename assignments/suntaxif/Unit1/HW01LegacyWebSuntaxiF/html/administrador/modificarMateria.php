<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Agregar Area</title>

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
  </head>

  <body>
    <div class="container">
    <h3 class="text-center mt-4 text-primary">Modificar Materia</h3>
      <form class="g-3" action="" method="POST">
        <div class="row">
          <div class="col col-md-6">
            <label class="control-label col-sm-2" for="nivel">Nivel:</label>
            <select name="nivel" class="form-select">
              <option value="B">BGU</option>
              <option value="EB">EGB</option>
            </select>
          </div>
          <div class="col">
            <label class="control-label col-md-5" for="nombre"
              >Nombre Materia:</label
            >
            <div class="col-md-12">
              <input
                type="text"
                class="form-control"
                id="nombre"
                name="nombre"
                value = "<?php echo $result[0]["MAT_NOMBRE"];?>"
              />
            </div>
          </div>
        </div>
        <br /><br />
        <div class="form-group text-center">
          <div class="col-md-12 mt-4">
            <input type="submit" name="edit" id="edit" class="btn btn-success" value="Modificar">
          </div>
          <div class="col-md-12 mt-2">
          
			  <a href="actionsAdminMateria.php?action=seeMateria" class="btn btn-danger">Cancelar</a>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>

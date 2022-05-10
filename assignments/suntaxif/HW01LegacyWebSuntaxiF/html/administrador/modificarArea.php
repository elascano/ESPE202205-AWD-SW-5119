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
    <link rel="stylesheet" href="../css/estilosA.css" />
    <title>Modificar Área</title>
  </head>
  <body id="load">
    <div class="container">
    <h3 class="text-center mt-4 text-primary">Modificar Área</h3>
    <form
      method="post"
      id="formulario"
      class="row g-3 formulario"
    >
      <div class="container mt-4 contenedor">
        <!-- Nombre -->
        <div class="nombre formu-group" id="g-nombre">
          <label for="nombre" class="form-label formu-label">Nombre Área</label>
          <input
            type="text"
            class="form-control formu-input"
            id="nombre"
            name="nombre"
            for="nombre"
            value = "<?php echo $result[0]["ARE_NOMBRE"];?>"
          />
          <p class="form-text formu-input-error">
            Nombre incorrecto! Solo puede contener letras y espacios.
          </p>
        </div>
        
        <!-- Boton -->
        <div class="boton formu-group formu-group-btn-enviar col-md-12 text-center">
        <input type="submit" name="edit" id="edit" class="btn btn-success formu-btn" value="Modificar"/>
       <a href="actionsAdminArea.php?action=seeAreas" class="btn btn-danger">Cancelar</a>
        </div>
      </div>
    </form>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script src="../js/validacion.js"></script>
  </body>
</html>

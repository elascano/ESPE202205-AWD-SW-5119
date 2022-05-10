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
    <link rel="stylesheet" href="../css/estilosMA.css" />
    <title>Modificar Alumno</title>
  </head>
  <body id="load">
    <div class="container">
    <h3 class="text-center mt-4 text-primary">Modificar Alumno</h3>
    <form
      method="post"
      id="formulario"
      class="row g-3 formulario"
    >
      <div class="container mt-4 contenedor">
        <!-- Usuario -->
        <div class="usuario formu-group" id="g-usuario">
          <label for="usuario" class="form-label formu-label">Usuario</label>
          <input
            type="text"
            class="form-control formu-input"
            id="usuario"
            name="usuario"
            for="usuario"
            value = "<?php echo $result[0]["PER_USUARIO"];?>"
          />
          <p class="form-text formu-input-error">
            Cédula incorrecta! Solo debe contener dígitos y un guión.
            <br />2 dígitos (Cod Provincia) 7 dígitos - 1 dígito.
          </p>
        </div>
        <!-- Telefono -->
        <div class="telefono formu-group" id="g-telefono">
          <label for="telefono" class="form-label formu-label">Teléfono</label>
          <input
            type="text"
            class="form-control formu-input"
            id="telefono"
            name="telefono"
            for="telefono"
            maxlength="10"
            value = "<?php echo $result[0]["PER_TELEFONO"];?>"
          />
          <p class="form-text formu-input-error">
            Teléfono incorrecto! Solo puede contener dígitos y son 10.
          </p>
        </div>
        <!-- Email -->
        <div class="email formu-group" id="g-email">
          <label for="email" class="form-label formu-label">Email</label>
          <input
            type="email"
            class="form-control formu-input"
            id="email"
            name="email"
            for="email"
            maxlength="50"
            value = "<?php echo $result[0]["PER_CORREO"];?>"
          />
          <p class="form-text formu-input-error">
            Correo incorrecto! Ingrese un correo válido.
          </p>
        </div>
        
        <!-- Boton -->
        <div class="boton formu-group formu-group-btn-enviar col-md-12 text-center">
        <input type="submit" name="edit" id="edit" class="btn btn-success formu-btn" value="Confirmar"/>
        <input type="reset" class="btn btn-danger formu-btn" value="Cancelar"/>
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

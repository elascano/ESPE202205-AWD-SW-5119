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
    <link rel="stylesheet" href="../css/estilosC.css" />
    <title>Agregar Curso</title>
  </head>
  <body id="load">
    <div class="container">
    <h3 class="text-center mt-4 text-primary">Modificar Curso</h3>
    <form
      method="post"
      id="formulario"
      class="row g-3 formulario"
    >
      <div class="container mt-4 contenedor">
        <!-- Nombre -->
        <div class="curso formu-group" id="g-curso">
          <label for="curso" class="form-label formu-label">Nombre Curso</label>
          <input
            type="text"
            class="form-control formu-input"
            id="nombre"
            name="curso"
            for="curso"
            value="<?php echo $result[0]["CUR_CURSO"];?>"
			disabled
          />
          <p class="form-text formu-input-error">
            Nombre incorrecto! Solo puede contener letras y espacios.
          </p>
        </div>
        <!-- Paralelo -->
        <div class="paralelo formu-group" id="g-paralelo">
          <label for="paralelo" class="form-label formu-label">Paralelo</label>
          <input
            type="text"
            class="form-control formu-input"
            id="paralelo"
            name="paralelo"
            for="paralelo"
            value="<?php echo $result[0]["CUR_PARALELO"];?>"
          />
        </div>
        
        <!-- Boton -->
        <div class="boton formu-group formu-group-btn-enviar col-md-12 text-center">
        <input type="submit" name="add" id="add" class="btn btn-success formu-btn" value="Modificar"/>
        <p
        class="form-text formu-mensaje-correcto"
        id="formu-mensaje-correcto"
        >
        Se realizó con éxito!
      </p>
        <a href="actionsAdminCurso.php?action=seeCurso" class="btn btn-danger">Cancelar</a>
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

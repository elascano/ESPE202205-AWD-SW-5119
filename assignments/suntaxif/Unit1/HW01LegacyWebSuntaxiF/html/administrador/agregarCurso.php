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
    <h3 class="text-center mt-4 text-primary">Agregar Curso</h3>
    <form
      method="post"
      id="formulario"
      class="row g-3 formulario"
    >
      <div class="container mt-4 contenedor">
        <!-- Nombre -->
        <div class="curso formu-group">
          <label for="curso" class="form-label formu-label"
            >Curso</label
          >
          <select
            class="form-select formu-input"
            aria-label="Default select example"
            id="curso"
            name="curso"
            for="curso"
			required
          >
            <option value="3 BGU">3 Bachillerato General Unificado</option>
            <option value="2 BGU">2 Bachillerato General Unificado</option>
            <option value="1 BGU">1 Bachillerato General Unificado</option>
            <option value="10">10 Educación General Básica</option>
            <option value="9">9 Educación General Básica</option>
            <option value="8">8 Educación General Básica</option>
            <option value="7">7 Educación General Básica</option>
            <option value="6">6 Educación General Básica</option>
            <option value="5">5 Educación General Básica</option>
            <option value="4">4 Educación General Básica</option>
            <option value="3">3 Educación General Básica</option>
            <option value="2">2 Educación General Básica</option>
            
          </select>
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
            maxlength="1"
            placeholder="Paralelo"
            pattern="[A-Z]"
            required
          />
        </div>
        
        <!-- Boton -->
        <div class="boton formu-group formu-group-btn-enviar col-md-12 text-center">
        <input type="submit" name="add" id="add" class="btn btn-success formu-btn" value="Agregar"/>
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

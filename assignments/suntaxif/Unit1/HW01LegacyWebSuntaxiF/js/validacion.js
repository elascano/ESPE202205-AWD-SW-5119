/*Constantes que obtenemos desde el formulario */
const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll("#formulario input");

// Expresiones Regulares a utilizar
const expresiones = {
  nombre: /^[aA-zA-ZÀ-ÿ\s]{1,40}$/,
  apellido: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
  cedula: /^[0-2][1-9]\d{7}-\d{1}$/,
  telefono: /^\d{10,10}$/,
  email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
};
const campos = {
  nombre: false,
  apellido: false,
  cedula: false,
  telefono: false,
  email: false,
};
/*Funcion para validar el formulario */
const validarFormulario = (e) => {
  switch (e.target.name) {
    case "nombre": {
      validarCampo(expresiones.nombre, e.target, "nombre");
      break;
    }
    case "apellido": {
      validarCampo(expresiones.apellido, e.target, "apellido");
      break;
    }
    case "cedula": {
      validarCampo(expresiones.cedula, e.target, "cedula");
      break;
    }
    case "telefono": {
      validarCampo(expresiones.telefono, e.target, "telefono");
      break;
    }
    case "email": {
      validarCampo(expresiones.email, e.target, "email");
      break;
    }
  }
};

/*Funcion para validar los campos */
const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document
      .getElementById(`g-${campo}`)
      .classList.remove("formu-group-incorrecto");
    document.getElementById(`g-${campo}`).classList.add("formu-group-correcto");
    document
      .querySelector(`#g-${campo} .formu-input-error`)
      .classList.remove("formu-input-error-activo");
    campos[campo] = true;
  } else {
    document
      .getElementById(`g-${campo}`)
      .classList.add("formu-group-incorrecto");
    document
      .getElementById(`g-${campo}`)
      .classList.remove("formu-group-correcto");
    document
      .querySelector(`#g-${campo} .formu-input-error`)
      .classList.add("formu-input-error-activo");
    campos[campo] = false;
  }
};

/*Generacion de dos eventos */
inputs.forEach((input) => {
  input.addEventListener("keyup", validarFormulario);
  input.addEventListener("blur", validarFormulario);
});

/*Definimos los campos en default */
formulario.addEventListener("submit", (e) => {
  if (
    campos.nombre &&
    campos.apellido &&
    campos.cedula &&
    campos.telefono &&
    campos.email
  ) {
    document
      .getElementById("formu-mensaje-correcto")
      .classList.add("formu-mensaje-correcto-activo");
    setTimeout(() => {
      document
        .getElementById("formu-mensaje-correcto")
        .classList.remove("formu-mensaje-correcto-activo");
    }, 2000);
    document
      .getElementById("formu-mensaje")
      .classList.remove("formu-mensaje-activo");
  } else {
    document
      .getElementById("formu-mensaje")
      .classList.add("formu-mensaje-activo");
  }
});

/*Validar Cédula Ecuatoriana */
function validarCedula() {
  var cad = document.getElementById("ced").value.trim();
  var total = 0;
  var longitud = cad.length;
  var longcheck = longitud - 1;

  if (cad !== "" && longitud === 10) {
    for (i = 0; i < longcheck; i++) {
      if (i % 2 === 0) {
        var aux = cad.charAt(i) * 2;
        if (aux > 9) aux -= 9;
        total += aux;
      } else {
        total += parseInt(cad.charAt(i));
      }
    }

    total = total % 10 ? 10 - (total % 10) : 0;

    if (cad.charAt(longitud - 1) == total) {
      document.getElementById("salida").innerHTML = "Cedula Válida";
    } else {
      document.getElementById("salida").innerHTML = "Cedula Inválida";
    }
  }
}

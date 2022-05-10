const formulario = document.getElementById('frm1');
const inputs = document.querySelectorAll('#frm1 input');		
	const expresiones = {	

        identificacion:/^[0-9]{10}$/,
		nombres: /^[A-ZÀ-ÿ\s]{4,30}$/,
		apellidos: /^[A-ZÀ-ÿ\s]{4,30}$/, 
        nacionalidad: /^[A-ZÀ-ÿ\s]{4,30}$/,
        titulo:/^[A-ZÀ-ÿ\s]{4,40}$/,
		pais: /^[A-ZÀ-ÿ\s]{4,40}$/, 
        provinciaN: /^[A-ZÀ-ÿ\s]{4,20}$/,
        parroquiaR: /^[A-ZÀ-ÿ\s]{4,20}$/,
        domicilio: /^[A-ZÀ-ÿ\s]{4,60}$/,
        celular: /^[0-9]{9}$/,
        email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
        votacion: /^[0-9]{8}$/,
        user: /^[a-zA-Z0-9_.+-]{6,15}$/,
        pass: /^[a-zA-Z0-9_.+-]{6,15}$/
	}
	const campos = {
        c1: false,
        c2: false,
		c3: false,
		c4: false,
		c6: false,
		c8: false,
        c9: false,
        c12: false,
        c13: false,
        c17: false,
        c18: false,        
        c21: false,
        c22: false,
        c23: false        
	}


	const validarFormulario = (e) => {
		switch (e.target.name) {			
			case "identificacion":
				validarCampo(expresiones.identificacion, e.target,'c1');     				
			break;

			case "nombres":
				validarCampo(expresiones.nombres, e.target,'c2');				
			break;

			case "apellidos":
				validarCampo(expresiones.apellidos, e.target,'c3');
			break;
			case "nacionalidad":
				validarCampo(expresiones.nacionalidad, e.target,'c4');
			break;
			case "titulo":
				validarCampo(expresiones.titulo, e.target,'c6');
			break;
			case "pais":
				validarCampo(expresiones.pais, e.target,'c8');
			break;
            case "provinciaN":
				validarCampo(expresiones.provinciaN, e.target, 'c9');
			break;
            case "parroquiaR":
				validarCampo(expresiones.parroquiaR, e.target, 'c12');
			break;
            case "domicilio":
				validarCampo(expresiones.domicilio, e.target, 'c13');
			break;                                    
            case "celular":
				validarCampo(expresiones.celular, e.target, 'c17');
			break;
            case "email":
				validarCampo(expresiones.email, e.target, 'c18');
			break; 
            case "votacion":
				validarCampo(expresiones.votacion, e.target, 'c21');
			break;                   
            case "user":
				validarCampo(expresiones.user, e.target, 'c22');
			break;    
            case "pass":
				validarCampo(expresiones.pass, e.target, 'c23');
			break;                                  
		}
	}
    
    const validarCampo = (expresion, input,campo) => {
    
    if(expresion.test(input.value)){    
		document.querySelector(`#${campo} span .icono`).classList.add('icono-bien');																																	        					
        document.querySelector(`#${campo} span .icono_error`).classList.remove('icono-mal');        
		campos[campo]=true;		
    }else{										
		document.querySelector(`#${campo} span .icono`).classList.remove('icono-bien');											        				
        document.querySelector(`#${campo} span .icono_error`).classList.add('icono-mal');

		campos[campo]=false;
    }
}
    
document.getElementById('identificacion').addEventListener('input',function(){        
	valor = document.getElementById('cedulaValidada');      
	var cad = document.getElementById("identificacion").value.trim();
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
		  total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
		}
	}

	total = total % 10 ? 10 - total % 10 : 0;

	if (cad.charAt(longitud - 1) == total) {		
		valor.innerText = "Cedula Válida";
	} else {		
		valor.innerText = "Cedula Inválida";
		
	}
	}
});
	inputs.forEach((input) => {
		input.addEventListener('keyup', validarFormulario);
		input.addEventListener('blur', validarFormulario);
	});	
	
    formulario.addEventListener("submit", (e) =>{	        
            if(campos.c1 && campos.c2 && campos.c3 && campos.c4 && campos.c6 && campos.c8 && campos.c9 && campos.c12 && 
                campos.c13 && campos.c17 && campos.c18 && campos.c21 && campos.c22 && campos.c23){                                
                    formulario.reset();
            }else{                
                alert("No cumple con las restricciones solicitadas, corrija los datos");                    								
                e.preventDefault()
            }
        });	
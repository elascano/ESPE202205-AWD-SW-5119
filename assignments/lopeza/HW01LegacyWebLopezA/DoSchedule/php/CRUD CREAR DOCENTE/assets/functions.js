function objectAjax(){
	var xmlhttp = false;
	try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e){
		try{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");			
		} catch (E){
			xmlhttp = false;	
		}		
	}
	if(!xmlhttp && typeof XMLHttpRequest!='undefined'){
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
//Inicializo automaticamente la funcion read al entrar a la pagina o recargar la pagina;
addEventListener('load', read, false);

function read(){
        $.ajax({        
        type: 'POST',
                url:   '?c=administrator&m=table_users',               
                beforeSend: function () {
                        $("#information").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#information").html(response);
                }
        });
}

function table_docentes(){
	$.ajax({        
	type: 'POST',
			url:   '?c=administrator&m=table_docentes',               
			beforeSend: function () {
					$("#information").html("Procesando, espere por favor...");
			},
			success:  function (response) {
					$("#information").html(response);
			}
	});
}


function register(){
	origen 		= document.formUser.origen.value;
	identificacion = document.formUser.identificacion.value;
	nombres 		= document.formUser.nombres.value;
	apellidos = document.formUser.apellidos.value;
	nacionalidad = document.formUser.nacionalidad.value;
	genero = document.formUser.genero.value;
	titulo = document.formUser.titulo.value;
	materia = document.formUser.materia.value;
	pais = document.formUser.pais.value;
	provinciaN = document.formUser.provinciaN.value;
	provinciaR = document.formUser.provinciaR.value;
	cantonR = document.formUser.cantonR.value;
	parroquiaR = document.formUser.parroquiaR.value;
	domicilio = document.formUser.domicilio.value;
	nacimiento = document.formUser.nacimiento.value;
	prefijo1 = document.formUser.prefijo1.value;
	telefonoD= document.formUser.telefonoD.value;
	extencion = document.formUser.extencion.value;
	estadoC = document.formUser.estadoC.value;
	prefijo2 = document.formUser.prefijo2.value;
	celular = document.formUser.celular.value;
	email = document.formUser.email.value;
	discapacidad = document.formUser.discapacidad.value;
	carne = document.formUser.carne.value;
	votacion = document.formUser.votacion.value;
	user = document.formUser.user.value;
	pass = document.formUser.pass.value;


//let passencrypt = encriptarPass(pass.value);

	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=registeruser", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();			
			alert('Los datos se guardaron correctamente.');			
			$('#addUser').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("origen="+origen+"&identificacion="+identificacion+"&nombres="+nombres+"&apellidos="+apellidos+"&nacionalidad="+nacionalidad+"&genero="+genero+"&titulo="+titulo+"&materia="+materia+"&pais="+pais+"&provinciaN="+provinciaN+"&provinciaR="+provinciaR+"&cantonR="+cantonR+"&parroquiaR="+parroquiaR+"&domicilio="+domicilio+"&nacimiento="+nacimiento+"&prefijo1="+prefijo1+"&telefonoD="+telefonoD+"&extencion="+extencion+"&estadoC="+estadoC+"&prefijo2="+prefijo2+"&celular="+celular+"&email="+email+"&discapacidad="+discapacidad+"&carne="+carne+"&votacion="+votacion+"&user="+user+"&pass="+pass);
}	

function update(){
	codigo = document.formUserUpdate.codigo.value;
	origen 		= document.formUserUpdate.origen.value;
	identificacion = document.formUserUpdate.identificacion.value;
	nombres 		= document.formUserUpdate.nombres.value;
	apellidos = document.formUserUpdate.apellidos.value;
	nacionalidad = document.formUserUpdate.nacionalidad.value;
	genero = document.formUserUpdate.genero.value;
	titulo = document.formUserUpdate.titulo.value;
	materia = document.formUserUpdate.materia.value;
	pais = document.formUserUpdate.pais.value;
	provinciaN = document.formUserUpdate.provinciaN.value;
	provinciaR = document.formUserUpdate.provinciaR.value;
	cantonR = document.formUserUpdate.cantonR.value;
	parroquiaR = document.formUserUpdate.parroquiaR.value;
	domicilio = document.formUserUpdate.domicilio.value;
	nacimiento = document.formUserUpdate.nacimiento.value;
	prefijo1 = document.formUserUpdate.prefijo1.value;
	telefonoD= document.formUserUpdate.telefonoD.value;
	extencion = document.formUserUpdate.extencion.value;
	estadoC = document.formUserUpdate.estadoC.value;
	prefijo2 = document.formUserUpdate.prefijo2.value;
	celular = document.formUserUpdate.celular.value;
	email = document.formUserUpdate.email.value;
	discapacidad = document.formUserUpdate.discapacidad.value;
	carne = document.formUserUpdate.carne.value;
	votacion = document.formUserUpdate.votacion.value;
	user = document.formUserUpdate.user.value;
	pass = document.formUserUpdate.pass.value;
	
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=updateuser", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){
			read();
			alert('Los datos se actualizaron correctamente.');	
			$('#updateUser').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("origen="+origen+"&identificacion="+identificacion+"&nombres="+nombres+"&apellidos="+apellidos+"&nacionalidad="+nacionalidad+"&genero="+genero+"&titulo="+titulo+"&materia="+materia+"&pais="+pais+"&provinciaN="+provinciaN+"&provinciaR="+provinciaR+"&cantonR="+cantonR+"&parroquiaR="+parroquiaR+"&domicilio="+domicilio+"&nacimiento="+nacimiento+"&prefijo1="+prefijo1+"&telefonoD="+telefonoD+"&extencion="+extencion+"&estadoC="+estadoC+"&prefijo2="+prefijo2+"&celular="+celular+"&email="+email+"&discapacidad="+discapacidad+"&carne="+carne+"&votacion="+votacion+"&user="+user+"&pass="+pass+"&codigo="+codigo);

}

function deleteUser(codigo){	
	if(confirm('¿Esta seguro de eliminar este registro?')){						
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=deleteuser", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();		
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("codigo="+codigo);
	}
}

function ModalRegister(){
	$('#addUser').modal('show');
}

function ModalUpdate(codigo,origen,identificacion,nombres,apellidos,nacionalidad,genero,titulo,materia,pais,provinciaN,provinciaR,cantonR,parroquiaR,domicilio,nacimiento,prefijo1,telefonoD,extencion,estadoC,prefijo2,celular,email,discapacidad,carne,votacion,user,pass){			
	$('#updateUser').modal('show');	
	document.formUserUpdate.codigo.value = codigo;
	document.formUserUpdate.origen.value = origen;
	document.formUserUpdate.identificacion.value = identificacion;
	document.formUserUpdate.nombres.value = nombres;
	document.formUserUpdate.apellidos.value	= apellidos;
	document.formUserUpdate.nacionalidad.value = nacionalidad;
	document.formUserUpdate.genero.value = genero;
	document.formUserUpdate.titulo.value = titulo;
	document.formUserUpdate.materia.value = materia;
	document.formUserUpdate.pais.value 	= pais;
	document.formUserUpdate.provinciaN.value = provinciaN;
	document.formUserUpdate.provinciaR.value = provinciaR;
	document.formUserUpdate.cantonR.value = cantonR;
	document.formUserUpdate.parroquiaR.value = parroquiaR;
	document.formUserUpdate.domicilio.value = domicilio;
	document.formUserUpdate.nacimiento.value = nacimiento;
	document.formUserUpdate.prefijo1.value 	= prefijo1;
	document.formUserUpdate.telefonoD.value = telefonoD;
	document.formUserUpdate.extencion.value = extencion;
	document.formUserUpdate.estadoC.value = estadoC;
	document.formUserUpdate.prefijo2.value = prefijo2;
	document.formUserUpdate.celular.value = celular;
	document.formUserUpdate.email.value = email;
	document.formUserUpdate.discapacidad.value = discapacidad;
	document.formUserUpdate.carne.value = carne;
	document.formUserUpdate.votacion.value	= votacion;
	document.formUserUpdate.user.value = user;
	document.formUserUpdate.pass.value = pass;		
}

function estadoD(codigo,estado){	
	if(confirm('¿Esta seguro de desactivar este registro?')){						
		ajax = objectAjax();
		ajax.open("POST", "?c=administrator&m=estadodocente", true);
		ajax.onreadystatechange=function() {
			if(ajax.readyState==4){			
				read();		
			}
		}
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("codigo="+codigo+"&estado="+estado);
		}
}

function estadoA(codigo,estado){	
	if(confirm('¿Esta seguro de activar este registro?')){						
		ajax = objectAjax();
		ajax.open("POST", "?c=administrator&m=estadodocenteA", true);
		ajax.onreadystatechange=function() {
			if(ajax.readyState==4){			
				table_docentes();		
			}
		}
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("codigo="+codigo+"&estado="+estado);
		}
}





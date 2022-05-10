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
                url:   '?c=administrator&m=table_areas',               
                beforeSend: function () {
                        $("#information").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#information").html(response);
                }
        });
}

function register(){
	name 		= document.formArea.name.value;
	programa_estudios 	= document.formArea.programa_estudios.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=registerarea", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();			
			alert('Los datos guardaron correctamente.');			
			$('#addArea').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("name="+name+"&programa_estudios="+programa_estudios);
}	

function update(){
	id 			= document.formAreaUpdate.id.value;
	name 		= document.formAreaUpdate.name.value;
	programa_estudios 	= document.formAreaUpdate.programa_estudios.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=updatearea", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){
			read();
			$('#updateArea').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("name="+name+"&programa_estudios="+programa_estudios+"&id="+id);
}

function deleteArea(id){	
	if(confirm('¿Esta seguro de eliminar este registro?')){						
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=deletearea", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();		
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+id);
	}
}

function borrarArea(){
	id 			= document.formAreaBorrar.id.value;
	estado 		= document.formAreaBorrar.estado.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=borrararea", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){
			read();
			$('#borrarArea').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("estado="+estado+"&id="+id);
}

function ModalRegister(){
	$('#addArea').modal('show');
}

function ModalUpdate(id,name,programa_estudios){			
	document.formAreaUpdate.id.value 			= id;
	document.formAreaUpdate.name.value 			= name;
	document.formAreaUpdate.programa_estudios.value 	= programa_estudios;
	$('#updateArea').modal('show');
}

function ModalBorrar(id,estado){
	document.formAreaBorrar.id.value = id;
	document.formAreaBorrar.estado.value = estado;
	$('#borrarArea').modal('show');
}
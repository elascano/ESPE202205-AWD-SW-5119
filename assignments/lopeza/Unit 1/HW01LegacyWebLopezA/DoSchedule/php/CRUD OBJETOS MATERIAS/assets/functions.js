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
                url:   '?c=administrator&m=table_materias',               
                beforeSend: function () {
                        $("#information").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#information").html(response);
                }
        });
}

function register(){
	name 		= document.formMateria.name.value;
	programa_estudios 	= document.formMateria.programa_estudios.value;
	area = document.formMateria.area.value;
	horaria = document.formMateria.horaria.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=registermateria", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();
			alert('Los datos guardaron correctamente.');
			$('#addMateria').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("name="+name+"&programa_estudios="+programa_estudios+"&area="+area+"&horaria="+horaria);
}	

function update(){
	id 			= document.formMateriaUpdate.id.value;
	name 		= document.formMateriaUpdate.name.value;
	programa_estudios 	= document.formMateriaUpdate.programa_estudios.value;
	area = document.formMateriaUpdate.area.value;
	horaria = document.formMateriaUpdate.horaria.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=updatemateria", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){
			read();
			$('#updateMateria').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("name="+name+"&programa_estudios="+programa_estudios+"&area="+area+"&horaria="+horaria+"&id="+id);
}

function borrarMateria(){
	id 			= document.formMateriaBorrar.id.value;
	estado 		= document.formMateriaBorrar.estado.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=borrarmateria", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){
			read();
			$('#borrarMateria').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("estado="+estado+"&id="+id);
}

function deleteMateria(id){	
	if(confirm('¿Esta seguro de eliminar este registro?')){						
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=deletemateria", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();		
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+id);
	}
}

function ModalRegister(){
	$('#addMateria').modal('show');
}

function ModalUpdate(id,name,programa_estudios,area,horaria){			
	document.formMateriaUpdate.id.value 			= id;
	document.formMateriaUpdate.name.value 			= name;
	document.formMateriaUpdate.programa_estudios.value 	= programa_estudios;
	document.formMateriaUpdate.area.value 			= area;
	document.formMateriaUpdate.horaria.value 			= horaria;
	$('#updateMateria').modal('show');
}

function ModalBorrar(id, estado){
	document.formMateriaBorrar.id.value = id;
	document.formMateriaBorrar.estado.value = estado;
	$('#borrarMateria').modal('show');
}
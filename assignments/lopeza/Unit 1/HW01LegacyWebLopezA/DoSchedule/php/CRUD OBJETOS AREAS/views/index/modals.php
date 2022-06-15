	<div id="addArea" class="modal fade" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar nueva área</h4>
    </div>
    <div class="modal-body">
		<form name="formArea" onsubmit="register(); return false">
		<p>Nombre del Área:</p>
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
		<input id="name" type="text" class="form-control" name="name" placeholder="Nombre del área" required autocomplete="off">
		</div>
		<br>
		<p>Programa de Estudios:</p>
		<div class="input-group">
		  <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
          <select type="select" name="programa_estudios" id="id_programa_estudios" class="form-control" required autocomplete="off">
            <option value="EGB">Educación General Básica Superior(EGB)</option>
            <option value="BGU">Bachillerato General Unificado(BGU)</option>
          </select>
		</div>
		<br>		  
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Registrar</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
		</form>
    </div>
    </div>
</div>
</div>


<div id="updateArea" class="modal fade" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Actualizar informacion área </h4>        
    </div>
    <div class="modal-body">
		<form name="formAreaUpdate" onsubmit="update(); return false">
		<input type="text" name="id" id="id" style="display: none;">
		<p>Nombre del Área:</p>
		<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
		<input id="name" type="text" class="form-control" name="name" placeholder="Nombre del área" required autocomplete="off">
		</div>
		<br>
		<p>Programa de Estudios:</p>
		<div class="input-group">
		  <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
          <select type="select" name="programa_estudios" id="id_programa_estudios" class="form-control" required autocomplete="off">
            <option value="EGB">Educación General Básica Superior(EGB)</option>
            <option value="BGU">Bachillerato General Unificado(BGU)</option>
          </select>
		</div>
		<br>		  
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Actualizar</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
		</form>
    </div>
    </div>
</div>
</div>

<div id="borrarArea" class="modal fade" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Actualizar estado área</h4>        
    </div>
    <div class="modal-body">
		<form name="formAreaBorrar" onsubmit="borrarArea(); return false">
		<input type="text" name="id" id="id" style="display: none;">
		<p>Estado: </p>
		<div class="input-group">
		  <span class="input-group-addon"><i class="glyphicon glyphicon-trash"></i></span>
          <select type="select" name="estado" id="estado" class="form-control" required autocomplete="off">
            <option value="1">1 (Activo)</option>
            <option value="0">0 (Inactivo)</option>
          </select>
		</div>
		<br>
	    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Actualizar estado</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
		</form>
    </div>
    </div>
</div>
</div>
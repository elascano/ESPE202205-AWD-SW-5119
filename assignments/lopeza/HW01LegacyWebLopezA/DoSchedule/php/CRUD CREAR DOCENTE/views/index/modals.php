
<?php
$mysqli = new mysqli('localhost', 'admin', 'admin', 'horarios');
?>
<div id="addUser" class="modal fade" role="dialog">
<div class="modal-dialog">
	<script src="https://kit.fontawesome.com/474492a430.js" crossorigin="anonymous"></script>          
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">AGREGAR NUEVO DOCENTE</h4>
    </div>
    <div class="principal modal-body">
		<form id="frm1" name="formUser" onsubmit="register(); return false">
		<div id="c0" class="input-group">
		<span class="input-group-addon"><i class="fas fa-map-pin"></i> ORIGEN:</span>
		<select name="origen" id="origen" class="form-control" required autocomplete="off">
        <option value="">SELECCIONAR</option>
        <option value="NATIVO/A">NATIVO/A</option>
        <option value="EXTRANJERO/A">EXTRANJERO/A</option>        
        </select>        
		</div>
		<br>
		<div id="c1" class="input-group">
		<span class="input-group-addon"><i class="far fa-address-card"></i> IDENTIFICACION:</span>        
		<input id="identificacion" type="text" step="any" class="form-control" pattern="[0-9]+" minlength="10" maxlength="10" name="identificacion" placeholder="Identificación" required autocomplete="off">
        <span class="input-group-addon" id="cedulaValidada"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>        
		</div>        
		<br>
		<div  id="c2" class="input-group">
		<span class="input-group-addon"><i class="fas fa-user"></i> NOMBRES:</span>
        <div class="input-group">
		<input id="nombres" type="text" class="form-control" name="nombres" pattern="[A-ZÀ-ÿ\s]+" placeholder="Nombres" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
        </div>
		</div>
		<br>
		<div id="c3" class="input-group">
		<span class="input-group-addon"><i class="fas fa-user"></i> APELLIDOS:</span>
		<input id="apellidos" type="text" class="form-control" name="apellidos" placeholder="Apellidos" pattern="[A-ZÀ-ÿ\s]+" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c4" class="input-group">
		<span class="input-group-addon"><i class="fas fa-flag"></i> NACIONALIDAD</span>
		<input id="nacionalidad" type="text" class="form-control" name="nacionalidad" placeholder="Nacionalidad" pattern="[A-ZÀ-ÿ\s]+" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>        
		<div id="c5" class="input-group">        
		<span class="input-group-addon"><i class="fas fa-venus-mars"></i> GENERO:</span>
		<select name="genero" id="genero" class="form-control" required autocomplete="off">
                <option value="">SELECCIONAR</option>
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMENINO">FEMENINO</option>        
                <option value="OTRO">OTRO</option>        
            </select>            
		</div>
		<br>
		<div id="c6" class="input-group">
		<span class="input-group-addon"><i class="fas fa-book"></i> TITULO:</span>
		<input id="titulo" type="text" class="form-control" name="titulo" placeholder="Título Académico" pattern="[A-ZÀ-ÿ\s]+" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
        <br>        
		<div id="c7" class="input-group">        
		<span class="input-group-addon"><i class="fas fa-book"></i> MATERIA:</span>
		<select name="materia" id="materia" class="form-control" required autocomplete="off">
        <option value="">SELECCIONAR</option>
                <?php
            $query = $mysqli -> query ("SELECT * FROM pr_materias");
            while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[mat_nombre].'">'.$valores[mat_nombre].'</option>';
        }
        ?>      
            </select>            
		</div>
		<br>        
		<div id="c8" class="input-group">
		<span class="input-group-addon"><i class="fas fa-globe-americas"></i> PAIS NACIMIENTO</span>
		<input id="pais" type="text" class="form-control" name="pais"  placeholder="País" pattern="[A-ZÀ-ÿ\s]+" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c9" class="input-group">
		<span class="input-group-addon"><i class="fas fa-street-view"></i> PROVINCIA NACIMIENTO</span>
		<input id="provinciaN" type="text" class="form-control" name="provinciaN" placeholder="Provincia de Nacimiento" pattern="[A-ZÀ-ÿ\s]+" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c10" class="input-group">
		<span class="input-group-addon"><i class="far fa-map"></i> PROVINCIA RESIDENCIA</span>
		<select name="provinciaR" id="provinciaR" class="form-control" required autocomplete="off">
        <option value="">SELECCIONAR</option>
        <option value="AZUAY">AZUAY</option>
        <option value="BOLIVAR">BOLIVAR</option>
        <option value="CAÑAR">CAÑAR</option>
        <option value="CARCHI">CARCHI</option>
        <option value="CHIMBORAZO">CHIMBORAZO</option>
        <option value="COTOPAXI">COTOPAXI</option>
        <option value="EL ORO">EL ORO</option>
        <option value="ESMERALDAS">ESMERALDAS</option>
        <option value="GALÁPAGOS">GALÁPAGOS</option>
        <option value="GUAYAS">GUAYAS</option>
        <option value="IMBABURA">IMBABURA</option>
        <option value="LOJA">LOJA</option>
        <option value="LOS RÍOS">LOS RÍOS</option>
        <option value="MANABÍ">MANABÍ</option>
        <option value="MORONA SANTIAGO">MORONA SANTIAGO</option>
        <option value="NAPO">NAPO</option>
        <option value="ORELLANA">ORELLANA</option>
        <option value="PASTAZA">PASTAZA</option>
        <option value="PICHINCHA">PICHINCHA</option>
        <option value="SANTA ELENA">SANTA ELENA</option>
        <option value="SANTO DOMINGO DE LOS TSÁCHILAS">SANTO DOMINGO DE LOS TSÁCHILAS</option>
        <option value="SUCUMBÍOS">SUCUMBÍOS</option>
        <option value="TUNGURAHUA">TUNGURAHUA</option>
        <option value="ZAMORA CHINCHIPE">ZAMORA CHINCHIPE</option>        
        </select>	        
		</div>
		<br>
		<div  id="c11" class="input-group">
		<span class="input-group-addon"><i class="far fa-map"></i> CANTON RESIDENCIA</span>
		<select name="cantonR" id="cantonR" class="form-control">
        <option value="">SELECCIONAR</option>
        <option value="AGUARICO">AGUARICO</option>
        <option value="ALAUSI">ALAUSI</option>
        <option value="ALFREDO BAQUERIZO MORENO JUJAN">ALFREDO BAQUERIZO MORENO JUJAN</option>
        <option value="AMBATO">AMBATO</option>
        <option value="ANTONIO ANTE">ANTONIO ANTE</option>
        <option value="ARAJUNDO">ARAJUNDO</option>
        <option value="ARCHIDONA">ARCHIDONA</option>
        <option value="ARENILLAS">ARENILLAS</option>
        <option value="ATACAMES">ATACAMES</option>
        <option value="ATAHUALPA">ATAHUALPA</option>
        <option value="AZOGUES">AZOGUES</option>
        <option value="BABA">BABA</option>
        <option value="BABAHOYO">BABAHOYO</option>
        <option value="BALAO">BALAO</option>
        <option value="BALSAS">BALSAS</option>
        <option value="BALZAR">BALZAR</option>
        <option value="BAÑOS DE AGUA SANTA">BAÑOS DE AGUA SANTA</option>
        <option value="BIBLIAN">BIBLIAN</option>
        <option value="BOLIVAR">BOLIVAR</option>
        <option value="BUENA FE">BUENA FE</option>
        <option value="CALUMA">CALUMA</option>
        <option value="CAMILO PONCE ENRIQUEZ">CAMILO PONCE ENRIQUEZ</option>
        <option value="CAÑAR">CAÑAR</option>
        <option value="CARLOS JULIO AROSEMENA TOLA">CARLOS JULIO AROSEMENA TOLA</option>        
        <option value="CASCALES">CASCALES</option>
        <option value="CATAMAYO">CATAMAYO</option>
        <option value="CAYAMBE">CAYAMBE</option>
        <option value="CELICA">CELICA</option>
        <option value="CENTINELA DEL CONDOR">CENTINELA DEL CONDOR</option>
        <option value="CEVALLOS">CEVALLOS</option>
        <option value="CHAGUARPAMPA">CHAGUARPAMPA</option>
        <option value="CHAMBO">CHAMBO</option>
        <option value="CHILLA">CHILLA</option>
        <option value="CHILLANES">CHILLANES</option>
        <option value="CHIMBO">CHIMBO</option>
        <option value="CHINCHIPE">CHINCHIPE</option>
        <option value="CHONE">CHONE</option>
        <option value="CHORDELEG">CHORDELEG</option>
        <option value="CHUNCHI">CHUNCHI</option>
        <option value="COLIMES">COLIMES</option>
        <option value="COLTA">COLTA</option>
        <option value="CORONEL MARCELINO MARIDUEÑA">CHONE</option>
        <option value="COTACACHI">COTACACHI</option>
        <option value="CUENCA">CUENCA</option>
        <option value="CUMANDA">CUMANDA</option>
        <option value="CUYABENO">CUYABENO</option>
        <option value="DAULE">DAULE</option>
        <option value="DELEG">DELEG</option>
        <option value="DURAN">DURAN</option>
        <option value="ECHEANDIA">ECHEANDIA</option>
        <option value="EL CARMEN">EL CARMEN</option>
        <option value="EL CHACO">EL CHACO</option>
        <option value="EL EMPALME">EL EMPALME</option>
        <option value="EL GUABO">EL GUABO</option>
        <option value="EL PAN">EL PAN</option>
        <option value="EL PANGUI">EL PANGUI</option>
        <option value="EL PIEDRERO">EL PIEDRERO</option>
        <option value="EL TAMBO">EL TAMBO</option>
        <option value="EL TRIUNFO">EL TRIUNFO</option>
        <option value="ELOY ALFARO">DAULE</option>
        <option value="ESMERALDAS">ESMERALDAS</option>
        <option value="ESPEJO">ESPEJO</option>
        <option value="ESPINDOLA">ESPINDOLA</option>
        <option value="FLAVIO ALFARO">FLAVIO ALFARO</option>
        <option value="GENERAL ANTONIO ELIZALDE">GENERAL ANTONIO ELIZALDE</option>
        <option value="GIRON">GIRON</option>
        <option value="GONZALO PIZARRO">GONZALO PIZARRO</option>
        <option value="GONZANAMA">GONZANAMA</option>
        <option value="GUACHAPALA">GUACHAPALA</option>
        <option value="GUALACEO">GUALACEO</option>
        <option value="GUALAQUIZA">GUALAQUIZA</option>
        <option value="GUAMOTE">GUAMOTE</option>
        <option value="GUANO">GUANO</option>
        <option value="GUARANDA">GUARANDA</option>
        <option value="GUAYAQUIL">GUAYAQUIL</option>
        <option value="HUAMBOYA">HUAMBOYA</option>
        <option value="HUAQUILLAS">HUAQUILLAS</option>
        <option value="IBARRA">IBARRA</option>
        <option value="ISABELA">ISABELA</option>
        <option value="ISIDRO AYORA">ISIDRO AYORA</option>
        <option value="JAMA">JAMA/option>
        <option value="JARAMILLO">JARAMILLO</option>
        <option value="JIPIJAPA">JIPIJAPA</option>
        <option value="JUNIN">JUNIN</option>
        <option value="LA CONCORDIA">LA CONCORDIA</option>
        <option value="LA JOYA DE LOS SACHAS">LA JOYA DE LOS SACHAS</option>
        <option value="LA LIBERTAD">LA LIBERTAD</option>
        <option value="LA MANA">LA MANA</option>
        <option value="LA TRONCAL">LA TRONCAL</option>
        <option value="LAGO AGRIO">LAGO AGRIO</option>
        <option value="LAS GOLONDRINAS">LAS GOLONDRINAS</option>
        <option value="LA LAJAS">LAS LAJAS</option>
        <option value="LAS NAVES">LAS NAVES</option>
        <option value="LATACUNGA">LATACUNGA</option>
        <option value="LIMON INDANZA">LIMON INDANZA</option>
        <option value="LOGROÑO">LOGROÑO</option>
        <option value="LOJA">LOJA</option>
        <option value="LOMAS DE SARGENTILLO">LOMAS DE SARGENTILLO</option>
        <option value="LORETO">LORETO</option>
        <option value="MACARA">MACARA</option>
        <option value="MACHALA">MACHALA</option>
        <option value="MANGA DEL CURA">MANGA DEL CURA</option>
        <option value="MANTA">MANTA</option>
        <option value="MARCABELI">MARCABELI</option>
        <option value="MEJIA">MEJIA</option>
        <option value="MERA">MERA</option>
        <option value="MILAGRO">MILAGRO</option>
        <option value="MIRA">MIRA</option>
        <option value="MOCACHE">MOCACHE</option>
        <option value="MOCHA">MOCHA</option>
        <option value="MONTALVO">MONTALVO</option>
        <option value="MONTECRISTI">MONTECRISTI</option>
        <option value="MONTUFAR">MONTUFAR</option>
        <option value="MORONA">MORONA</option>
        <option value="MUISNE">MUISNE</option>
        <option value="NABON">NABON</option>
        <option value="NANGARITZA">NANGARITZA</option>
        <option value="NARANJAL">NARANJAL</option>
        <option value="NARANJITO">NARANJITO</option>
        <option value="NO DEFINIDA EXTRANJERO">NO DEFINIDA EXTRANJERO</option>
        <option value="NOBOL">NOBOL</option>
        <option value="OLMEDO">OLMEDO</option>
        <option value="OÑA">OÑA</option>
        <option value="ORELLANA">ORELLANA</option>
        <option value="OTAVALO">OTAVALO</option>
        <option value="OTRO">OTRO</option>
        <option value="PABLO SEXTO">PABLO SEXTO</option>
        <option value="PAJAN">PAJAN</option>
        <option value="PALANDA">PALANADA</option>
        <option value="PELENQUE">PELENQUE</option>
        <option value="PALESTINA">PALESTINA</option>
        <option value="PALLATANGA">PALLATANGA</option>
        <option value="PALORA">PALORA</option>
        <option value="PALTAS">PALTAS</option>
        <option value="PANGUA">PANGUA</option>
        <option value="PAQUISHA">PAQUISHA</option>
        <option value="PASAJE">PASAJE</option>
        <option value="PASTAZA">PASTAZA</option>
        <option value="PATATE">PATATE</option>
        <option value="PEDERNALES">PEDERNALES</option>
        <option value="PEDRO CARBO">PEDRO CARBO</option>
        <option value="1708">PEDRO VICENTE MALDONADO</option>
        <option value="PENIPE">PENIPE</option>
        <option value="PEDRO MONCAYO">PEDRO MONCAYO</option>
        <option value="PICHINCHA">PICHINCHA</option>
        <option value="PIMAMPIRO">PIMAMPIRO</option>
        <option value="PINDAL">PINDAL</option>
        <option value="PIÑAS">PIÑAS</option>
        <option value="PLAYAS">PLAYAS</option>
        <option value="PORTOVELO">PORTOVELO</option>
        <option value="PORTOVIEJO">PORTOVIEJO</option>
        <option value="PUCARA">PUCARA</option>
        <option value="PUEBLOVIEJO">PUEBLOVIEJO</option>
        <option value="PUERTO LOPEZ">PUERTO LOPEZ</option>
        <option value="PUERTO QUITO">PUERTO QUITO</option>
        <option value="PUJILI">PUJILI</option>
        <option value="PUTUMAYO">PUTUMAYO</option>
        <option value="PUYANGO">PUYANGO</option>
        <option value="QUERO">QUERO</option>
        <option value="QUEVEDO">QUEVEDO</option>
        <option value="QUIJOS">QUIJOS</option>
        <option value="QUILANGA">QUILANGA</option>
        <option value="QUININDE">QUININDE</option>
        <option value="QUINSALOMA">QUINSALOMA</option>
        <option value="QUITO">QUITO</option>
        <option value="RIOBAMBA">RIOBAMBA</option>
        <option value="RIOVERDE">RIOVERDE</option>
        <option value="ROCAFUERTE">ROCAFUERTE</option>
        <option value="RUMIÑAHUI">RUMIÑAHUI</option>
        <option value="SALCEDO">SALCEDO</option>
        <option value="SALINAS">SALINAS</option>
        <option value="SALITRE (URBINA JADO)">SALITRE (URBINA JADO)</option>
        <option value="SAMBORONDON">SAMBORONDON</option>
        <option value="SAN CRISTOBAL">SAN CRISTOBAL</option>
        <option value="SAN FERNANDO">SAN FERNANDO</option>
        <option value="SAN JACINTO DE YAGUACHI">SAN JACINTO DE YAGUACHI</option>
        <option value="SAN JUAN BOSCO">SAN JUAN BOSCO</option>
        <option value="SAN LORENZO">SAN LORENZO</option>
        <option value="SAN MIGUEL">SAN MIGUEL</option>
        <option value="SAN MIGUEL DE LOS BANCOS">SAN MIGUEL DE LOS BANCOS</option>
        <option value="SAN MIGUEL DE URCUQUI">SAN MIGUEL DE URCUQUI</option>
        <option value="SAN PEDRO DE HUACA">SAN PEDRO DE HUACA</option>
        <option value="SAN PEDRO DE PELILEO">SAN PEDRO DE PELILEO</option>
        <option value="SAN VICENTE">SAN VICENTE</option>
        <option value="SANTA ANA">SANTA ANA</option>
        <option value="SANTA CLARA">SANTA CLARA</option>
        <option value="SANTA CRUZ">SANTA CRUZ</option>
        <option value="SANTA ELENA">SANTA ELENA</option>
        <option value="SANTA ELENA">SANTA ELENA</option>
        <option value="SANTA ISABEL">SANTA ISABEL</option>
        <option value="SANTA LUCIA">SANTA LUCIA</option>
        <option value="SANTA ROSA">SANTA ROSA</option>
        <option value="SANTIAGO">SANTIAGO</option>
        <option value="SANTIAGO DE PILLARO">SANTIAGO DE PILLARO</option>
        <option value="SANTO DOMINGO">SANTO DOMINGO</option>
        <option value="SAQUISILI">SAQUISILI</option>
        <option value="SARAGURO">SARAGURO</option>
        <option value="SEVILLA DE ORO">SEVILLA DE ORO</option>
        <option value="SHUSHUFINDI">SHUSHUFINDI</option>
        <option value="SIGCHOS">SIGCHOS</option>
        <option value="SIGSIG">SIGSIG</option>
        <option value="SIMON BOLIVAR">SIMON BOLIVAR</option>
        <option value="SOZORANGA">SOZORANGA</option>
        <option value="SUCRE">SUCRE</option>
        <option value="SUCUA">SUCUA</option>
        <option value="SUCUMBIOS">SUCUMBIOS</option>
        <option value="SUSCAL">SUSCAL</option>
        <option value="TAISHA">TAISHA</option>
        <option value="TENA">TENA</option>
        <option value="TISALEO">TISALEO</option>
        <option value="TIWINTZA">TIWINTZA</option>
        <option value="TOSAGUA">TOSAGUA</option>
        <option value="TULCAN">TULCAN</option>
        <option value="URDANETA">URDANETA</option>
        <option value="VALENCIA">VALENCIA</option>
        <option value="VENTANAS">VENTANAS</option>
        <option value="VINCES">VINCES</option>
        <option value="YACUAMBI">YACUAMBI</option>
        <option value="YANTZAZA">YANTZAZA (YANZATZA)</option>
        <option value="ZAMORA">ZAMORA</option>
        <option value="ZAPOTILLO">ZAPOTILLO</option>
        <option value="ZARUMA">ZARUMA</option>
        <option value="24 DE MAYO">24 DE MAYO</option>        
        </select>	        
		</div>
		<br>
		<div id="c12" class="input-group">
		<span class="input-group-addon"><i class="far fa-map"></i> PARROQUIA RESIDENCIA</span>
		<input id="parroquiaR" type="text" class="form-control" name="parroquiaR" placeholder="Parroquia de Residencia" pattern="[A-ZÀ-ÿ\s]+" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c13" class="input-group">
		<span class="input-group-addon"><i class="fas fa-map-marked-alt"></i> DOMICILIO:</span>
		<input id="domicilio" type="text" class="form-control" name="domicilio" pattern="[A-ZÀ-ÿ\s]+" minlength="5" maxlength="100" placeholder="Dirección de Domicilio" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
        <br>
        <div id="c14" class="input-group">
		<span class="input-group-addon"><i class="fas fa-baby"></i> FECHA NACIMIENTO:</span>
		<input id="nacimiento" type="date" class="form-control" min="1960-01-01" max="1999-01-01"  name="nacimiento"  required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
	<br>
		<div  id="c15" class="input-group">
		<span class="input-group-addon"><i class="fas fa-phone"></i> TELÉFONO: </span>
		<input id="prefijo1" type="number" step="any" class="form-control" style="width:79px" name="prefijo1" value="593"   autocomplete="off"><input id="telefonoD" type="number" step="any" class="form-control" style="width:250px" name="telefonoD" placeholder="Número de Teléfono" step="any"  autocomplete="off"><input id="extencion" type="number" step="any" class="form-control" style="width:90px" name="extencion" placeholder="Extención"  autocomplete="off">		
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c16" class="input-group">
		<span class="input-group-addon"><i class="fas fa-hand-holding-heart"></i> ESTADO CIVIL: </span>
		<select name="estadoC" id="estadoC" class="form-control" required autocomplete="off" >
            <option value="">SELECCIONAR</option>
            <option value="SOLTERO/A">SOLTERO/A</option>
            <option value="CASADO/A">CASADO/A</option>        
            <option value="VIUDO/A">VIUDO/A</option>        
        </select>        
		</div>
		<br>
		<div id="c17" class="input-group ">
		<span class="input-group-addon"><i class="fas fa-mobile-alt"></i> CELULAR:</span>
		<input id="prefijo2" type="number" step="any" class="form-control" style="width:79px" name="prefijo2" value="593" required autocomplete="off"><input id="celular" type="text" step="any" pattern="[0-9]+" minlength="9" maxlength="9" class="form-control" style="width:343px" name="celular" placeholder="Número de Celular" require autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c18" class="input-group">
		<span class="input-group-addon"><i class="fas fa-envelope-square"></i> CORREO:</span> 
		<input id="email" type="text" class="form-control" name="email"  placeholder="Correo Electrónico" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div  id="c19" class="input-group">
		<span class="input-group-addon"><i class="fas fa-wheelchair"></i> DISCAPACIDAD:</span>
		<select name="discapacidad" id="discapacidad" class="form-control" required autocomplete="off" >
            <option value="">SELECCIONAR</option>
            <option value="Si">SI</option>
            <option value="No">NO</option>                 
        </select>        
		</div>
		<br>
		<div id="c20" class="input-group">
		<span class="input-group-addon"><i class="fas fa-id-badge"></i> NUM. CARNET</span>
		<input id="carne" type="number" step="any" class="form-control" name="carne" placeholder="Número de Carné"  autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c21" class="input-group">
		<span class="input-group-addon"><i class="fas fa-id-card-alt"></i> NUM. CERTFICADO</span>
		<input id="votacion" type="text" step="any" class="form-control" pattern="[0-9]+" minlength="8" maxlength="8"  name="votacion" placeholder="Número de Certificado" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c22" class="input-group">
		<span class="input-group-addon"><i class="far fa-user"></i> USUARIO</span>
		<input id="user" type="text" class="form-control" name="user" pattern="[A-Za-z0-9]+" minlength="6" maxlength="20" placeholder="Nombre de Usuario" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c23" class="input-group">
		<span class="input-group-addon"><i class="fas fa-lock"></i> CONTRASEÑA: </span>
		<input id="pass" type="password" class="form-control" pattern="[A-Za-z0-9]+" minlength="6" maxlength="20" name="pass" placeholder="Contraseña" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success">REGISTRAR</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
		</form>
    </div>
    </div>
</div>
</div>


<div id="updateUser" class="modal fade" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ACTULIZAR INFORMACIÓN DOCENTE </h4>        
    </div>
    <div class="modal-body">
		<form id="frm" name="formUserUpdate" onsubmit="update(); return false">
		<input type="text" name="codigo" id="codigo" style="display: none;">
		<div id="c0" class="input-group">
		<span class="input-group-addon"><i class="fas fa-map-pin"></i> ORIGEN:</span>
		<select name="origen" id="origen" class="form-control" required autocomplete="off">
        <option value="">SELECCIONAR</option>
        <option value="NATIVO/A">NATIVO/A</option>
        <option value="EXTRANJERO/A">EXTRANJERO/A</option>        
        </select>        
		</div>
		<br>
		<div id="c1" class="input-group">
		<span class="input-group-addon"><i class="far fa-address-card"></i> IDENTIFICACION:</span>        
		<input id="identificacion" type="text" step="any" class="form-control" pattern="[0-9]+" minlength="10" maxlength="10" name="identificacion" placeholder="Identificación" required autocomplete="off">
        <span class="input-group-addon" id="cedulaValidada"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>        
		</div>        
		<br>
		<div  id="c2" class="input-group">
		<span class="input-group-addon"><i class="fas fa-user"></i> NOMBRES:</span>
        <div class="input-group">
		<input id="nombres" type="text" class="form-control" name="nombres" pattern="[A-ZÀ-ÿ\s]+" placeholder="Nombres" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
        </div>
		</div>
		<br>
		<div id="c3" class="input-group">
		<span class="input-group-addon"><i class="fas fa-user"></i> APELLIDOS:</span>
		<input id="apellidos" type="text" class="form-control" name="apellidos" placeholder="Apellidos" pattern="[A-ZÀ-ÿ\s]+" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c4" class="input-group">
		<span class="input-group-addon"><i class="fas fa-flag"></i> NACIONALIDAD</span>
		<input id="nacionalidad" type="text" class="form-control" name="nacionalidad" placeholder="Nacionalidad" pattern="[A-ZÀ-ÿ\s]+" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>        
		<div id="c5" class="input-group">        
		<span class="input-group-addon"><i class="fas fa-venus-mars"></i> GENERO:</span>
		<select name="genero" id="genero" class="form-control" required autocomplete="off">
                <option value="">SELECCIONAR</option>
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMENINO">FEMENINO</option>        
                <option value="OTRO">OTRO</option>        
            </select>            
		</div>
		<br>
		<div id="c6" class="input-group">
		<span class="input-group-addon"><i class="fas fa-book"></i> TITULO:</span>
		<input id="titulo" type="text" class="form-control" name="titulo" placeholder="Título Académico" pattern="[A-ZÀ-ÿ\s]+" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
        <br>        
		<div id="c7" class="input-group">        
		<span class="input-group-addon"><i class="fas fa-book"></i> MATERIA:</span>
		<select name="materia" id="materia" class="form-control" required autocomplete="off">
        <option value="">SELECCIONAR</option>
                <?php
            $query = $mysqli -> query ("SELECT * FROM pr_materias");
            while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[mat_nombre].'">'.$valores[mat_nombre].'</option>';
        }
        ?>      
            </select>            
		</div>
		<br>        
		<div id="c8" class="input-group">
		<span class="input-group-addon"><i class="fas fa-globe-americas"></i> PAIS NACIMIENTO</span>
		<input id="pais" type="text" class="form-control" name="pais"  placeholder="País" pattern="[A-ZÀ-ÿ\s]+" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c9" class="input-group">
		<span class="input-group-addon"><i class="fas fa-street-view"></i> PROVINCIA NACIMIENTO</span>
		<input id="provinciaN" type="text" class="form-control" name="provinciaN" placeholder="Provincia de Nacimiento" pattern="[A-ZÀ-ÿ\s]+" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c10" class="input-group">
		<span class="input-group-addon"><i class="far fa-map"></i> PROVINCIA RESIDENCIA</span>
		<select name="provinciaR" id="provinciaR" class="form-control" required autocomplete="off">
        <option value="">SELECCIONAR</option>
        <option value="AZUAY">AZUAY</option>
        <option value="BOLIVAR">BOLIVAR</option>
        <option value="CAÑAR">CAÑAR</option>
        <option value="CARCHI">CARCHI</option>
        <option value="CHIMBORAZO">CHIMBORAZO</option>
        <option value="COTOPAXI">COTOPAXI</option>
        <option value="EL ORO">EL ORO</option>
        <option value="ESMERALDAS">ESMERALDAS</option>
        <option value="GALÁPAGOS">GALÁPAGOS</option>
        <option value="GUAYAS">GUAYAS</option>
        <option value="IMBABURA">IMBABURA</option>
        <option value="LOJA">LOJA</option>
        <option value="LOS RÍOS">LOS RÍOS</option>
        <option value="MANABÍ">MANABÍ</option>
        <option value="MORONA SANTIAGO">MORONA SANTIAGO</option>
        <option value="NAPO">NAPO</option>
        <option value="ORELLANA">ORELLANA</option>
        <option value="PASTAZA">PASTAZA</option>
        <option value="PICHINCHA">PICHINCHA</option>
        <option value="SANTA ELENA">SANTA ELENA</option>
        <option value="SANTO DOMINGO DE LOS TSÁCHILAS">SANTO DOMINGO DE LOS TSÁCHILAS</option>
        <option value="SUCUMBÍOS">SUCUMBÍOS</option>
        <option value="TUNGURAHUA">TUNGURAHUA</option>
        <option value="ZAMORA CHINCHIPE">ZAMORA CHINCHIPE</option>        
        </select>	        
		</div>
		<br>
		<div  id="c11" class="input-group">
		<span class="input-group-addon"><i class="far fa-map"></i> CANTON RESIDENCIA</span>
		<select name="cantonR" id="cantonR" class="form-control">
        <option value="">SELECCIONAR</option>
        <option value="AGUARICO">AGUARICO</option>
        <option value="ALAUSI">ALAUSI</option>
        <option value="ALFREDO BAQUERIZO MORENO JUJAN">ALFREDO BAQUERIZO MORENO JUJAN</option>
        <option value="AMBATO">AMBATO</option>
        <option value="ANTONIO ANTE">ANTONIO ANTE</option>
        <option value="ARAJUNDO">ARAJUNDO</option>
        <option value="ARCHIDONA">ARCHIDONA</option>
        <option value="ARENILLAS">ARENILLAS</option>
        <option value="ATACAMES">ATACAMES</option>
        <option value="ATAHUALPA">ATAHUALPA</option>
        <option value="AZOGUES">AZOGUES</option>
        <option value="BABA">BABA</option>
        <option value="BABAHOYO">BABAHOYO</option>
        <option value="BALAO">BALAO</option>
        <option value="BALSAS">BALSAS</option>
        <option value="BALZAR">BALZAR</option>
        <option value="BAÑOS DE AGUA SANTA">BAÑOS DE AGUA SANTA</option>
        <option value="BIBLIAN">BIBLIAN</option>
        <option value="BOLIVAR">BOLIVAR</option>
        <option value="BUENA FE">BUENA FE</option>
        <option value="CALUMA">CALUMA</option>
        <option value="CAMILO PONCE ENRIQUEZ">CAMILO PONCE ENRIQUEZ</option>
        <option value="CAÑAR">CAÑAR</option>
        <option value="CARLOS JULIO AROSEMENA TOLA">CARLOS JULIO AROSEMENA TOLA</option>        
        <option value="CASCALES">CASCALES</option>
        <option value="CATAMAYO">CATAMAYO</option>
        <option value="CAYAMBE">CAYAMBE</option>
        <option value="CELICA">CELICA</option>
        <option value="CENTINELA DEL CONDOR">CENTINELA DEL CONDOR</option>
        <option value="CEVALLOS">CEVALLOS</option>
        <option value="CHAGUARPAMPA">CHAGUARPAMPA</option>
        <option value="CHAMBO">CHAMBO</option>
        <option value="CHILLA">CHILLA</option>
        <option value="CHILLANES">CHILLANES</option>
        <option value="CHIMBO">CHIMBO</option>
        <option value="CHINCHIPE">CHINCHIPE</option>
        <option value="CHONE">CHONE</option>
        <option value="CHORDELEG">CHORDELEG</option>
        <option value="CHUNCHI">CHUNCHI</option>
        <option value="COLIMES">COLIMES</option>
        <option value="COLTA">COLTA</option>
        <option value="CORONEL MARCELINO MARIDUEÑA">CHONE</option>
        <option value="COTACACHI">COTACACHI</option>
        <option value="CUENCA">CUENCA</option>
        <option value="CUMANDA">CUMANDA</option>
        <option value="CUYABENO">CUYABENO</option>
        <option value="DAULE">DAULE</option>
        <option value="DELEG">DELEG</option>
        <option value="DURAN">DURAN</option>
        <option value="ECHEANDIA">ECHEANDIA</option>
        <option value="EL CARMEN">EL CARMEN</option>
        <option value="EL CHACO">EL CHACO</option>
        <option value="EL EMPALME">EL EMPALME</option>
        <option value="EL GUABO">EL GUABO</option>
        <option value="EL PAN">EL PAN</option>
        <option value="EL PANGUI">EL PANGUI</option>
        <option value="EL PIEDRERO">EL PIEDRERO</option>
        <option value="EL TAMBO">EL TAMBO</option>
        <option value="EL TRIUNFO">EL TRIUNFO</option>
        <option value="ELOY ALFARO">DAULE</option>
        <option value="ESMERALDAS">ESMERALDAS</option>
        <option value="ESPEJO">ESPEJO</option>
        <option value="ESPINDOLA">ESPINDOLA</option>
        <option value="FLAVIO ALFARO">FLAVIO ALFARO</option>
        <option value="GENERAL ANTONIO ELIZALDE">GENERAL ANTONIO ELIZALDE</option>
        <option value="GIRON">GIRON</option>
        <option value="GONZALO PIZARRO">GONZALO PIZARRO</option>
        <option value="GONZANAMA">GONZANAMA</option>
        <option value="GUACHAPALA">GUACHAPALA</option>
        <option value="GUALACEO">GUALACEO</option>
        <option value="GUALAQUIZA">GUALAQUIZA</option>
        <option value="GUAMOTE">GUAMOTE</option>
        <option value="GUANO">GUANO</option>
        <option value="GUARANDA">GUARANDA</option>
        <option value="GUAYAQUIL">GUAYAQUIL</option>
        <option value="HUAMBOYA">HUAMBOYA</option>
        <option value="HUAQUILLAS">HUAQUILLAS</option>
        <option value="IBARRA">IBARRA</option>
        <option value="ISABELA">ISABELA</option>
        <option value="ISIDRO AYORA">ISIDRO AYORA</option>
        <option value="JAMA">JAMA/option>
        <option value="JARAMILLO">JARAMILLO</option>
        <option value="JIPIJAPA">JIPIJAPA</option>
        <option value="JUNIN">JUNIN</option>
        <option value="LA CONCORDIA">LA CONCORDIA</option>
        <option value="LA JOYA DE LOS SACHAS">LA JOYA DE LOS SACHAS</option>
        <option value="LA LIBERTAD">LA LIBERTAD</option>
        <option value="LA MANA">LA MANA</option>
        <option value="LA TRONCAL">LA TRONCAL</option>
        <option value="LAGO AGRIO">LAGO AGRIO</option>
        <option value="LAS GOLONDRINAS">LAS GOLONDRINAS</option>
        <option value="LA LAJAS">LAS LAJAS</option>
        <option value="LAS NAVES">LAS NAVES</option>
        <option value="LATACUNGA">LATACUNGA</option>
        <option value="LIMON INDANZA">LIMON INDANZA</option>
        <option value="LOGROÑO">LOGROÑO</option>
        <option value="LOJA">LOJA</option>
        <option value="LOMAS DE SARGENTILLO">LOMAS DE SARGENTILLO</option>
        <option value="LORETO">LORETO</option>
        <option value="MACARA">MACARA</option>
        <option value="MACHALA">MACHALA</option>
        <option value="MANGA DEL CURA">MANGA DEL CURA</option>
        <option value="MANTA">MANTA</option>
        <option value="MARCABELI">MARCABELI</option>
        <option value="MEJIA">MEJIA</option>
        <option value="MERA">MERA</option>
        <option value="MILAGRO">MILAGRO</option>
        <option value="MIRA">MIRA</option>
        <option value="MOCACHE">MOCACHE</option>
        <option value="MOCHA">MOCHA</option>
        <option value="MONTALVO">MONTALVO</option>
        <option value="MONTECRISTI">MONTECRISTI</option>
        <option value="MONTUFAR">MONTUFAR</option>
        <option value="MORONA">MORONA</option>
        <option value="MUISNE">MUISNE</option>
        <option value="NABON">NABON</option>
        <option value="NANGARITZA">NANGARITZA</option>
        <option value="NARANJAL">NARANJAL</option>
        <option value="NARANJITO">NARANJITO</option>
        <option value="NO DEFINIDA EXTRANJERO">NO DEFINIDA EXTRANJERO</option>
        <option value="NOBOL">NOBOL</option>
        <option value="OLMEDO">OLMEDO</option>
        <option value="OÑA">OÑA</option>
        <option value="ORELLANA">ORELLANA</option>
        <option value="OTAVALO">OTAVALO</option>
        <option value="OTRO">OTRO</option>
        <option value="PABLO SEXTO">PABLO SEXTO</option>
        <option value="PAJAN">PAJAN</option>
        <option value="PALANDA">PALANADA</option>
        <option value="PELENQUE">PELENQUE</option>
        <option value="PALESTINA">PALESTINA</option>
        <option value="PALLATANGA">PALLATANGA</option>
        <option value="PALORA">PALORA</option>
        <option value="PALTAS">PALTAS</option>
        <option value="PANGUA">PANGUA</option>
        <option value="PAQUISHA">PAQUISHA</option>
        <option value="PASAJE">PASAJE</option>
        <option value="PASTAZA">PASTAZA</option>
        <option value="PATATE">PATATE</option>
        <option value="PEDERNALES">PEDERNALES</option>
        <option value="PEDRO CARBO">PEDRO CARBO</option>
        <option value="1708">PEDRO VICENTE MALDONADO</option>
        <option value="PENIPE">PENIPE</option>
        <option value="PEDRO MONCAYO">PEDRO MONCAYO</option>
        <option value="PICHINCHA">PICHINCHA</option>
        <option value="PIMAMPIRO">PIMAMPIRO</option>
        <option value="PINDAL">PINDAL</option>
        <option value="PIÑAS">PIÑAS</option>
        <option value="PLAYAS">PLAYAS</option>
        <option value="PORTOVELO">PORTOVELO</option>
        <option value="PORTOVIEJO">PORTOVIEJO</option>
        <option value="PUCARA">PUCARA</option>
        <option value="PUEBLOVIEJO">PUEBLOVIEJO</option>
        <option value="PUERTO LOPEZ">PUERTO LOPEZ</option>
        <option value="PUERTO QUITO">PUERTO QUITO</option>
        <option value="PUJILI">PUJILI</option>
        <option value="PUTUMAYO">PUTUMAYO</option>
        <option value="PUYANGO">PUYANGO</option>
        <option value="QUERO">QUERO</option>
        <option value="QUEVEDO">QUEVEDO</option>
        <option value="QUIJOS">QUIJOS</option>
        <option value="QUILANGA">QUILANGA</option>
        <option value="QUININDE">QUININDE</option>
        <option value="QUINSALOMA">QUINSALOMA</option>
        <option value="QUITO">QUITO</option>
        <option value="RIOBAMBA">RIOBAMBA</option>
        <option value="RIOVERDE">RIOVERDE</option>
        <option value="ROCAFUERTE">ROCAFUERTE</option>
        <option value="RUMIÑAHUI">RUMIÑAHUI</option>
        <option value="SALCEDO">SALCEDO</option>
        <option value="SALINAS">SALINAS</option>
        <option value="SALITRE (URBINA JADO)">SALITRE (URBINA JADO)</option>
        <option value="SAMBORONDON">SAMBORONDON</option>
        <option value="SAN CRISTOBAL">SAN CRISTOBAL</option>
        <option value="SAN FERNANDO">SAN FERNANDO</option>
        <option value="SAN JACINTO DE YAGUACHI">SAN JACINTO DE YAGUACHI</option>
        <option value="SAN JUAN BOSCO">SAN JUAN BOSCO</option>
        <option value="SAN LORENZO">SAN LORENZO</option>
        <option value="SAN MIGUEL">SAN MIGUEL</option>
        <option value="SAN MIGUEL DE LOS BANCOS">SAN MIGUEL DE LOS BANCOS</option>
        <option value="SAN MIGUEL DE URCUQUI">SAN MIGUEL DE URCUQUI</option>
        <option value="SAN PEDRO DE HUACA">SAN PEDRO DE HUACA</option>
        <option value="SAN PEDRO DE PELILEO">SAN PEDRO DE PELILEO</option>
        <option value="SAN VICENTE">SAN VICENTE</option>
        <option value="SANTA ANA">SANTA ANA</option>
        <option value="SANTA CLARA">SANTA CLARA</option>
        <option value="SANTA CRUZ">SANTA CRUZ</option>
        <option value="SANTA ELENA">SANTA ELENA</option>
        <option value="SANTA ELENA">SANTA ELENA</option>
        <option value="SANTA ISABEL">SANTA ISABEL</option>
        <option value="SANTA LUCIA">SANTA LUCIA</option>
        <option value="SANTA ROSA">SANTA ROSA</option>
        <option value="SANTIAGO">SANTIAGO</option>
        <option value="SANTIAGO DE PILLARO">SANTIAGO DE PILLARO</option>
        <option value="SANTO DOMINGO">SANTO DOMINGO</option>
        <option value="SAQUISILI">SAQUISILI</option>
        <option value="SARAGURO">SARAGURO</option>
        <option value="SEVILLA DE ORO">SEVILLA DE ORO</option>
        <option value="SHUSHUFINDI">SHUSHUFINDI</option>
        <option value="SIGCHOS">SIGCHOS</option>
        <option value="SIGSIG">SIGSIG</option>
        <option value="SIMON BOLIVAR">SIMON BOLIVAR</option>
        <option value="SOZORANGA">SOZORANGA</option>
        <option value="SUCRE">SUCRE</option>
        <option value="SUCUA">SUCUA</option>
        <option value="SUCUMBIOS">SUCUMBIOS</option>
        <option value="SUSCAL">SUSCAL</option>
        <option value="TAISHA">TAISHA</option>
        <option value="TENA">TENA</option>
        <option value="TISALEO">TISALEO</option>
        <option value="TIWINTZA">TIWINTZA</option>
        <option value="TOSAGUA">TOSAGUA</option>
        <option value="TULCAN">TULCAN</option>
        <option value="URDANETA">URDANETA</option>
        <option value="VALENCIA">VALENCIA</option>
        <option value="VENTANAS">VENTANAS</option>
        <option value="VINCES">VINCES</option>
        <option value="YACUAMBI">YACUAMBI</option>
        <option value="YANTZAZA">YANTZAZA (YANZATZA)</option>
        <option value="ZAMORA">ZAMORA</option>
        <option value="ZAPOTILLO">ZAPOTILLO</option>
        <option value="ZARUMA">ZARUMA</option>
        <option value="24 DE MAYO">24 DE MAYO</option>        
        </select>	        
		</div>
		<br>
		<div id="c12" class="input-group">
		<span class="input-group-addon"><i class="far fa-map"></i> PARROQUIA RESIDENCIA</span>
		<input id="parroquiaR" type="text" class="form-control" name="parroquiaR" placeholder="Parroquia de Residencia" pattern="[A-ZÀ-ÿ\s]+" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c13" class="input-group">
		<span class="input-group-addon"><i class="fas fa-map-marked-alt"></i> DOMICILIO:</span>
		<input id="domicilio" type="text" class="form-control" name="domicilio" pattern="[A-ZÀ-ÿ\s]+" minlength="5" maxlength="100" placeholder="Dirección de Domicilio" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
        <br>
        <div id="c14" class="input-group">
		<span class="input-group-addon"><i class="fas fa-baby"></i> FECHA NACIMIENTO:</span>
		<input id="nacimiento" type="date" class="form-control" min="1960-01-01" max="1999-01-01"  name="nacimiento"  required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
	<br>
		<div  id="c15" class="input-group">
		<span class="input-group-addon"><i class="fas fa-phone"></i> TELÉFONO: </span>
		<input id="prefijo1" type="number" step="any" class="form-control" style="width:79px" name="prefijo1" value="593"   autocomplete="off"><input id="telefonoD" type="number" step="any" class="form-control" style="width:252px" name="telefonoD" placeholder="Número de Teléfono" step="any"  autocomplete="off"><input id="extencion" type="number" step="any" class="form-control" style="width:90px" name="extencion" placeholder="Extención"  autocomplete="off">		
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c16" class="input-group">
		<span class="input-group-addon"><i class="fas fa-hand-holding-heart"></i> ESTADO CIVIL: </span>
		<select name="estadoC" id="estadoC" class="form-control" required autocomplete="off" >
            <option value="">SELECCIONAR</option>
            <option value="SOLTERO/A">SOLTERO/A</option>
            <option value="CASADO/A">CASADO/A</option>        
            <option value="VIUDO/A">VIUDO/A</option>        
        </select>        
		</div>
		<br>
		<div id="c17" class="input-group ">
		<span class="input-group-addon"><i class="fas fa-mobile-alt"></i> CELULAR:</span>
		<input id="prefijo2" type="number" step="any" class="form-control" style="width:79px" name="prefijo2" value="593" required autocomplete="off"><input id="celular" type="text" step="any" pattern="[0-9]+" minlength="9" maxlength="9" class="form-control" style="width:343px" name="celular" placeholder="Número de Celular" require autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c18" class="input-group">
		<span class="input-group-addon"><i class="fas fa-envelope-square"></i> CORREO:</span> 
		<input id="email" type="text" class="form-control" name="email"  placeholder="Correo Electrónico" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div  id="c19" class="input-group">
		<span class="input-group-addon"><i class="fas fa-wheelchair"></i> DISCAPACIDAD:</span>
		<select name="discapacidad" id="discapacidad" class="form-control" required autocomplete="off" >
            <option value="">SELECCIONAR</option>
            <option value="Si">SI</option>
            <option value="No">NO</option>                 
        </select>        
		</div>
		<br>
		<div id="c20" class="input-group">
		<span class="input-group-addon"><i class="fas fa-id-badge"></i> NUM. CARNET</span>
		<input id="carne" type="number" step="any" class="form-control" name="carne" placeholder="Número de Carné"  autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c21" class="input-group">
		<span class="input-group-addon"><i class="fas fa-id-card-alt"></i> NUM. CERTFICADO</span>
		<input id="votacion" type="text" step="any" class="form-control" pattern="[0-9]+" minlength="8" maxlength="8"  name="votacion" placeholder="Número de Certificado" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c22" class="input-group">
		<span class="input-group-addon"><i class="far fa-user"></i> USUARIO</span>
		<input id="user" type="text" class="form-control" name="user" pattern="[A-Za-z0-9]+" minlength="6" maxlength="20" placeholder="Nombre de Usuario" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
		<br>
		<div id="c23" class="input-group">
		<span class="input-group-addon"><i class="fas fa-lock"></i> CONTRASEÑA: </span>
		<input id="pass" type="password" class="form-control" pattern="[A-Za-z0-9]+" minlength="6" maxlength="20" name="pass" placeholder="Contraseña" required autocomplete="off">
        <span class="input-group-addon"><i class="icono fas fa-check-circle"></i><i class="icono_error fas fa-exclamation-circle"></i></span>               
		</div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Actualizar</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
		</form>
    </div>
    </div>
</div>
</div>
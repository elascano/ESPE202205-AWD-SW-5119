<!DOCTYPE html>
<html lang="es-CL">
    <head>
        <?php
        	require_once("head.php");
        ?>
    </head>
    <body>
        <div class="navbar navbar navbar-inverse navbar-fixed-top">
        	<?php
        		require_once("nav.php");
        	?>
        </div>
        <div class="container">
           <?php
            error_reporting(0);
            $string = $_GET["condition"];
            $arrayStudent = explode(" ", $string);
           ?>
        <form class="form-horizontal" action="services.php" method="GET">
            <h1>Busqueda de Estudiante <small>por Id</small></h1>
            <div class="control-group">
                <label class="control-label" for="idStudent">Id</label>
                <div class="controls">
                    <input type="text" name="idStudent" id="idStudent" class="input-xlarge" placeholder="Id del estudiante"/>
                </div>
            </div>
            
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-default btn-primary"><i class="icon-book icon-white"></i> Buscar</button>
                </div>
            </div>
             
        </form>

            <h3>Tabla de Busqueda de Estudiantes</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="tr-head">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        
                        </tr>
                    </thead>
                <tbody>
                    <?php
                      
                        require_once("ConectionMongoDb.php");
	                    if ($students->count() >0 ){
	                	                  
                                                                       
                    ?>
                    <tr>
                        <td><?php echo $arrayStudent[0] ?></td>
                        <td><?php echo $arrayStudent[1] ?></td>
                        <td><?php echo $arrayStudent[2] ?></td>
                        <td><?php echo $arrayStudent[3] ?></td>
             
                    </tr>
                    <?php
                     
                    }else{
                    ?>
                    <tr>
                        <td colspan="4"><h4><i class="icon-info-sign"></i> No medicines found in the Database</h4></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div> 
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>   
    </body>
</html>

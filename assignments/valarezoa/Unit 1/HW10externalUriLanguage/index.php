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
            $mensaje = $_GET["mensaje"];
            if ($mensaje == 1) {
                echo "<p class='btn  btn-danger'><i class='icon-trash icon-white'></i> El estudiante fue eliminado con éxito.</p><br><br>";
            }
            if ($mensaje == 2) {
                echo "<p class='btn  btn-success'><i class='icon-ok icon-white'></i> El estudiante fue guardado con éxito.</p><br><br>";
            }
            if ($mensaje == 3) {
                echo "<p class='btn  btn-warning'><i class='icon-refresh icon-white'></i> El estudiante fue modificado con éxito.</p><br><br>";
            }
        ?>
        <form class="form-horizontal" action="services.php" method="POST">
            <h1>Sistema de Estudiantes <small>datos de Estudiantes</small></h1>
            <div class="control-group">
                <label class="control-label" for="nameStudent">Nombre</label>
                <div class="controls">
                    <input type="text" name="nameStudent" id="nameStudent" class="input-xlarge" placeholder="Nombre del Estudiante"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="lastnameStudent">Apellido</label>
                <div class="controls">
                    <input type="text" name="lastnameStudent" id="lastnameStudent" class="input-xlarge" placeholder="Apellido del Estudiante"/>
                </div>
                </div>
             <div class="control-group">
                <label class="control-label" for="idStudent">Id</label>
                <div class="controls">
                    <input type="text" name="idStudent" id="idStudent" class="input-xlarge" placeholder="Id del Estudiante"/>
                </div>
              </div>

             <div class="control-group">
                <label class="control-label" for="phoneStudent">Telefono</label>
                <div class="controls">
                    <input type="text" name="phoneStudent" id="phoneStudent" class="input-xlarge" placeholder="Description of Medicine"/>
                </div>
            </div>
           
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-default btn-primary"><i class="icon-book icon-white"></i> Guardar Estudiante</button>
                </div>
            </div>
             
        </form>

            <h3>Tabla de Estudiantes Registrados</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="tr-head">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        
                        <th>Modificar</th>
                        <th>Eliminar</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php
                        require_once("ConectionMongoDb.php");
                        if ($students->count()>0)
                        {
                            $arrayStudent = $students->find();
                            foreach ($arrayStudent as $objStudents) {                        
                    ?>
                    <tr>
                        
                        <td><?php echo $objStudents["Id"]; ?></td>
                        <td><?php echo $objStudents["Name"]; ?></td>
                        <td><?php echo $objStudents["LastName"]; ?></td>
                        <td><?php echo $objStudents["Phone"]; ?></td>
                    
                        
                        <td><a href="modifyStudent.php?id=<?php echo $objStudents['Id'] ?>" class="btn btn-warning"><i class="icon-pencil icon-white"></i> Modificar</a></td>
                        <td><a href="serverDelete.php?idDelete=<?php echo $objStudents['Id'] ?>" ><i class="btn btn-danger"><i class="icon-remove icon-white"></i> Eliminar</a></td>
                                
                    </tr>
                    <?php
                        }
                    }else{
                    ?>
                    <tr>
                        <td colspan="4"><h4><i class="icon-info-sign"></i> No hay estudiantes en la Base de datos</h4></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>   
    </body>
</html>

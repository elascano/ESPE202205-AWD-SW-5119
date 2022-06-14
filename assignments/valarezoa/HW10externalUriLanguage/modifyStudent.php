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
            
            <form class="form-horizontal" action="serverModify.php" method="POST">
                <?php 
                    require_once("ConectionMongoDb.php");
                    $id =  $_GET['id'];
                    $condition = array("Id" => $id);
                    if($students->count($condition) == 1){
                        $objStudent = $students->findOne($condition);
                    }
                ?>
                <div class="control-group">
                <label class="control-label" for="nameStudentModified">Nombre</label>
                <div class="controls">
                    <input type="text" name="nameStudentModified" id="nameStudentModified" class="input-xlarge" value=<?php echo $objStudent["Name"] ?>>
                </div>
            </div>
            <input type="hidden"  name="idStudentModified" id="idStudentModified" class="input-xlarge" value=<?php echo $objStudent["Id"] ?>>
            <div class="control-group">
                <label class="control-label" for="lastnameStudentModified">Apellido</label>
                <div class="controls">
                    <input type="text" name="lastnameStudentModified" id="lastnameStudentModified" class="input-xlarge" value=<?php echo $objStudent["LastName"] ?>>
                </div>
            </div>
             <div class="control-group">
                <label class="control-label" for="phoneStudentModified">Telefono</label>
                <div class="controls">
                    <input type="text" name="phoneStudentModified" id="phoneStudentModified" class="input-xlarge" value=<?php echo $objStudent["Phone"] ?>>
                </div>
            </div>
            
                <div class="control-group">
                    <div class="controls">
                        <input type="hidden" name="id" value="<?php echo $id ?>" />
                        <button type="submit" class="btn btn-default btn-primary"><i class="icon-book icon-white"></i >Guardar Estudiante</button>
                    </div>
                </div>
             
            </form>
        </div> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>   
    </body>
</html>

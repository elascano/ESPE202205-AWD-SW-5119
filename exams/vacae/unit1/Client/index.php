<!DOCTYPE html>
<html lang="es-CL">
<head>
        <?php
        	require_once("head.php");
        ?>
    </head>
    <body>
        <div class="container">
            <?php
            error_reporting(0);
            $mensaje = $_GET["mensaje"];
            if ($mensaje == 1) {
                echo "<p class='btn  btn-danger'><i class='icon-trash icon-white'></i> El Medicamento fue eliminado con éxito.</p><br><br>";
            }
            if ($mensaje == 2) {
                echo "<p class='btn  btn-success'><i class='icon-ok icon-white'></i> Dato guardado con éxito.</p><br><br>";
            }
            if ($mensaje == 3) {
                echo "<p class='btn  btn-warning'><i class='icon-refresh icon-white'></i> El Medicamento fue modificado con éxito.</p><br><br>";
            }
        ?>
        <form class="form-horizontal" action="addData.php" method="post">
            <h1>Form Students</h1>
            <div class="control-group">
                <label class="control-label" for="inputName">Name</label>
                <div class="controls">
                    <input type="text" name="name" id="inputName" class="input-xlarge" placeholder="Name of Student"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="lastName">Last Name</label>
                <div class="controls">
                    <input type="text" name="lastName" id="lastName" class="input-xlarge" placeholder="Last Name of Student"/>
                </div>
            </div>
             <div class="control-group">
                <label class="control-label" for="inputId">Id</label>
                <div class="controls">
                    <input type="number" name="id" id="inputId" class="input-xlarge" placeholder="Id of student"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="age">Age</label>
                <div class="controls">
                    <input type="number" name="age" id="age" class="input-xlarge" placeholder="Age of student"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="gener">Category</label>
            <div class="controls">
                <select name="gener" id="gener" class="input-xlarge">
                    <option >Male</option>
                    <option >Female</option>
                    </select>
            </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="course">Course</label>
                <div class="controls">
                    <input type="text" name="course" id="course" class="input-xlarge" placeholder="Student's course"/>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-default btn-primary"><i class="icon-book icon-white"></i> Save Data</button>
                </div>
            </div>
             
        </form>  
    </body>

    <script>datePickerId.max = new Date().toISOString().split("T")[0];</script>
</html>

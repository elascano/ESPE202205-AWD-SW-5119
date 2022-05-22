<?php 
    include("conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM home";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> PAGINA Casas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        <div class="data">
                        <div class="col-md-4">
                            <h1>Datos de la casa</h1>
                                <form action="insertar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="Bedrooms" placeholder="# de habitaciones">
                                    <input type="text" class="form-control mb-3" name="Bathrooms" placeholder="# de banios">
                                    <input type="text" class="form-control mb-3" name="Area" placeholder="Area">
                                    <input type="text" class="form-control mb-3" name="Addres" placeholder="Ubicacion">
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>
                        </div>
                        <div?>
                        </div>
                        <br>
                        <div class="col-md-8">
                            <table class="table" color>
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Id</th>
                                        <th>Habitaciones</th>
                                        <th>Banios</th>
                                        <th>Area</th>
                                        <th>Ubicacion </th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody class="tbody">
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['ID']?></th>
                                                <th><?php  echo $row['Bedrooms']?></th>
                                                <th><?php  echo $row['Bathrooms']?></th>
                                                <th><?php  echo $row['Area']?></th>    
                                                <th><?php  echo $row['Addres']?></th>    
                                                </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>
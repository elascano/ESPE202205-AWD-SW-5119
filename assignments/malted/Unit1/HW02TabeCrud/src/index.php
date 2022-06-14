<?php 
    include("connectiondb.php");
    $con=connect();

    $sql="SELECT *  FROM sports";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> HW02 Table Crud</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <header> 
            <h1 class="hedTitle">COMPETITIVE SPORTS</h1>   
        </header>

            <div class="container mt-5">
                
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Enter data</h1>
                                <form action="insert.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="name" placeholder="Enter Sport name">
                                    <input type="text" class="form-control mb-3" name="type" placeholder="Enter sport type">
                                    <input type="text" class="form-control mb-3" name="participants" placeholder="Enter number of participants">
                                    <input type="text" class="form-control mb-3" name="duration" placeholder="Enter duration in minutes">
                                    <input type="text" class="form-control mb-3" name="star_age" placeholder="Enter age">
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Participants</th>
                                        <th>Duration (min)</th>
                                        <th>Start Age</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['name']?></th>
                                                <th><?php  echo $row['type']?></th>
                                                <th><?php  echo $row['participants']?></th>
                                                <th><?php  echo $row['duration']?></th>    
                                                <th><?php  echo $row['star_age']?></th>    
                                                <th><a href="update2.php?id=<?php echo $row['name'] ?>" class="btn btn-info">Edit</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['name'] ?>" class="btn btn-danger">Delete</a></th>                                        
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
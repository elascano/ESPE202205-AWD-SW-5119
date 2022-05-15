<?php 
    include("connectiondb.php");
    $con=connect();

    $id=$_GET['id'];

    $sql="SELECT * FROM sports WHERE name='$id'";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Update</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                         <input type="hidden" name="name" value="<?php echo $row['name']  ?>">
                                
                        <input type="text" class="form-control mb-3" name="type" placeholder="type" value="<?php echo $row['type']  ?>">
                        <input type="text" class="form-control mb-3" name="participants" placeholder="participants" value="<?php echo $row['participants']  ?>">
                        <input type="text" class="form-control mb-3" name="duration" placeholder="duration" value="<?php echo $row['duration']  ?>">
                        <input type="text" class="form-control mb-3" name="star_age" placeholder="star_age" value="<?php echo $row['star_age']  ?>">
                                
                        <input type="submit" class="btn btn-primary btn-block" value="Update">
                    </form>
                    
                </div>
    </body>
</html>
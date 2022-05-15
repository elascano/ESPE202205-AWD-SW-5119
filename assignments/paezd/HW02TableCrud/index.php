<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="saveDB.php" method="post">
        <p>
            <label for="bedroom">Numero de habitaciones: </label>    
            <input type="number" name="bedroom" id="bedroom">
        </p>

        <p>
            <label for="badroom">Numero de baños: </label>
            <input type="number" name="badroom" id="badroom">    
        </p>
        
        
        <p>
            <label for="area">Superficie habitable: </label>
        <input type="number" name="area" id="area">
        </p>

        <p>
            <label for="addres">Ubicacion: </label>        
            <input type="text" name="addres" id="addres">
        </p>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
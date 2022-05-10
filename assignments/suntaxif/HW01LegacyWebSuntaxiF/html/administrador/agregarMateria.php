<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
        />
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
        ></script>
        <link rel="stylesheet" href="../../css/miestilo.css" />
        <title>Agregar Materia</title>
    </head>
    <body>
        <style>
            .form{
                display: flex;
                margin: 0 auto;
                width: max-content;
            }
        </style>
        <br><br><h3 class="text-center">Escoja el Nivel al que desea agregar la materia</h3><br>
        <p class="text-center"><strong>EGB:</strong> Educación General Básica</p>
        <p class="text-center"><strong>BGU:</strong> Bachillerato General Unificado</p><br><br>
        <form action="" class="row g-2 form" method="POST">
            <div class="col-md-6">
                <a href="actionsAdminMateria.php?action=addMateriaBGU" class="btn btn-success">BGU</a>
            </div>
            <div class="col-md-6">
                <a href="actionsAdminMateria.php?action=addMateriaEGB" class="btn btn-success">EGB</a>
            </div>
        </form>
    </body>
</html>
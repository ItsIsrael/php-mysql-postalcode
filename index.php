
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Formulario</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .container{
            width: 100vw;
            height: 99vh;
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
        }
        .form{
            width: 400px;
            height: 320px;

        }
    </style>
</head>

<body>
<div class="container">
    <form action="./connection/db.php" method="GET" class="row g-3 form-control form" >
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" require>
            <small id="helpId" class="form-text text-muted">Ingresa tu nombre y un apellido.</small>
        </div>
        <div class="mb-3">
            <label for="validationTooltip05" class="form-label">Código Postal</label>
            <input type="number" class="form-control" name="codigoPostal" id="validationTooltip05" aria-describedby="helpId" require>
            <small id="helpId" class="form-text text-muted">Debe de contener 5 caracteres. Ejemplo: 31500  </small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</body>

</html>
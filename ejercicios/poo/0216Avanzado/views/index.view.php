<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Desarrollo Web con PHP7 y MVC</title>
    <style>
        select
        {
            display: block;
            margin-bottom: 10px;
        }
        div{
            padding: 10px;
        }
    </style>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <?= $selectCiudad->generaSelector() ?>
        <?= $selectNivelIdioma->generaSelector() ?>
        <div>
        <?= $radioSexo->generaSelector() ?>
        </div>
        <div>
        <?= $radioEstado->generaSelector() ?>
        </div>
        <input type='submit' name='enviar'>
    </form>
</body>
</html>
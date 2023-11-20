<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Desarrollo Web con PHP 7 y MVC</title>
    <style>
        table,
        tr,
        td,
        th {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h1>Tema 1: Actividad 3</h1>
    <?php
    $nombres = [
        'Alejandro',
        'María',
        'Carlos',
        'Raquel'
    ];

    $numNombres = count($nombres);
    echo "<p>Número de nombres: $numNombres</p>";

    $strNombres = implode(' ', $nombres);
    echo "<p>Nombres: $strNombres</p>";

    $nombresOrdenados = $nombres;
    asort($nombresOrdenados);
    $strNombresOrdenados = implode(' ', $nombresOrdenados);
    echo "<p>Nombres: $strNombresOrdenados</p>";

    $nombresInvertido = array_reverse($nombres);
    $strNombresInvertido = implode(' ', $nombresInvertido);
    echo "<p>Nombres: $strNombresInvertido</p>";

    $posicionNombre = array_search('Alejandro', $nombres);
    echo "<p>Mi nombre está en la posición $posicionNombre</p>";

    $alumnos = [
        ['id' => 1, 'nombre' => 'Sara', 'edad' => 19],
        ['id' => 2, 'nombre' => 'Pablo', 'edad' => 18],
        ['id' => 3, 'nombre' => 'Manuel', 'edad' => 19],
        ['id' => 4, 'nombre' => 'Yolanda', 'edad' => 20],
    ];
    echo '<table>';
    echo '<tr>';
    echo '<th>ID</th><th>NOMBRE</th><th>EDAD</th>';
    echo '</tr>';

    foreach ($alumnos as $alumno) {
        echo '<tr>';
        echo '<td>' . $alumno['id'] . '</td>';
        echo '<td>' . $alumno['nombre'] . '</td>';
        echo '<td>' . $alumno['edad'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';

    $nombresAlumnos = array_column($alumnos, 'nombre');
    $strNombresAlumnos = implode(' ', $nombresAlumnos);
    echo "<p>Nombres alumnos: $strNombresAlumnos</p>";

    $numeros = [5, 7, 3, 4, 1, 6, 8, 2, 9, 0];
    $suma = array_sum($numeros);
    echo 'La suma de ' . implode(' + ', $numeros) . ' es ' . $suma;
    ?>
</body>

</html>
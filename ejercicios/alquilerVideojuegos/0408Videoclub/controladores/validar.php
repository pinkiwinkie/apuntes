<?php

if (isset($_COOKIE['nombre'])) {
    $dato = "Ya estás validado" . $_COOKIE['nombre'];
    $dato .= "<a href='index.php'>seguir</a>";
    require "../vistas/mensaje.php";
} else {
    if (isset($_POST['enviar'])) {
        include "../config/autocarga.php";
        $link = new Bd;
        $empleados = new Empleado($_POST['Email'], $_POST['pass']);
        if ($fila = $empleados->validar($link->link)) {
            setcookie('nombre', $fila['Nombre'], time() + 360000);
            setcookie('id', $fila['IdEmpleado'], time() + 360000);
            $dato = "Validación Correcta señor " . $fila['Nombre'];

            require "../vistas/mensaje.php";
        } else {
            $dato = "Validación Incorrecta<br> ";
            $dato .= "<a href='validar.php'>Volver a interntarlo</a>";
            require "../vistas/mensaje.php";
        }
    } else {
        require "../vistas/formvalidar.php";
    }
}

<?php
session_start();
session_destroy();
$dato = "Has salido correctamente<br> ";
$dato .= "<a href='validar.php'>Validarse</a>";
require "vistas/mensaje.php";

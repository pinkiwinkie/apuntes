<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<?php
	if (isset($_COOKIE['nombre'])) echo "Bienvenido a la aplicación: " . $_COOKIE['nombre']; ?>
	<br><a href='indexPel.php'>Películas</a> <a href='indexAlq.php'>Alquileres</a> <a href='salir.php'> Salir </a>
	<hr>
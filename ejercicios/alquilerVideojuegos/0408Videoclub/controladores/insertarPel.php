<?php
if (isset($_COOKIE['nombre'])) {

	include "../config/autocarga.php";
	if (isset($_POST['enviar'])) {

		$link = new Bd;
		$pel = new Pelicula('', $_POST['Titulo'], $_POST['Descripcion'], $_POST['FechaEstreno'], $_FILES['foto']['name']);
		$pel->subir($_FILES['foto']);
		$pel->insertar($link->link);
		$dato = "La  Pelicula se ha insertado correctamente<br>";

		require "../vistas/mensaje.php";

		$link = NULL;
	} else require "../vistas/formularioPel.php";
} else {
	$dato = "Tienes que estar validado<br> ";
	$dato .= "<a href='validar.php'>Validarse</a>";
	require "../vistas/mensaje.php";
}

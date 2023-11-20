
<?php
require "funciones.php";
require "vista/inicio.html";
if (isset($_POST['enviaropciones'])) {
	$ops[0] = limpiar($_POST['opcion1']);
	$ops[1] = limpiar($_POST['opcion2']);
	$ops[2] = limpiar($_POST['opcion3']);
	$ops[3] = limpiar($_POST['opcion4']);
	require "vista/formulario.php";
} elseif (isset($_POST['enviarfichero'])) {
	$nombre = $_FILES['fichero']['name'];
	if (is_uploaded_file($_FILES['fichero']['tmp_name'])) {
		$dir = $_POST['directorio'];
		crear_directorio($dir);
		if ($nombre = estado_archivo($nombre, $dir)) {
			move_uploaded_file($_FILES['fichero']['tmp_name'], $nombre);
			$mensaje = "el fichero $nombre se ha subido correctamente";
		} else {
			$mensaje = "el archivo no es de extensión correcta";
		}
	} else {
		$mensaje = "no se ha podido subir el fichero";
	}
	$mensaje .= "<a href='subir.php'> volver a inicio </a>";
	require "vista/mensaje.php";
} else require "vista/opciones.html";

require "vista/fin.html";

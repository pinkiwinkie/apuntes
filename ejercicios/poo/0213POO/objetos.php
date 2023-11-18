
<?php

require "vista/inicio.html";
require "modelo.php";
if (isset($_POST['enviar'])){
	$producto= new Producto ($_POST['precio'],$_POST['peso'],$_POST['stock']);
	$mostrar=$producto->asignar();
	foreach ($mostrar as $key => $value) {
		echo "$key: $value <br>";
	}
}else require "vista/formulario.html";
require "vista/fin.html";
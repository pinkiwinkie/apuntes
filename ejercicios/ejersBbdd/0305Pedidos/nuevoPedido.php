<?php
require "modelo.php";
$base = new Base();
if (isset($_POST['enviar'])) {
	$ped = new Pedido($_POST['idPedido'], $_POST['fecha'], $_POST['Cliente']);
	if (!$ped->existe($base->link)) {
		$ped->insertar($base->link);

		$dato = "El pedido se ha insertado correctamente";
	} else {
		$dato = "Error: ya existe este pedido <br/>";
	}
	$dato .= "<br><a href=index.php> volver</a>";
	require "vistas/mensaje.php";
} else {
	require "funcion.php";
	require "vistas/formPedido.php";
}

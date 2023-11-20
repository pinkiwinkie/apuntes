<?php
session_start();
require "modelo.php";
$base = new Base();
if (isset($_POST['enviar'])) {
	try {
		$ped = new Pedido($_POST['idPedido'], $_POST['fecha'], $_POST['Cliente']);
		$base->link->beginTransaction();
		if (!$ped->existe($base->link)) {
			$ped->insertar($base->link);
			$dato = "El pedido se ha insertado correctamente";
		} else {
			$dato = "Ya existe este pedido se añadirá solo la linea<br/>";
		}
		$lin = new linea($_POST['idPedido'], $_POST['Producto'], $_POST['cantidad']);
		$lin->insertar($base->link);
		$base->link->commit();
	} catch (Exception $e) {
		$base->link->rollback();
		$dato = "Fallo: " . $e->getMessage();
	}
	$dato .= "<br><a href=index.php> volver</a>";
	require "vistas/mensaje.php";
} else {
	require "funcion.php";
	require "vistas/pedido.php";
}

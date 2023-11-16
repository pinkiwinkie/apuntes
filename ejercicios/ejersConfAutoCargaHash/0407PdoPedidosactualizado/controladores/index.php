<?php
session_start();
require "../config/autocarga.php";
$base= new Base();
if (isset($_POST['enviar'])) {
	$ped= new Pedido ($_POST['idPedido'],$_POST['fecha'],$_POST['Cliente']);
	if (!$ped->existe($base->link)) {
		$_SESSION['linea']=0;
		$ped->guardar();
		header('Location:lineas.php');
	} else {
		$dato="Error: ya existe este pedido <br/>";
		$dato.="<A href='index.php'>volver</a>";
		require "../vistas/mensaje.php";
	}
}else{
	require "funcion.php";
	require "../vistas/pedido.php";
}
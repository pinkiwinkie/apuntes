<?php
include "vistas/inicio.html";
require "modelo.php";
if (isset($_POST['enviar'])) {

	$link=new Bd;
	$cli= new Cliente($_POST['dniCliente'],$_POST['nombre'],$_POST['direccion'],$_POST['email'],$_POST['pwd'],  $_POST['administrador']);
	if($cli->buscar($link->link)){
		$dato="El cliente ya existe<br>";
		$dato.="<a href='insertar.php'>Volver</a>";
		require "vistas/mensaje.php";
	}else {
		$cli->insertar($link->link);
		$dato="El cliente se ha insertado correctamente<br>";
		$dato.="<a href='insertar.php'>Volver</a>";
		require "vistas/mensaje.php";		
	}
	$link=NULL;
}else require "vistas/formulario.php";
include "vistas/fin.html";
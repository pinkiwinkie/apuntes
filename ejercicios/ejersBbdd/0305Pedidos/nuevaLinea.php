<?php
require "modelo.php";
$base= new Base();
if (isset($_POST['enviar'])) {
    $lin= new linea ($_POST['idPedido'],$_POST['Producto'],$_POST['cantidad']);
    $lin->insertar($base->link);
    $dato="El pedido se ha insertado correctamente";$dato.="<br><a href=index.php> volver</a>";
    require"vistas/mensaje.php";
}else{
	require "funcion.php";
	require "vistas/formLinea.php";
}
<?php
require "modelo.php";
$base = new Base();
$dato = Pedido::getAll($base->link);
require "vistas/tablaPedidos.php";

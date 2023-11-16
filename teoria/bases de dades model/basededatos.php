<?php
require "modelo.php";
$bd= new Base();
$datos=Producto::getAll($bd->link);
require "vista.php";
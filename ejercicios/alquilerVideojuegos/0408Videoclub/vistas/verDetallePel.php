<?php
require "../vistas/parciales/inicio.parcial.php";
foreach ($dato as $key => $value)
	echo "$key: $value <br>";
echo "<img src='" . $dato['foto'] . "'>";
require "../vistas/parciales/fin.parcial.php";

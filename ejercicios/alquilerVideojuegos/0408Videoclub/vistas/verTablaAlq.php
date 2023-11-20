<?php
require "../vistas/parciales/inicio.parcial.php";

echo "<table><tr><td> Id </td><td> Fecha </td><td> Empleado </td><td> Cliente </td><td> Pelicula </td><td>  </td><td>  </td><td><a href='insertarAlq.php'>Nuevo</a>  </td> </tr>";
while ($fila = $dato->fetch(PDO::FETCH_ASSOC)) {
	echo "<tr><td>" . $fila['IdAlquiler'] . "</td><td>" . $fila['Fecha'] . "</td><td>" . $fila['Empleado'] . "</td><td>" . $fila['Cliente'] . "</td><td>" . $fila['Pelicula'] . "</td>";
	echo "<td><a href='modificarAlq.php?Id=" . $fila['IdAlquiler'] . "'>modificar</a></td>";
	echo "<td><a href='borrarAlq.php?Id=" . $fila['IdAlquiler'] . "'>borrar</a></td>";
	echo "<td><a href='detalleAlq.php?Id=" . $fila['IdAlquiler'] . "'>detalle</a></td></tr>";
}
echo "</table>";
require "../vistas/parciales/fin.parcial.php";

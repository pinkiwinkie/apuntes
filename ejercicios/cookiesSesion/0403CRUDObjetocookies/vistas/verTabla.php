<?php
echo "hola " . $_COOKIE['nombre'] . " <a href='salir.php'>Salir</a>";
echo "<table><tr><td> Dni </td><td> Nombre </td><td>  </td><td>  </td><td><a href='insertar.php'>Nuevo</a>  </td> </tr>";
while ($fila = $dato->fetch(PDO::FETCH_ASSOC)) {
	echo "<tr><td>" . $fila['dniCliente'] . "</td><td>" . $fila['nombre'] . "</td>";
	echo "<td><a href='modificar.php?dni=" . $fila['dniCliente'] . "'>modificar</a></td>";
	echo "<td><a href='borrar.php?dni=" . $fila['dniCliente'] . "'>borrar</a></td>";
	echo "<td><a href='detalle.php?dni=" . $fila['dniCliente'] . "'>detalle</a></td></tr>";
}
echo "</table>";

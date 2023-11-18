<?php
require "../vistas/parciales/inicio.parcial.php";

echo "<table><tr><td> Id </td><td> Nombre </td><td>  </td><td>  </td><td><a href='insertarPel.php'>Nuevo</a>  </td> </tr>";
while($fila=$dato->fetch(PDO::FETCH_ASSOC)){
	echo "<tr><td>".$fila['IdPelicula']."</td><td>".$fila['Titulo']."</td>";
	echo "<td><a href='modificarPel.php?Id=".$fila['IdPelicula']."'>modificar</a></td>";
	echo "<td><a href='borrarPel.php?Id=".$fila['IdPelicula']."'>borrar</a></td>";
	echo "<td><a href='detallePel.php?Id=".$fila['IdPelicula']."'>detalle</a></td></tr>";
}
echo "</table>";
require "../vistas/parciales/fin.parcial.php";
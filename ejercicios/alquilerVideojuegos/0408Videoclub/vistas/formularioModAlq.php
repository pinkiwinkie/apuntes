<?php require "../vistas/parciales/inicio.parcial.php";
echo "<form action=''  method='post'>";
echo "Id Alquiler: " . $dato['IdAlquiler'] . "<br>";

echo "Fecha: <input type='date' name='Fecha' value='" . date("Y-m-d", strtotime($dato['Fecha'])) . "'><br>";
echo "<input type='hidden' name='IdAlquiler' value='" . $dato['IdAlquiler'] . "'>";
echo "cliente: " . lista($link->link, 'Cliente', 'IdCliente', 'Nombre', $dato['Cliente']) . "<br>";
echo "Pelicula: " . lista($link->link, 'Pelicula', 'IdPelicula', 'Titulo', $dato['Pelicula']) . "<br>";
echo "<input type='submit' name='enviarModificar'><br>";
echo "</form>";
require "../vistas/parciales/fin.parcial.php";

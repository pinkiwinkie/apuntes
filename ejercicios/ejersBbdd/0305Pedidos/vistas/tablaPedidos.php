<?php
echo "<table>";
$pedido = "";
while ($fila = $dato->fetch(PDO::FETCH_ASSOC)) {

  if ($fila['idPedido'] != $pedido) {
    $pedido = $fila['idPedido'];
    echo "<tr><td>" . $fila['idPedido'] . "</td><td>" . $fila['fecha'] . "</td><td></td><td></td><td><a href='nuevaLinea.php?id=$pedido'>Añadir Linea</a></td></tr>";
  }
  echo "<tr><td></td><td>" . $fila['nombre'] . "</td><td>" . $fila['cantidad'] . "</td><td>" . $fila['precio'] . "€</td><td>" . $fila['precio'] * $fila['cantidad'] . "</td></tr>";
}
echo "<tr><td><a href='nuevoPedido.php'>Añadir Pedido</a></td><td></td><td></td><td></td><td></td></tr>";
echo "</table>";

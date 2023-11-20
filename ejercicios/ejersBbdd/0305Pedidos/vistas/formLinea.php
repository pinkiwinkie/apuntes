<?php


echo "<form action='' method='post'>";
echo "Id Pedido: " . $_GET['id'] . "<input type='hidden' name='idPedido' value='" . $_GET['id'] . "'><br>";
echo "Producto: " . lista($base->link, 'Producto', 'idProducto', 'nombre') . "<br>";
echo "Cantidad: <input type='text' name='cantidad'><br>";
echo "<input type='submit' name='enviar'></form>";

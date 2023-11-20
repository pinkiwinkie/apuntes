<?php


echo "<form action='' method='post'>";
echo "Id Pedido: <input type='text' name='idPedido'><br>";
echo "Fecha: <input type='text' name='fecha'><br>";
echo "cliente: " . lista('http://localhost/0702Pedidos/cli/cliente', 'Cliente', 'dniCliente', 'nombre') . "<br>";
echo "<input type='submit' name='enviar'></form>";

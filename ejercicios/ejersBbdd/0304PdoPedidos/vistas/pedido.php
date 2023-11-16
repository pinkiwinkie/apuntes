<?php


    echo "<form action='' method='post'>";
    echo "Id Pedido: <input type='text' name='idPedido'><br>";
    echo "Fecha: <input type='text' name='fecha'><br>";
    echo "cliente: ".lista($base->link, 'Cliente', 'dniCliente','nombre')."<br>";
    echo "Producto: ".lista($base->link, 'Producto', 'idProducto','nombre')."<br>";
    echo "Cantidad: <input type='text' name='cantidad'><br>";
    echo "<input type='submit' name='enviar'></form>";
     


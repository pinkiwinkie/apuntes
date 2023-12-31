<?php


require "config/autocarga.php";

$base = new Base();

/*
  listar todos los posts o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      if (isset($_GET['idProducto'])) {
            //Mostrar un Cliente
            $pro = new Producto($_GET['idProducto']);
            $dato = $pro->buscar($base->link);
            header("HTTP/1.1 200 OK");
            echo json_encode($dato);
            exit();
      } else {
            //Mostrar lista de clientes
            $dato = Producto::getAll($base->link);
            $dato->setFetchMode(PDO::FETCH_ASSOC);
            header("HTTP/1.1 200 OK");
            echo json_encode($dato->fetchAll());
            exit();
      }
}


//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");

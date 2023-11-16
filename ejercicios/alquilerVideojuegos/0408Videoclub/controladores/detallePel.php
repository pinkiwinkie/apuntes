<?php
if (isset($_COOKIE['nombre'])){

    include "../config/autocarga.php";
    $link=new Bd;
    $pel= new Pelicula($_GET['Id']);
    $dato=$pel->buscar($link->link);
    require "../vistas/verDetallePel.php";
    


}else{
    $dato="Tienes que estar validado<br> ";
    $dato.="<a href='validar.php'>Validarse</a>";
    require "../vistas/mensaje.php";
}
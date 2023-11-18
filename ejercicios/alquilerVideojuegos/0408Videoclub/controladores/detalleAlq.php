<?php
if (isset($_COOKIE['nombre'])){

    include "../config/autocarga.php";
    $link=new Bd;
    $Alq= new Alquiler($_GET['Id']);
    $dato=$Alq->buscar($link->link);
    require "../vistas/verDetalleAlq.php";
    


}else{
    $dato="Tienes que estar validado<br> ";
    $dato.="<a href='validar.php'>Validarse</a>";
    require "../vistas/mensaje.php";
}
<?php
if (isset($_COOKIE['nombre'])){

   
    include "../config/autocarga.php";
    $base= new Bd();
    $dato= Alquiler::getAll($base->link);
    require "../vistas/verTablaAlq.php";
    
}else{
    $dato="Tienes que estar validado<br> ";
    $dato.="<a href='validar.php'>Validarse</a>";
    require "../vistas/mensaje.php";
}
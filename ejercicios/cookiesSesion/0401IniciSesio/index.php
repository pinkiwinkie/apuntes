<?php
session_start();
if (isset($_SESSION['nombre'])){
    $dato="Ya estás validado".$_SESSION['nombre'];
    require "vistas/mensaje.php";

}else{
    if (isset($_POST['enviar'])){
        if ($_POST['nombre']=='1' && $_POST['password']=='1'){
            $_SESSION['nombre']='Paco';
            $dato="Validación Correcta señor ".$_SESSION['nombre'];
            $dato.="<a href='index.php'>Volver a interntarlo</a>";
            require "vistas/mensaje.php";
        }else {
            $dato="Validación Incorrecta<br> ";
            $dato.="<a href='index.php'>Volver a interntarlo</a>";
            require "vistas/mensaje.php";
        }

    }else{
        require "vistas/formulario.php";
    }
   
}
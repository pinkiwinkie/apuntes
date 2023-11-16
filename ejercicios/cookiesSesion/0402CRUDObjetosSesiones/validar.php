<?php
session_start();
if (isset($_SESSION['nombre'])){
    $dato="Ya estás validado".$_SESSION['nombre'];
    require "vistas/mensaje.php";

}else{
    if (isset($_POST['enviar'])){
        require "modelo.php";
        $link=new Bd;
	    $cli= new Cliente($_POST['dniCliente'],'','','',$_POST['pwd']);
        if($fila=$cli->validar($link->link)){        
            $_SESSION['nombre']=$fila['nombre'];
            $dato="Validación Correcta señor ".$_SESSION['nombre'];
            $dato.="<a href='index.php'>seguir</a>";
            require "vistas/mensaje.php";
        }else {
            $dato="Validación Incorrecta<br> ";
            $dato.="<a href='validar.php'>Volver a interntarlo</a>";
            require "vistas/mensaje.php";
        }

    }else{
        require "vistas/formvalidar.php";
    }
   
}
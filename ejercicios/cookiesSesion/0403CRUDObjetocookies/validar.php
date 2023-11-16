<?php

if (isset($_COOKIE['nombre'])){
    $dato="Ya estás validado".$_COOKIE['nombre'];
    require "vistas/mensaje.php";

}else{
    if (isset($_POST['enviar'])){
        require "modelo.php";
        $link=new Bd;
	    $cli= new Cliente($_POST['dniCliente'],'','','',$_POST['pwd']);
        if($fila=$cli->validar($link->link)){        
            setcookie('nombre',$fila['nombre'],time()+360000);
            $dato="Validación Correcta señor ".$fila['nombre'];
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
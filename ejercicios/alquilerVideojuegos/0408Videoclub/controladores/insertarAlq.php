<?php
if (isset($_COOKIE['nombre'])){


	include "../config/autocarga.php";
    $link=new Bd;
	if (isset($_POST['enviar'])) {

		
		$Alq= new Alquiler('',$_POST['Fecha'],$_POST['Pelicula'],$_POST['Cliente'],$_COOKIE['id']);
		
		$Alq->insertar($link->link);
		$dato="El Alquiler se ha insertado correctamente<br>";
	
		require "../vistas/mensaje.php";
		
		$link=NULL;
	}else {
        include "../config/funcion.php";
        require "../vistas/formularioAlq.php";}
	
    
}else{
    $dato="Tienes que estar validado<br> ";
    $dato.="<a href='validar.php'>Validarse</a>";
    require "../vistas/mensaje.php";
}
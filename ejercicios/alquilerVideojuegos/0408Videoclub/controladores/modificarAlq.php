<?php

if (isset($_COOKIE['nombre'])){


	include "../config/autocarga.php";
	if (isset($_POST['enviarModificar'])) {
		$link=new Bd;
		$Alq= new Alquiler($_POST['IdAlquiler'],$_POST['Fecha'],$_POST['Pelicula'],$_POST['Cliente'],$_COOKIE['id']);
			
		$Alq->modificar($link->link);
		$dato="El alquiler se ha modificado correctamente";
	
		require "../vistas/mensaje.php";
			
	}else{
		$link=new Bd;
		$Alq= new Alquiler($_GET['Id']);
		$dato=$Alq->buscar($link->link);
        include "../config/funcion.php";
		require "../vistas/formularioModAlq.php";
		$link=NULL;
	}
		


    
}else{
    $dato="Tienes que estar validado<br> ";
    $dato.="<a href='validar.php'>Validarse</a>";
    require "../vistas/mensaje.php";
}
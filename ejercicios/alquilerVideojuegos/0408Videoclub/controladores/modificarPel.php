<?php

if (isset($_COOKIE['nombre'])){


	include "../config/autocarga.php";
	if (isset($_POST['enviarModificar'])) {
		$link=new Bd;
		$pel= new Pelicula($_POST['IdPelicula'],$_POST['Titulo'],$_POST['Descripcion'],$_POST['FechaEstreno'],$_FILES['foto']['name']);
		
		$pel->subir($_FILES['foto']);	
		$pel->modificar($link->link);
		unlink($_POST['fotoAntigua']);//borrar la imagen antigua
		$dato="La Pelicula se ha modificado correctamente";
	
		require "../vistas/mensaje.php";
			
	}else{
		$link=new Bd;
		$pel= new Pelicula($_GET['Id']);
		$dato=$pel->buscar($link->link);
		require "../vistas/formularioModPel.php";
		$link=NULL;
	}
		


    
}else{
    $dato="Tienes que estar validado<br> ";
    $dato.="<a href='validar.php'>Validarse</a>";
    require "../vistas/mensaje.php";
}
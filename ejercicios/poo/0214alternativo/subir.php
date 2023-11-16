<?php
require "modelo.php";
if (isset($_POST['enviar']))
{
	$foto= new Imagen ($_FILES['fichero']);
	if ($foto->esta_cargado()){
		$nombre=$foto->name;
		$partes=explode('.', $nombre);
		$npartes=count($partes);
		if ($npartes>1){
			$foto->cambiar_nombre();
			$foto->mover();
			echo "el fichero $foto->name se ha subido correctamente";
			
		}
		else echo "el nombre no tiene extensión";
	}else 
		echo "no se ha podido subir el fichero";
}else require "vistas/formulario.html";
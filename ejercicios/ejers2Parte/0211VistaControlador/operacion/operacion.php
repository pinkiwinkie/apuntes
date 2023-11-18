<?php
include "vistas/inicio.html";
if (isset($_POST['enviar'])){
	$a=$_POST['num1'];
	$b=$_POST['num2'];
	$op=$_POST['operacion'];
	switch ($op) {
		case 's':
			$c=$a+$b;
			echo "$a + $b = $c";
			break;
		case 'r':
			$c=$a-$b;
			echo "$a - $b = $c";
			break;
		case 'm':
			$c=$a*$b;
			echo "$a x $b = $c";
			break;
		case 'd':
			if ($b!=0) {
				$c=$a/$b;
				echo "$a / $b = $c";
			}else echo "No se puede dividir por 0";
		
			break;
	
		default:
			echo "La operación seleccioada no existe";
			break;
	}
}else {
	include "vistas/formulario.html";
}
include "vistas/fin.html";
?>

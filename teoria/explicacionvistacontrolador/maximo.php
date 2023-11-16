
<?php
include "vistas/inicio.html";
if (isset($_POST['enviar'])){
	$a=$_POST['num1'];
	$b=$_POST['num2'];
	$c=$_POST['num3'];
	$max=$a;
	$min=$a;
	if ($b>$max) $max=$b;
	else $min=$b;
	if ($c>$max) $max=$c;
	else $min=$c;
	echo "$min  $max";
}else{
	include "vistas/formulario.html";
}
?>
</body>
</html>
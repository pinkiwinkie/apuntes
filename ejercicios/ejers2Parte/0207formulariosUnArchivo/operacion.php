<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
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
	echo <<<FORMULARIO
		<form action='operacion.php' method="post" >
		Número 1: <input type='text' name='num1'><br>
		Número 2: <input type='text' name='num2'><br>
		Operación: <select name='operacion'>
			<option value='s'>Suma</option>
			<option value='r'>Resta</option>
			<option value='m'>Multiplicar</option>
			<option value='d'>División</option>
		</select>
		<input type='submit' name='enviar'><br>
	</form>
FORMULARIO;
}
?>
</body>
</html>
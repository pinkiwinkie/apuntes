<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<?php
	$a = $_POST['num1'];
	$b = $_POST['num2'];
	$op = $_POST['operacion'];
	switch ($op) {
		case 's':
			$c = $a + $b;
			echo "$a + $b = $c";
			break;
		case 'r':
			$c = $a - $b;
			echo "$a - $b = $c";
			# code...
			break;
		case 'm':
			$c = $a * $b;
			echo "$a x $b = $c";
			# code...
			break;
		case 'd':
			if ($b != 0) {
				$c = $a / $b;
				echo "$a / $b = $c";
			} else echo "No se puede dividir por 0";
			# code...
			break;

		default:
			echo "La operación seleccioada no existe";
			break;
	}
	?>
</body>

</html>
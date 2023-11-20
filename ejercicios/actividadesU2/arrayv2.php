<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<?php
	// Primer ejercicio con arrays unidimensionales
	function verpais($pais)
	{
		echo "<tr>";
		foreach ($pais as $value) {
			echo "<td>$value</td>";
		}
		echo "</tr>";
	}
	$encabezado = array('País', 'Capital', 'Extensión', 'Habitantes');
	$alemania = array('Alemania', 'Berlín', '557046', '78420000');
	$austria = array('Austria', 'Viena', '83849', '7614000');
	$belgica = array('Bélgica', 'Bruselas', '30518', '9932000');
	echo "<table border='1'>";
	verpais($encabezado);
	verpais($alemania);
	verpais($austria);
	verpais($belgica);
	echo "</table>";

	// Segundo ejercicio array bidimensional
	//fecth all devolvería esto
	$dosdimensiones = array(
		array('País' => 'Alemania', 'Capital' => 'Berlín', 'Extensión' => '557046', 'Habitantes' => '78420000'),
		array('País' => 'Austria', 'Capital' => 'Viena', 'Extensión' => '83849', 'Habitantes' => '7614000'),
		array('País' => 'Bélgica', 'Capital' => 'Bruselas', 'Extensión' => '30518', 'Habitantes' => '9932000')
	);

	echo "<br> <table border='1'>";
	$primera = True;
	$linea1 = "<tr>";
	$linea2 = "<tr>";
	foreach ($dosdimensiones as $paises) {
		foreach ($paises as $key => $value) { //diferencia fundamental entre un clave-valor y no
			if ($primera) {
				$linea1 .= "<td>$key</td>";
			}
			$linea2 .= "<td>$value</td>";
		}
		if ($primera) {
			echo "$linea1</tr>";
			$primera = False;
		}
		echo "$linea2</tr>";
		$linea2 = "<tr>";
	}

	echo "</table>";

	?>
</body>

</html>
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
	$c=$_POST['num3'];
	$max=$a;
	$min=$a;
	if ($b>$max) $max=$b;
	else $min=$b;
	if ($c>$max) $max=$c;
	else $min=$c;
	echo "$min  $max";
}else{
	echo "<form action='maximo.php' method='post' >";
	echo "Número 1: <input type='text' name='num1'><br>";
	echo "Número 2: <input type='text' name='num2'><br>";
	echo "Número 3: <input type='text' name='num3'><br>";
	echo "<input type='submit' name='enviar'> <br> </form>";
}
?>
</body>
</html>
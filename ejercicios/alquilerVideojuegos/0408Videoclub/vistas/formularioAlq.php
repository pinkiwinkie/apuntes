<?php require "../vistas/parciales/inicio.parcial.php" ?>
<form action="" method="post">
	Fecha: <input type='date' name='Fecha'><br>
	<?php
	echo "cliente: " . lista($link->link, 'Cliente', 'IdCliente', 'Nombre') . "<br>";
	echo "Pelicula: " . lista($link->link, 'Pelicula', 'IdPelicula', 'Titulo') . "<br>";

	?>
	<input type="submit" name="enviar"><br>
</form>
<?php require "../vistas/parciales/fin.parcial.php" ?>
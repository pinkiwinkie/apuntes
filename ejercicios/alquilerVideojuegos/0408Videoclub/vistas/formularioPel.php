<?php require "../vistas/parciales/inicio.parcial.php" ?>
<form action="" enctype="multipart/form-data" method="post">
	Titulo: <input type="text" name="Titulo"><br>
	Descripcion: <input type="text" name="Descripcion"><br>
	Fecha Estreno: <input type="date" name="FechaEstreno"><br>
	foto: <input type="file" name="foto"><br>

	<input type="submit" name="enviar"><br>
</form>
<?php require "../vistas/parciales/fin.parcial.php" ?>
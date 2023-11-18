<?php
require "../vistas/parciales/inicio.parcial.php";
echo "<form action='' enctype='multipart/form-data' method='post'>";
echo "Id Película: ".$dato['IdPelicula']."<br>";
echo "<input type='hidden' name='IdPelicula' value='".$dato['IdPelicula']."'>";
echo "Titulo: <input type='text' name='Titulo' value='".$dato['Titulo']."'><br>";
echo "Descripcion: <input type='text' name='Descripcion' value='".$dato['Descripcion']."'><br>";
echo "FechaEstreno: <input type='date' name='FechaEstreno' value='".$dato['FechaEstreno']."'><br>";
echo "foto: <input type='file' name='foto' value='".$dato['foto']."'>	<br>";
echo "<input type='hidden' name='fotoAntigua' value='".$dato['foto']."'>";
echo "<input type='submit' name='enviarModificar'><br>";
echo "</form>";
require "../vistas/parciales/fin.parcial.php";
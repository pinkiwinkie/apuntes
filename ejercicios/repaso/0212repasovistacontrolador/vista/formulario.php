<?php


echo "<form action='' enctype='multipart/form-data' method='post'>";
echo "directorios: " . lista('directorio', $ops) . "<br>";
echo "<input type='file' name='fichero'><br/>";
echo "<input type='submit' name='enviarfichero'>";
echo "</form>";

<?php
setcookie('nombre','',time()-360000);
$dato="Has salido correctamente<br> ";
$dato.="<a href='validar.php'>Validarse</a>";
require "../vistas/mensaje.php";
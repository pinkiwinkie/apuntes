<?php
setcookie('nombre','',time()-360000);
setcookie('id','',time()-360000);
$dato="Has salido correctamente<br> ";
$dato.="<a href='../index.php'>Validarse</a>";
require "../vistas/mensaje.php";
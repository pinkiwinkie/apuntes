<?php
setcookie("num",'',time()-360000);
foreach ($_COOKIE['nombre'] as $key => $value) {
   setcookie("nombre[$key]",'',time()-360000);
}

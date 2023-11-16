<?php
if(isset($_POST['enviar'])){
    // Hemos enviado un nombre a través del formulario
    if(isset($_COOKIE['nombre'])){
        //COPIAMOS el array de cookies a una variable $nombre
        $nombre=$_COOKIE['nombre'];
    }else $nombre= array();//si no existe el array de cookies $nombre= array vacio
    if(!isset($_COOKIE['num'])){
        //si no existe la cookie 'num' la creamos a 0
        setcookie("num",0,time()+360000);
        //COPIAMOS la cookie 'num' en una variable
        $num=0;
    }
    else
        //COPIAMOS la cookie 'num' en una variable
        $num=$_COOKIE['num'];
    setcookie("nombre[$num]",$_POST['nombre'],time()+360000);
    //ACTUALIZAMOS el array $nombre con el nuevo nombre
    $nombre[$num]=$_POST['nombre'];
    setcookie("num",++$num,time()+360000);
    //en lugar de RECORRER el array de la cookie recorremos la variable $nombre
    foreach ($nombre as $orden=>$valor){
        echo "$valor en la posición $orden<br>";
    }
}



echo "<br><form action='' method='post'>";
echo "Nombre: <input type='text' name='nombre'><br> ";
echo "<input type='submit' name='enviar' value='continuar'></form><br>";
echo "<a href='salir.php'>Salir</a><br>";
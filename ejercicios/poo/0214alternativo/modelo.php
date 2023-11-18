<?php
Class Imagen
{
    private $tmp_name;
    private $name;
    private $type;

    function __construct($fichero)
    {
        $this->tmp_name=$fichero['tmp_name'];
        $this->name=$fichero['name'];
        $this->type=$fichero['type'];

    }
    function __get($var)
    {
        return $this->$var;
    }
    function esta_cargado()
    {
        return is_uploaded_file($this->tmp_name);
    }
    function cambiar_nombre(){
        $dir='img/';
        if(!is_dir($dir)) mkdir($dir);
        if(is_file($dir.$this->name)){
            $idUnico=uniqid();		
            $partes=explode(".",$this->name);
            $extension=array_pop($partes);
            $this->name=$dir.implode(".",$partes)."_".$idUnico.".".$extension;
        }else  $this->name=$dir.$this->name;
    }
    function mover(){
        move_uploaded_file ($this->tmp_name,$this->name);
    }

}
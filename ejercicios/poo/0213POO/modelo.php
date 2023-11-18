<?php
class Producto
{
    private $peso;
    private $precio;
    private $stock;

    function __construct($peso,$precio,$stock)
    {
        $this->peso=$peso;
        $this->precio=$precio;
        $this->stock=$stock;
    }
    function __get($var)
    {
        return $this->$var;
    }

    function asignar()
    {
        $vector['peso']=$this->peso;
        $vector['precio']=$this->precio;
        $vector['stock']=$this->stock;
        return $vector;
    }
}

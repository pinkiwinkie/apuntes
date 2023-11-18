<?php
require_once 'ISelectorIndividual.php';

abstract class SelectorIndividual implements ISelectorIndividual
{
    /**
     * @var string
     */
    protected $titulo;
    /**
     * @var string
     */
    protected $nombre;
    /**
     * @var array
     */
    protected $elementos;
    /**
     * @var int
     */
    protected $seleccionado;

    public function __construct(string $titulo, string $nombre, array $elementos, int $seleccionado = 0)
    {
        $this->titulo = $titulo;
        $this->nombre = $nombre;
        $this->elementos = $elementos;
        $this->seleccionado = $seleccionado;
    }

    public abstract function generaSelector(): string;
}
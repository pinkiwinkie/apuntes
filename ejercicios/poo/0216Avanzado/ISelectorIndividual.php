<?php
interface ISelectorIndividual
{
    public function __construct(string $titulo, string $nombre, array $elementos, int $seleccionado=0);

    public function generaSelector() : string;
}
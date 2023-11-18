<?php
require_once 'SelectorIndividual.php';

class SIRadioOpcion extends SelectorIndividual
{

    public function generaSelector(): string
    {
        $i = 0;

        $selector = "<label>$this->titulo</label>";

        foreach($this->elementos as $clave => $valor)
        {
            if ($this->seleccionado === $i)
                $seleccionado = 'checked';
            else
                $seleccionado = '';

            $selector .=  "<label><input type='radio' name='$this->nombre' value='$valor' $seleccionado>$valor</label>";
            $i++;
        }

        return $selector;
    }
}
<?php
require_once 'SelectorIndividual.php';

class SISelect extends SelectorIndividual
{
    public function generaSelector(): string
    {
        $i = 0;

        $selector = "<label>$this->titulo</label>";

        $selector .= "<select name='$this->nombre'>";

        foreach($this->elementos as $clave => $valor)
        {
            if ($this->seleccionado === $i)
                $seleccionado = 'selected';
            else
                $seleccionado = '';

            $selector .= "<option value='$valor' $seleccionado>$valor</option>";

            $i++;
        }

        $selector .= "</select>";

        return $selector;
    }
}
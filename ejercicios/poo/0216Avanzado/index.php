<?php
    if (isset($_POST['enviar']))
    {
        echo "Ciudad es ".$_POST['ciudad']."<BR>";
        echo "Nivel de Idiomas es ".$_POST['nivelIdioma']."<BR>";
        echo "Sexo es ".$_POST['sexo']."<BR>";
        echo "Estado es ".$_POST['estado']."<BR>";
    }else
    {   require_once 'SIRadioOpcion.php';
        require_once 'SISelect.php';

        $selectCiudad = new SISelect('Ciudad', 'ciudad', ['Alicante', 'Valencia', 'Castellón']);
        $selectNivelIdioma = new SISelect('Nivel idioma', 'nivelIdioma', ['Alto', 'Medio', 'Bajo']);
        $radioSexo = new SIRadioOpcion('Sexo', 'sexo', ['Hombre', 'Mujer']);
        $radioEstado = new SIRadioOpcion('Estado', 'estado', ['Encendido', 'Apagado']);

        require 'views/index.view.php';
    }

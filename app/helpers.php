<?php

function generarCodigo($valor, $module){

    switch ($module) {
        case 'p':
            $letras = 'P-BK';
            break;
        case 'c':
            $letras = 'C-BK';
            break;
        default:
            # code...
            break;
    }
    //$letras = 'BK';
    $longitudTotal = 9;

    $cantidadCeros = $longitudTotal - strlen($letras) - strlen($valor);
    $codigo = $letras . '-' . str_repeat('0', $cantidadCeros) . $valor;

    return $codigo;
}

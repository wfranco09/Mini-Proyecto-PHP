<?php

namespace App\Models;

use App\Utilities\Utilidades;

class Problema3Model
{
    public function calcularSuma(): int
    {
        // Utilizamos la función sumarRango de Utilidades para calcular la suma del 1 al 1000
        return Utilidades::sumarRango(1, 1000);
    }
}
?>
<?php

namespace App\Models;

use App\Utilities\Utilidades;

class Problema3Model
{
    public function calcularSuma(): int
    {
        return Utilidades::sumarRango(1, 1000);
    }
}
?>
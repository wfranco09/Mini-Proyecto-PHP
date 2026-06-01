<?php

namespace App\Models;

use App\Utilities\Utilidades;

class Problema1Model
{
    public function calcular(array $numeros): array
    {
        $cantidad = count($numeros);

        $media = array_sum($numeros) / $cantidad;

        $sumaDiferenciasCuadrado = 0;

        foreach ($numeros as $numero) {
            $sumaDiferenciasCuadrado += Utilidades::cuadrado(
                $numero - $media
            );
        }

        $desviacion = Utilidades::raizCuadrada(
            $sumaDiferenciasCuadrado / ($cantidad - 1)
        );

        return [
            'media' => $media,
            'desviacion' => $desviacion,
            'minimo' => min($numeros),
            'maximo' => max($numeros)
        ];
    }
}
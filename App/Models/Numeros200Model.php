<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo para obtener números pares o impares del 1 al 200.
 * Problema #4: Números del 1 al 200.
 */

class Numeros200Model
{
    /**
     * Retorna un arreglo de números pares o impares entre 1 y 200.
     *
     * @param string $tipo 'pares' o 'impares'
     * @return array<int>
     * 
     */
    public function obtenerNumeros(string $tipo): array
    {
        $numeros = [];
        for ($i = 1; $i <= 200; $i++) {
            if ($tipo === 'pares' && $i % 2 === 0) {
                $numeros[] = $i;
            }

            if ($tipo === 'impares' && $i % 2 !== 0) {
                $numeros[] = $i;
            }
        }
        return $numeros;
    }

    public function sumarNumeros(array $numeros): int
    {
        return array_sum($numeros);
    }
}
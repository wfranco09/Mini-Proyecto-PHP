<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo para calcular potencias de un número.
 * Problema #9: 15 primeras potencias de un número (1-9).
 */
class PotenciaModel
{
    /**
     * Genera las 15 primeras potencias de un número.
     *
     * @return array<int, array<string, int>>
     */
    public function calcularPotencias(int $base): array
    {
        $potencias = [];

        for ($exponente = 1; $exponente <= 15; $exponente++) {
            $potencias[] = [
                'base'      => $base,
                'exponente' => $exponente,
                'resultado' => (int) pow($base, $exponente),
            ];
        }

        return $potencias;
    }
}
<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo para calcular estadísticas de notas.
 * Problema #7: Calculadora de Datos Estadísticos.
 */
class EstadisticaModel
{
    /**
     * Calcula promedio, desviación estándar, mínimo y máximo.
     *
     * @param array<float> $notas
     * @return array<string, float>
     */
    public function calcularEstadisticas(array $notas): array
    {
        $cantidad = count($notas);
        $promedio = array_sum($notas) / $cantidad;

        // Desviación estándar: sqrt( suma(x - media)^2 / n-1 )
        $sumaDiferencias = 0.0;
        foreach ($notas as $nota) {
            $sumaDiferencias += ($nota - $promedio) ** 2;
        }

        $desviacion = sqrt($sumaDiferencias / ($cantidad - 1));

        return [
            'promedio'   => round($promedio, 2),
            'desviacion' => round($desviacion, 2),
            'minima'     => min($notas),
            'maxima'     => max($notas),
            'cantidad'   => $cantidad,
        ];
    }
}
<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo para determinar la estación del año.
 * Tabla según referencia del taller (pág. 10).
 */
class EstacionModel
{
    /**
     * Tabla de estaciones según el taller:
     * Verano:    21-dic → 20-mar
     * Otoño:     21-mar → 21-jun
     * Invierno:  22-jun → 22-sep
     * Primavera: 23-sep → 20-dic
     */
    private const ESTACIONES = [
        [
            'nombre' => 'Verano',
            'inicio' => '12-21',
            'fin'    => '03-20',
            'imgs'   => 'imgs/Veranoo.jpg',
            'color'  => '#fef9c3',
            'texto'  => '#92400e',
        ],
        [
            'nombre' => 'Otoño',
            'inicio' => '03-21',
            'fin'    => '06-21',
            'imgs'   => 'imgs/Otoño.jpeg',
            'color'  => '#ffedd5',
            'texto'  => '#9a3412',
        ],
        [
            'nombre' => 'Invierno',
            'inicio' => '06-22',
            'fin'    => '09-22',
            'imgs'   => 'imgs/Invierno.jpeg',
            'color'  => '#dbeafe',
            'texto'  => '#1e3a8a',
        ],
        [
            'nombre' => 'Primavera',
            'inicio' => '09-23',
            'fin'    => '12-20',
            'imgs' => 'imgs/Primavera.png',
            'color'  => '#d1fae5',
            'texto'  => '#065f46',
        ],
    ];

    /**
     * Retorna la estación correspondiente a la fecha dada.
     *
     * @return array<string, string>|null
     */
    public function obtenerEstacion(string $fecha): ?array
    {
        $dt   = new \DateTime($fecha);
        $mmdd = $dt->format('m-d');

        foreach (self::ESTACIONES as $estacion) {
            if ($this->estaEnRango($mmdd, $estacion['inicio'], $estacion['fin'])) {
                return $estacion;
            }
        }

        return null;
    }

    /**
     * Verifica si MM-DD está dentro del rango.
     * Maneja rangos que cruzan fin de año (ej. Verano: 12-21 → 03-20).
     */
    private function estaEnRango(string $mmdd, string $inicio, string $fin): bool
    {
        if ($inicio > $fin) {
            return $mmdd >= $inicio || $mmdd <= $fin;
        }

        return $mmdd >= $inicio && $mmdd <= $fin;
    }
}
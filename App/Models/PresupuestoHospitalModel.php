<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo base para el Problema #6: Presupuesto de Hospital.
 */
class PresupuestoHospitalModel
{
    public $porcentajeGinecologia = 0.40;
    public $porcentajeTraumatologia = 0.35;
    public $porcentajePediatria =0.25;


    public function getTituloTarjeta(): string
    {
        return 'Presupuesto de Hospital';
    }

    public function getDescripcionTarjeta(): string
    {
        return 'Indique la cantidad de dinero asignada al hospital.';
    }

    public function calcularDistribucion(float $presupuestoTotal): array
    {
        return [
            'Ginecología' => round($presupuestoTotal * $this->porcentajeGinecologia, 2),
            'Traumatología' => round($presupuestoTotal * $this->porcentajeTraumatologia, 2),
            'Pediatría' => round($presupuestoTotal * $this->porcentajePediatria, 2),
        ];
    }

    /**
     * Devuelve los porcentajes (en porcentaje, no fracción) para cada departamento.
     *
     * @return array<string, float>
     */
    public function getPorcentajesPercent(): array
    {
        return [
            'Ginecología' => $this->porcentajeGinecologia * 100,
            'Traumatología' => $this->porcentajeTraumatologia * 100,
            'Pediatría' => $this->porcentajePediatria * 100,
        ];
    }

    /**
     * Colores para la gráfica, indexados por departamento.
     *
     * @return array<string, string>
     */
    public function getColores(): array
    {
        return [
            'Ginecología' => '#60a5fa',
            'Traumatología' => '#f97316',
            'Pediatría' => '#34d399',
        ];
    }

    
}
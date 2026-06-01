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
    public function getColores(): array
    
    

    
}
<?php

namespace App\Models;

class Problema2Model
{
    // Genera los primeros $cantidad múltiplos de 4
    public function generarMultiplos(int $cantidad): array
    {
        $multiplos = [];

        for ($i = 1; $i <= $cantidad; $i++) {

            $multiplos[] = [
                'operacion' => "4 × {$i}",
                'resultado' => 4 * $i
            ];
        }

        return $multiplos;
    }
}
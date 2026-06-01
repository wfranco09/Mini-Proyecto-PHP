<?php

namespace App\Models;

class Problema2Model
{
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
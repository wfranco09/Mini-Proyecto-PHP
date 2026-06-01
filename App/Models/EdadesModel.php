<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Modelo para clasificar edades en una categoría básica.
 * Problema #5: Clasificación de edades.
 */
class EdadesModel
{
    public function clasificarEdad(int $edad): string
    {
        if ($edad < 1) {
            return 'Edad inválida';
        }

        if ($edad <= 12) {
            return 'Niño';
        }

        if ($edad <= 17) {
            return 'Adolescente';
        }

        if ($edad <= 64) {
            return 'Adulto';
        }

        return 'Adulto mayor';
    }

    public function devolverColor(int $edad): string
    {

        if ($edad <= 12) {
            return '#60a5fa'; // azul para niños
        }

        if ($edad <= 17) {
            return '#fbbf24'; // amarillo para adolescentes
        }

        if ($edad <= 64) {
            return '#34d399'; // verde para adultos
        }

        return '#a78bfa'; // morado para adultos mayores
    }
}
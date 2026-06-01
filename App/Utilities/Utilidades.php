<?php

declare(strict_types=1);

namespace App\Utilities;

/**
 * Clase de utilidades estáticas.
 * Validación, sanitización y helpers.
 * PSR-1 | OWASP A03:2021
 */
class Utilidades
{
    /**
     * Sanitiza contra XSS (OWASP A03:2021).
     */
    public static function limpiarXss(string $valor): string
    {
        return htmlspecialchars(strip_tags(trim($valor)), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Valida formato de fecha YYYY-MM-DD.
     */
    public static function esFechaValida(string $fecha): bool
    {
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $fecha) !== 1) {
            return false;
        }

        [$anio, $mes, $dia] = explode('-', $fecha);

        return checkdate((int) $mes, (int) $dia, (int) $anio);
    }

    /**
     * Retorna $var si existe, sino $default.
     */
    public static function nvl(mixed $var, mixed $default = ''): mixed
    {
        return isset($var) && $var !== '' ? $var : $default;
    }

    /**
     * Genera enlace de navegación seguro. (Punto 12 del taller)
     */
    public static function enlaceNavegacion(string $url, string $etiqueta): string
    {
        $urlSegura = filter_var($url, FILTER_SANITIZE_URL);
        return '<a href="' . $urlSegura . '">' . self::limpiarXss($etiqueta) . '</a>';
    }

    /**
     * Calcula el cuadrado de un número.
     */
    public static function cuadrado(float $numero): float
    {
        return pow($numero, 2);
    }

    /**
     * Calcula la raíz cuadrada de un número.
     */
    public static function raizCuadrada(float $numero): float
    {
      return sqrt($numero);
    }

    /**
     * Valida que un valor sea un número positivo.
     */
    public static function validarNumeroPositivo($valor): bool
    {
        return filter_var(
            $valor,
            FILTER_VALIDATE_FLOAT
        ) !== false && $valor >= 0;
    }
}
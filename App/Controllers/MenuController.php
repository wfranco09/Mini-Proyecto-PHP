<?php

declare(strict_types=1);

namespace App\Controllers;

/**
 * Controlador del menú principal.
 * Muestra los 9 problemas del taller.
 */
class MenuController
{
    public function index(): void
    {
        $rutaVista = __DIR__ . '/../View/menu.php';

        if (file_exists($rutaVista)) {
            require $rutaVista;
        }
    }
}
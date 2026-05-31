<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\EstacionController;
use App\Controllers\MenuController;
use App\Controllers\EstadisticaController; 
use App\Controllers\PotenciaController; 

// Sanitización OWASP: limpiar parámetro GET
$problema = filter_input(INPUT_GET, 'problema', FILTER_SANITIZE_NUMBER_INT);
$problema = $problema ?? '0';

switch ($problema) {


    case '9':
        $controller = new PotenciaController();
        $controller->index();
        break;

    case '8':
        $controller = new EstacionController();
        $controller->index();
        break;

    case '7':
        $controller = new EstadisticaController();
        $controller->index();
        break;

        // agreguen sus caso de los demás problemas acá en el switch colegas

    default:
        $controller = new MenuController();
        $controller->index();
        break;
}
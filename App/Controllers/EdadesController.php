<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\EdadesModel;
use App\Utilities\Utilidades;

/**
 * Controlador para el Problema #5: Clasificación de edades.
 */
class EdadesController
{
    private EdadesModel $model;

    public function __construct()
    {
        $this->model = new EdadesModel();
    }

    public function index(): void
    {
        $edades = array_fill(0, 5, '');
        $registrosEdades = [];
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $edadesPost = $_POST['edades'] ?? [];

            if (!is_array($edadesPost) || count($edadesPost) !== 5) {
                $error = 'Debes ingresar exactamente 5 edades.';
            } else {
                foreach ($edadesPost as $indice => $valorEdad) {
                    $edadLimpia = (int) Utilidades::limpiarXss((string) $valorEdad);

                    if ($edadLimpia < 1 || $edadLimpia > 120) {
                        $error = 'Todas las edades deben estar entre 1 y 120.';
                        break;
                    }

                    $edades[$indice] = $edadLimpia;
                    $registrosEdades[] = [
                        'edad' => $edadLimpia,
                        'categoria' => $this->model->clasificarEdad($edadLimpia),
                        'color' => $this->model->devolverColor($edadLimpia),
                    ];
                }
            }
        }

        $this->cargarVista('edades', [
            'edades' => $edades,
            'registrosEdades' => $registrosEdades,
            'cantidadEdad' => count($registrosEdades),
            'error' => $error,
        ]);
    }

    /**
     * @param array<string, mixed> $datos
     */
    private function cargarVista(string $nombreVista, array $datos = []): void
    {
        extract($datos);
        $rutaVista = __DIR__ . '/../View/' . $nombreVista . '.php';

        if (file_exists($rutaVista)) {
            require $rutaVista;
        }
    }
}
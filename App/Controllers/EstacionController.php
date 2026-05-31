<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\EstacionModel;
use App\Utilities\Utilidades;

/**
 * Controlador para el Problema #8: Estación del Año.
 * Coordina la petición entre Model y View.
 */
class EstacionController
{
    private EstacionModel $model;

    public function __construct()
    {
        $this->model = new EstacionModel();
    }

    /**
     * Acción principal: procesa el POST y carga la vista.
     */
    public function index(): void
    {
        $estacion = null;
        $fecha    = '';
        $error    = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Sanitización OWASP A03:2021 - limpiar antes de procesar
            $fecha = Utilidades::limpiarXss($_POST['fecha'] ?? '');

            if (Utilidades::esFechaValida($fecha)) {
                $estacion = $this->model->obtenerEstacion($fecha);

                if ($estacion === null) {
                    // Error genérico - no exponer detalles internos (OWASP)
                    $error = 'No se pudo determinar la estación para esa fecha.';
                }
            } else {
                $error = 'Por favor ingresa una fecha válida.';
            }
        }

        $this->cargarVista('estacion', [
            'estacion' => $estacion,
            'fecha'    => $fecha,
            'error'    => $error,
        ]);
    }

    /**
     * Carga un archivo de vista con los datos dados.
     *
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
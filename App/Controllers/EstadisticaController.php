<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\EstadisticaModel;
use App\Utilities\Utilidades;

/**
 * Controlador para el Problema #7: Calculadora de Datos Estadísticos.
 */
class EstadisticaController
{
    private EstadisticaModel $model;

    public function __construct()
    {
        $this->model = new EstadisticaModel();
    }

    /**
     * Acción principal: procesa el formulario y carga la vista.
     */
    public function index(): void
    {
        $estadisticas = null;
        $notas        = [];
        $cantidad     = 0;
        $error        = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Sanitización OWASP A03:2021
            $cantidad = (int) Utilidades::limpiarXss($_POST['cantidad'] ?? '');

            if ($cantidad < 2) {
                $error = 'Debes ingresar al menos 2 notas.';

            } elseif (!isset($_POST['notas']) || !is_array($_POST['notas'])) {
                // Paso 1: solo recibió cantidad, todavía no hay notas
                // No hace nada, la vista mostrará el formulario de notas

            } else {
                // Paso 2: recoger y validar cada nota con foreach
                foreach ($_POST['notas'] as $nota) {
                    $notaLimpia = Utilidades::limpiarXss($nota);

                    if (!is_numeric($notaLimpia)) {
                        $error = 'Todas las notas deben ser números válidos.';
                        $notas = [];
                        break;
                    }

                    $notas[] = (float) $notaLimpia;
                }

                if (empty($error) && count($notas) === $cantidad) {
                    $estadisticas = $this->model->calcularEstadisticas($notas);
                }
            }
        }

        $this->cargarVista('estadistica', [
            'estadisticas' => $estadisticas,
            'notas'        => $notas,
            'cantidad'     => $cantidad,
            'error'        => $error,
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
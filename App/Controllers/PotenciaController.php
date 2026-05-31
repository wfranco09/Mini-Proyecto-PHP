<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\PotenciaModel;
use App\Utilities\Utilidades;

/**
 * Controlador para el Problema #9: Potencias de un número.
 */
class PotenciaController
{
    private PotenciaModel $model;

    public function __construct()
    {
        $this->model = new PotenciaModel();
    }

    /**
     * Acción principal: procesa el formulario y carga la vista.
     */
    public function index(): void
    {
        $potencias = null;
        $numero    = 0;
        $error     = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Sanitización OWASP A03:2021
            $numero = (int) Utilidades::limpiarXss($_POST['numero'] ?? '');

            if ($numero < 1 || $numero > 9) {
                $error = 'El número debe estar entre 1 y 9.';
            } else {
                $potencias = $this->model->calcularPotencias($numero);
            }
        }

        $this->cargarVista('potencia', [
            'potencias' => $potencias,
            'numero'    => $numero,
            'error'     => $error,
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
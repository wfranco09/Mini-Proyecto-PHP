<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\PresupuestoHospitalModel;

/**
 * Controlador para el Problema #6: Presupuesto de Hospital.
 */
class PresupuestoHospitalController
{
    private PresupuestoHospitalModel $model;

    public function __construct()
    {
        $this->model = new PresupuestoHospitalModel();
    }

    public function index(): void
    {
        $presupuestoTotal = 0.0;
        $distribucion = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $raw = $_POST['presupuesto_total'] ?? '';
            $presupuestoTotal = (float) filter_var((string) $raw, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            if ($presupuestoTotal > 0) {
                $distribucion = $this->model->calcularDistribucion($presupuestoTotal);
            }
            else {
                $presupuestoTotal = 0.0;
                $distribucion = [];
            }
        }

        $this->cargarVista('presupuestoHospital', [
            'tituloTarjeta' => $this->model->getTituloTarjeta(),
            'descripcionTarjeta' => $this->model->getDescripcionTarjeta(),
            'presupuestoTotal' => $presupuestoTotal,
            'distribucion' => $distribucion,
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
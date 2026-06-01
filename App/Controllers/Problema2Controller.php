<?php

namespace App\Controllers;

use App\Models\Problema2Model;
use App\Utilities\Utilidades;

class Problema2Controller
{
    private Problema2Model $model;

    public function __construct()
    {
        $this->model = new Problema2Model();
    }

    public function index()
    {
        $resultado = [];
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $n = $_POST['cantidad'] ?? '';

            if (!Utilidades::validarNumeroPositivo($n)) {

                $error = 'Ingrese un número válido.';
            }
            elseif ($n > 2000) {

                $error = 'Para evitar desbordamientos, el máximo permitido es 2000.';
            }
            else {

                $resultado = $this->model->generarMultiplos((int)$n);
            }
        }

        require_once __DIR__ . '/../View/problema2.php';
    }
}
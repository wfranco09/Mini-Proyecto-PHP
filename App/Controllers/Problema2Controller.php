<?php

namespace App\Controllers;

use App\Models\Problema2Model;
use App\Utilities\Utilidades;

class Problema2Controller
{
    private Problema2Model $model;

    // Inyectamos el modelo en el constructor
    public function __construct()
    {
        $this->model = new Problema2Model();
    }

    // Controlador para manejar la lógica de la vista del problema 2
    public function index()
    {
        $resultado = [];
        $error = null;

        // Verificamos si se ha enviado el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $n = $_POST['cantidad'] ?? '';

            // Validamos que el número sea positivo y no excesivamente grande para evitar problemas de rendimiento
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
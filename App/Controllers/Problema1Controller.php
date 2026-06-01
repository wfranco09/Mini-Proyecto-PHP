<?php

namespace App\Controllers;

use App\Models\Problema1Model;
use App\Utilities\Utilidades;

class Problema1Controller
{
    private Problema1Model $model;

    public function __construct()
    {
        $this->model = new Problema1Model();
    }

    public function index()
    {
        $resultado = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $numeros = [
                $_POST['num1'],
                $_POST['num2'],
                $_POST['num3'],
                $_POST['num4'],
                $_POST['num5']
            ];

            foreach ($numeros as $numero) {
                if (!Utilidades::validarNumeroPositivo($numero)) {
                $error = "Todos los números deben ser positivos.";
                break;
            }
}

            if (!$error) {
                $resultado = $this->model->calcular($numeros);
            }
        }

        require_once __DIR__ . '/../View/problema1.php';
    }
}
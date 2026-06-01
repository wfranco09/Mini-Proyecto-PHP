<?php

namespace App\Controllers;

use App\Models\Problema3Model;

class Problema3Controller
{
    private Problema3Model $model;

    public function __construct()
    {
        $this->model = new Problema3Model();
    }

    public function index()
    {
        $resultado = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resultado = $this->model->calcularSuma();
        }

        require_once __DIR__ . '/../View/problema3.php';
    }
}
?>
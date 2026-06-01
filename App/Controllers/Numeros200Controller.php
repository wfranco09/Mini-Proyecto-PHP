<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Utilities\Utilidades;

/**
 * Controlador para el Problema #4: Números del 1 al 200.
 * Procesa la selección (pares/impares) y pasa resultados a la vista.
 */
class Numeros200Controller
{
    public function index(): void
    {
        $numeros   = null;
        $operacion = '';
        $error     = '';
        $suma = 0;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $operacion = Utilidades::limpiarXss($_POST['operacion'] ?? '');

            if (!in_array($operacion, ['pares', 'impares'], true)) {
                $error = 'Operación no válida.';
            } else {
                $modelo = new \App\Models\Numeros200Model(); // instanciamos el modelo
                $numeros = $modelo->obtenerNumeros($operacion); // obtenemos los números según la operación
                $suma = $modelo->sumarNumeros($numeros); // calculamos la suma de los números obtenidos
            }
        }

        $this->cargarVista('numeros200', [
            'numeros'   => $numeros,
            'operacion' => $operacion,
            'error'     => $error,
            'suma'      => $suma,
        ]);
    }

    /**
     * Renderiza una vista pasando datos.
     *
     * @param array<string,mixed> $datos
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
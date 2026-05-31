<?php
$tituloPagina = 'Menú Principal';
require __DIR__ . '/partials/header.php';
?>

<div class="card">
    <img src="imgs/TITULO.jpg" alt="TITULO" style="width: 300px; display: block; margin: 0 auto 20px;">
    <h4>Mas, Córdoba, Franco</h4>
    <h1> Mini Proyecto </h1>
    <p style="text-align:center; color:#475569; margin-bottom:24px;">
        Selecciona un problema
    </p>

    <ul style="list-style:none; display:flex; flex-direction:column; gap:10px;">

        <?php
        // DRY: arreglo con los problemas, se recorre con foreach
        $problemas = [
            1 => 'Media, desviación estándar, min y máx',
            2 => 'Suma del 1 al 1,000',
            3 => 'Múltiplos de 4',
            4 => 'Suma pares e impares del 1 al 200',
            5 => 'Clasificación de edades',
            6 => 'Presupuesto hospitalario',
            7 => 'Calculadora de datos estadísticos',
            8 => 'Estación del año',
            9 => 'Potencias de un número',
        ];

        foreach ($problemas as $num => $descripcion): ?>
            <li>
                <a href="index.php?problema=<?= $num ?>"
                   style="display:block; padding:12px 16px; background:#f1f5f9;
                          border-radius:8px; text-decoration:none; color:#1e293b;
                          border-left:4px solid #2563eb;">
                    <strong>Problema #<?= $num ?></strong> — <?= htmlspecialchars($descripcion) ?>
                </a>
            </li>
        <?php endforeach; ?>

    </ul>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
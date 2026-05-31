<?php

declare(strict_types=1);

use App\Utilities\Utilidades;

/** @var array<string,string>|null $estacion */
/** @var string $fecha */
/** @var string $error */

$tituloPagina = '¿Qué estación es?';
require __DIR__ . '/partials/header.php';
?>

<div class="card">
    <h1>¿Qué estación es?</h1>
    <form method="POST" action="">
        <label for="fecha">Ingresa una fecha:</label>
        <input
            type="date"
            id="fecha"
            name="fecha"
            value="<?= htmlspecialchars($fecha) ?>"
            required
        >
        <button type="submit">Mostrar</button>
    </form>

    <?php if ($error !== ''): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($estacion !== null): ?>
        <?php
            // Mostrar fecha en formato dd-mm (como salida esperada del taller)
            $dt         = new DateTime($fecha);
            $fechaCorta = $dt->format('d-m');
        ?>
        <div class="resultado"
            style="background: <?= $estacion['color'] ?>;
                    color: <?= $estacion['texto'] ?>;">
            <p>Fecha ingresada: <strong><?= htmlspecialchars($fechaCorta) ?></strong></p>
            <p style="margin-top: 8px;">
                La estación es:
                <strong><?= htmlspecialchars($estacion['nombre']) ?></strong>
            </p>
            <img
                src="<?= htmlspecialchars($estacion['imgs']) ?>"
                alt="<?= htmlspecialchars($estacion['nombre']) ?>"
                style="width: 100%; max-width: 500px; border-radius: 10px; margin-top: 14px;"
            >
        </div>
    <?php endif; ?>

    <?php
        // Punto 12: enlace al menú generado por función utilitaria
        echo Utilidades::enlaceNavegacion('index.php', '← Volver al menú principal');
    ?>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
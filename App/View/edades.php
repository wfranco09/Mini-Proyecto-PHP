<?php

declare(strict_types=1);

/** @var array<int, string|int> $edades */
/** @var array<int, array{edad:int,categoria:string,color:string}> $registrosEdades */
/** @var int $cantidadEdad */
/** @var string $error */

$tituloPagina = 'Clasificación de edades';
require __DIR__ . '/partials/header.php';
?>

<style>
    .edad-card {
        background: #fff;
        border-radius: 16px;
        padding: 40px;
        width: 100%;
        max-width: 520px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, .08);
    }

    .resultado-box {
        margin-top: 20px;
        padding: 16px;
        border-radius: 10px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-top: 3px solid #2563eb;
        text-align: center;
    }

    .edades-grid {

        gap: 12px;
        padding-top: 12px;
        padding-bottom: 12px;
        margin-top: 12px;
    }

    .edad-input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font-size: 1rem;
    }

    .edades-lista {
        margin-top: 16px;
        padding-left: 20px;
        color: #475569;
    }

    .registro-item {
        margin-bottom: 8px;
    }
</style>

<div class="edad-card">
    <h1>Clasificación de edades</h1>

    <?php if ($cantidadEdad === 0): ?>
        <form method="post" action="">
            <label>Ingresa 5 edades:</label>

            <div class="edades-grid">
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <input class="edad-input" type="number" name="edades[]" min="1" max="120"
                        value="<?= htmlspecialchars((string) ($edades[$i] ?? '')) ?>" placeholder="Edad <?= $i + 1 ?>" required>
                <?php endfor; ?>
            </div>

            <button type="submit">Calcular</button>
        </form>

        <p style="text-align:center; margin-top:16px;">
            <a href="index.php" style="color:#2563eb; text-decoration:none;">← Volver</a>
        </p>
    <?php endif; ?>

    <?php if ($error !== ''): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($cantidadEdad > 0): ?>
        <p style="margin-top:16px; color:#475569;">
            Se procesaron <strong style="color:#2563eb;"><?= $cantidadEdad ?></strong>
            edad<?= $cantidadEdad > 1 ? 'es' : '' ?>.
        </p>

        <ul class="edades-lista">
            <?php foreach ($registrosEdades as $indice => $registro): ?>

                <li class="registro-item">
                    Edad #<?= $indice + 1 ?>: <strong><?= htmlspecialchars((string) $registro['edad']) ?></strong> -
                    Categoría:
                    <strong
                        style="color:<?= htmlspecialchars($registro['color']) ?>;"><?= htmlspecialchars($registro['categoria']) ?></strong>
                    </p>


                </li>
            <?php endforeach; ?>
        </ul>

        <div style="text-align:center; margin-top:12px;">
            <form method="get" action="">
                <input type="hidden" name="problema" value="5">
                <button type="submit">Reiniciar</button>
            </form>
        </div>

        <p style="text-align:center; margin-top:16px;">
            <a href="index.php" style="color:#2563eb; text-decoration:none;">← Volver</a>
        </p>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
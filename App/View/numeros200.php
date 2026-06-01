<?php

use App\Utilities\Utilidades;

/** @var array<int>|null $numeros */
/** @var string $operacion */
/** @var string $error */
/** @var int $suma  */

$tituloPagina = 'Calculadora Estadística';
require __DIR__ . '/partials/header.php';
?>

<style>
    .operacion-btn {
        padding: 14px;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        background: #f8fafc;
        font-size: 1.2rem;
        font-weight: bold;
        cursor: pointer;
        color: #1e293b;
        transition: all .2s;
    }

    .numero-grid {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        gap: 8px;
        margin-top: 16px;
    }

    .numero-box {
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #e2e8f0;
        text-align: center;
        font-weight: 600;
        color: #1e293b;
    }

    .resultado-box {
        margin-top: 20px;
        padding: 14px;
        border-radius: 10px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-top: 3px solid #2563eb;
        text-align: center;
    }

    .cardNumeros {
        background: #fff;
        border-radius: 16px;
        padding: 40px;
        width: 100%;
        max-width: 700px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, .08);
    }
</style>

<div class="cardNumeros">
    <h1>Selecciona una opción</h1>

    <?php if ($numeros === null): ?>
        <form method="post" action="">
            <div class="numero-select">
                <button type="submit" name="operacion" value="pares" class="operacion-btn">Números pares</button>
                <button type="submit" name="operacion" value="impares" class="operacion-btn">Números impares</button>
            </div>
            <p style="text-align:center; margin-top:16px;">
                <a href="index.php" style="color:#2563eb; text-decoration:none;">← Volver</a>
            </p>
        </form>

    <?php else: ?>
        <p style="text-align:center; color:#475569; margin-bottom:8px;">
            Los números <strong
                style="color:#2563eb; text-transform:capitalize;"><?= htmlspecialchars($operacion) ?></strong>
            entre 1 y 200 son:
        </p>

        <?php if ($error !== ''): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <div class="numero-grid">
            <?php foreach ($numeros as $n): ?>
                <div class="numero-box"><?= number_format($n, 0, '.', ',') ?></div>
            <?php endforeach; ?>
        </div>

        <div class="resultado-box">
            <p style="margin:0; color:#475569;">
                La suma de los números <strong
                    style="color:#2563eb; text-transform:capitalize;"><?= htmlspecialchars($operacion) ?></strong>
                es:
            </p>
            <p style="margin:0; font-size:1.5rem; font-weight:600; color:#2563eb;">
                <?= number_format($suma, 0, '.', ',') ?>
            </p>
        </div>

        <p style="text-align:center; margin-top:16px;">
            <a href="index.php" style="color:#2563eb; text-decoration:none;">← Volver</a>
        </p>
    <?php endif; ?>

</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
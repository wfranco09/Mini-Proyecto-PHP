<?php

declare(strict_types=1);

use App\Utilities\Utilidades;

/** @var array<int, array<string, int>>|null $potencias */
/** @var int $numero */
/** @var string $error */

$tituloPagina = 'Potencias de un número';
require __DIR__ . '/partials/header.php';
?>

<style>
    .potencias-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        margin-top: 20px;
    }

    .potencia-box {
        padding: 14px;
        border-radius: 10px;
        text-align: center;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-top: 3px solid #2563eb;
    }

    .potencia-box .exponente {
        font-size: .8rem;
        color: #94a3b8;
        margin-bottom: 4px;
    }

    .potencia-box .operacion {
        font-size: .95rem;
        color: #475569;
        margin-bottom: 6px;
    }

    .potencia-box .resultado {
        font-size: 1.2rem;
        font-weight: bold;
        color: #1e293b;
        word-break: break-all;
    }

    .numero-select {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        margin-top: 12px;
    }

    .numero-btn {
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

    .numero-btn:hover {
        background: #2563eb;
        color: #fff;
        border-color: #2563eb;
    }
</style>

<div class="card">
    <h1>Potencias de un número</h1>

    <?php if ($potencias === null): ?>
        <img src="imgs/TITULO4.gif" alt="TITULO" style="width: 200px; display: block; margin: 0 auto 20px;">
        <!-- Formulario: seleccionar número -->
        <form method="POST" action="">
            <label>Selecciona un número del 1 al 9:</label>

            <div class="numero-select">
                <?php for ($i = 1; $i <= 9; $i++): ?>
                    <button
                        type="submit"
                        name="numero"
                        value="<?= $i ?>"
                        class="numero-btn"
                    >
                        <?= $i ?>
                    </button>
                <?php endfor; ?>
            </div>
        </form>

    <?php else: ?>
        <!-- Mostrar resultados -->
        <p style="text-align:center; color:#475569; margin-bottom:4px;">
            15 primeras potencias de
            <strong style="color:#2563eb; font-size:1.2rem;"><?= $numero ?></strong>
        </p>

        <div class="potencias-grid"> <!-- parte de la operación de su potencia, haciendo la locura de subirle el exponente -->  
            <?php foreach ($potencias as $p): ?>
                <div class="potencia-box">
                    <div class="exponente">Potencia <?= $p['exponente'] ?></div>
                    <div class="operacion">
                        <?= $p['base'] ?> <sup><?= $p['exponente'] ?></sup>
                    </div>
                    <div class="resultado">
                        <?= number_format($p['resultado'], 0, '.', ',') ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>

    <?php if ($error !== ''): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php echo Utilidades::enlaceNavegacion('index.php', '← Volver al menú principal'); ?>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
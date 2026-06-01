<?php

declare(strict_types=1);

use App\Utilities\Utilidades;

/** @var array<string, float>|null $estadisticas */
/** @var array<float> $notas */
/** @var int $cantidad */
/** @var string $error */

$tituloPagina = 'Calculadora Estadística';
require __DIR__ . '/partials/header.php';
?>

<style>
    .stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-top: 20px;
    }

    .stat-box {
        padding: 16px;
        border-radius: 10px;
        text-align: center;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
    }

    .stat-box span {
        display: block;
        font-size: .8rem;
        color: #94a3b8;
        margin-bottom: 4px;
    }

    .stat-box strong {
        font-size: 1.4rem;
        color: #1e293b;
    }

    .notas-ingresadas {
        margin-top: 16px;
        padding: 12px 16px;
        background: #f1f5f9;
        border-radius: 8px;
        font-size: .9rem;
        color: #475569;
    }

    .inputs-notas {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        margin-top: 12px;
    }

    .inputs-notas input {
        padding: 10px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font-size: 1rem;
        width: 100%;
    }
</style>

<div class="card">
    <h1>Calculadora Estadística</h1>
    
    <?php if ($cantidad === 0): ?>
        <img src="imgs/TITULO2.gif" alt="TITULO" style="width: 300px; display: block; margin: 0 auto 20px;">

        <!-- Paso 1: pedir cantidad de notas -->
        <form method="POST" action="">
            <label for="cantidad">¿Cuántas notas deseas ingresar?</label>
            <input
                type="number"
                id="cantidad"
                name="cantidad"
                min="2"
                max="50"
                placeholder="Ej: 5"
                required
                style="width:100%; padding:10px; border:1px solid #cbd5e1;
                       border-radius:8px; font-size:1rem; margin-top:6px;"
            >
            <button type="submit">Continuar →</button>
        </form>

    <?php elseif ($estadisticas === null): ?>
        <!-- Paso 2: ingresar las notas -->
        <p style="color:#475569; margin-bottom:16px;">
            Ingresa las <strong><?= $cantidad ?></strong> notas:
        </p>

        <form method="POST" action="">
            <input type="hidden" name="cantidad" value="<?= $cantidad ?>">

            <div class="inputs-notas">
                <?php for ($i = 0; $i < $cantidad; $i++): ?>
                    <input
                        type="number"
                        name="notas[]"
                        min="0"
                        max="100"
                        step="0.01"
                        placeholder="Nota <?= $i + 1 ?>"
                        required
                    >
                <?php endfor; ?>
            </div>

            <button type="submit" style="margin-top:16px;">Calcular</button>
        </form>

    <?php else: ?>
        <!-- Paso 3: mostrar resultados -->
        <div class="notas-ingresadas">
            Notas ingresadas:
            <strong>
                <?= implode(', ', array_map(fn($n) => htmlspecialchars((string)$n), $notas)) ?>
            </strong>
        </div>

        <div class="stats-grid">
            <div class="stat-box" style="border-top: 3px solid #2563eb;">
                <span>Promedio</span>
                <strong><?= $estadisticas['promedio'] ?></strong>
            </div>
            <div class="stat-box" style="border-top: 3px solid #7c3aed;">
                <span>Desviación estándar</span>
                <strong><?= $estadisticas['desviacion'] ?></strong>
            </div>
            <div class="stat-box" style="border-top: 3px solid #16a34a;">
                <span>Nota máxima</span>
                <strong><?= $estadisticas['maxima'] ?></strong>
            </div>
            <div class="stat-box" style="border-top: 3px solid #dc2626;">
                <span>Nota mínima</span>
                <strong><?= $estadisticas['minima'] ?></strong>
            </div>
        </div>

        <div class="stat-box" style="margin-top:12px; border-top: 3px solid #f59e0b;">
            <span>Total de notas</span>
            <strong><?= $estadisticas['cantidad'] ?></strong>
        </div>
        

    <?php endif; ?>

    <?php if ($error !== ''): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php echo Utilidades::enlaceNavegacion('index.php', '← Volver al menú principal'); ?>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
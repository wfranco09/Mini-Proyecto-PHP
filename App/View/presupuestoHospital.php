<?php

declare(strict_types=1);

/** @var string $tituloTarjeta */
/** @var string $descripcionTarjeta */

$tituloPagina = $tituloTarjeta;
require __DIR__ . '/partials/header.php';
?>

<div class="card">
    <h1><?= htmlspecialchars($tituloTarjeta) ?></h1>
    <p style="text-align:center; color:#475569; margin-top:12px;">
        <?= htmlspecialchars($descripcionTarjeta) ?>
    </p>
    <form method="post" action="" style="margin-top:16px;">
        <input type="number" name="presupuesto_total" step="0.01" min="0" placeholder="Ingrese el presupuesto total"
            value="<?= isset($presupuestoTotal) ? htmlspecialchars((string) $presupuestoTotal) : '' ?>"
            style="width:100%; padding:10px; margin-top:0; border:1px solid #cbd5e1; border-radius:8px; font-size:1rem;">
        <button type="submit"
            style="width:100%; padding:14px; margin-top:12px; border:2px solid #e2e8f0; border-radius:10px; background:#f8fafc; font-size:1.2rem; font-weight:bold; cursor:pointer; color:#1e293b; transition:all .2s;">
            Calcular Distribución
        </button>
    </form>

    <div style="display: flex;margin-top:20px; justify-content:center; width:100%; max-width:520px; height:320px;">
        <canvas id="presupuestoChart" height="320" style="display:block; width:100%; height:100%;"></canvas>
    </div>

    <div id="resultados" style="margin-top:20px;">
        <?php if (!empty($distribucion)): ?>
            <h2>Distribución del Presupuesto</h2>
            <p>Total: <strong>$<?= number_format((float) ($presupuestoTotal ?? 0), 2) ?></strong></p>
            <ul style="color:#475569;">
                <?php foreach ($distribucion as $departamento => $monto): ?>
                    <li><strong><?= htmlspecialchars($departamento) ?>:</strong> $<?= number_format($monto, 2) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <p style="text-align:center; margin-top:16px;">
        <a href="index.php" style="color:#2563eb; text-decoration:none;">← Volver</a>
    </p>


</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    (function () {
        const ctx = document.getElementById('presupuestoChart').getContext('2d');

        <?php if (!empty($distribucion)): ?>
            const labels = <?= json_encode(array_keys($distribucion)) ?>;
            const data = <?= json_encode(array_values($distribucion)) ?>;
            const colors = ['#476fff', '#f91616', '#d3c634'];

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: colors,
                        borderColor: '#fff',
                        borderWidth: 2,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { position: 'bottom' },
                        tooltip: { callbacks: { label: function (context) { return '$' + Number(context.parsed).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }); } } }
                    }
                }
            });
        <?php else: ?>
            new Chart(ctx, {
                type: 'doughnut',
                data: { labels: ['Sin datos'], datasets: [{ data: [1], backgroundColor: ['#e5e7eb'] }] },
                options: { plugins: { legend: { display: false } }, maintainAspectRatio: true }
            });


        <?php endif; ?>
    })();
</script>

<?php require __DIR__ . '/partials/footer.php'; ?>
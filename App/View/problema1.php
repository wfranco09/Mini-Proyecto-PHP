<?php require_once __DIR__ . '/partials/header.php'; ?>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body{
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:20px;
        }

        .container{
            background:white;
            width:100%;
            max-width:600px;
            padding:35px;
            border-radius:15px;
            box-shadow:0 10px 25px rgba(0,0,0,.2);
        }

        h2{
            text-align:center;
            color:#1e3c72;
            margin-bottom:25px;
        }

        .inputs{
            display:grid;
            grid-template-columns:1fr;
            gap:12px;
        }

        input{
            width:100%;
            padding:12px;
            border:2px solid #dcdcdc;
            border-radius:8px;
            font-size:16px;
            transition:.3s;
        }

        input:focus{
            outline:none;
            border-color:#2a5298;
            box-shadow:0 0 8px rgba(42,82,152,.3);
        }

        button{
            width:100%;
            margin-top:20px;
            padding:14px;
            border:none;
            border-radius:8px;
            background:#2a5298;
            color:white;
            font-size:16px;
            cursor:pointer;
            transition:.3s;
        }

        button:hover{
            background:#1e3c72;
        }

        .secondary{
            background:#64748b;
        }

        .secondary:hover{
            background:#1e3c72;
        }

        .actions{
            display:grid;
            gap:12px;
            margin-top:20px;
        }

        .link-return{
            display:block;
            text-align:center;
            color:#2563eb;
            text-decoration:none;
            font-size:0.95rem;
            padding:14px 0;
            transition:.2s;
        }

        .link-return:hover{
            text-decoration:underline;
        }

        .error{
            margin-top:20px;
            padding:12px;
            background:#ffe5e5;
            color:#c62828;
            border-left:5px solid #c62828;
            border-radius:5px;
        }

        .resultado{
            margin-top:25px;
            background:#f5f8ff;
            padding:20px;
            border-radius:10px;
            border-left:5px solid #2a5298;
        }

        .resultado h3{
            color:#1e3c72;
            margin-bottom:15px;
        }

        .resultado p{
            margin:10px 0;
            font-size:17px;
        }

        .resultado span{
            font-weight:bold;
            color:#2a5298;
        }

        .actions{
            display:grid;
            gap:12px;
            margin-top:20px;
        }

        .button{
            display:inline-flex;
            justify-content:center;
            align-items:center;
            width:100%;
            text-decoration:none;
        }

        .secondary{
            background:#2a5298;
        }

        .secondary:hover{
            background:#475569;
        }
    </style>

</head>
<body>

<div class="container">

    <h2>Media, Desviación, Mínimo y Máximo</h2>
    <p style="text-align:center; margin-bottom:20px; color:#666;">
    Ingrese cinco números positivos para calcular sus estadísticas básicas.
    </p>


    <form id="problema1Form" method="post">

        <div class="inputs">
            <input type="number" step="any" name="num1" value="<?= htmlspecialchars($_POST['num1'] ?? '') ?>" required placeholder="Número 1">
            <input type="number" step="any" name="num2" value="<?= htmlspecialchars($_POST['num2'] ?? '') ?>" required placeholder="Número 2">
            <input type="number" step="any" name="num3" value="<?= htmlspecialchars($_POST['num3'] ?? '') ?>" required placeholder="Número 3">
            <input type="number" step="any" name="num4" value="<?= htmlspecialchars($_POST['num4'] ?? '') ?>" required placeholder="Número 4">
            <input type="number" step="any" name="num5" value="<?= htmlspecialchars($_POST['num5'] ?? '') ?>" required placeholder="Número 5">
        </div>

        <div class="actions">
            <button type="submit">
                Calcular
            </button>
            <button type="button" id="clearButton" class="secondary">
                Limpiar campos
            </button>
            <?= App\Utilities\Utilidades::enlaceNavegacion(
                'index.php',
                '← Volver al menú principal'
            )?>
        </div>

    </form>

    <?php if ($error): ?>
        <div class="error">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <?php if ($resultado): ?>

        <div class="resultado">

            <h3>Resultados</h3>

            <p>
                Media:
                <span><?= number_format($resultado['media'], 2) ?></span>
            </p>

            <p>
                Desviación estándar:
                <span><?= number_format($resultado['desviacion'], 2) ?></span>
            </p>

            <p>
                Mínimo:
                <span><?= $resultado['minimo'] ?></span>
            </p>

            <p>
                Máximo:
                <span><?= $resultado['maximo'] ?></span>
            </p>

        </div>

    <?php endif; ?>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var clearButton = document.getElementById('clearButton');
    if (!clearButton) {
        return;
    }

    clearButton.addEventListener('click', function () {
        var form = document.getElementById('problema1Form');
        if (!form) {
            return;
        }

        form.querySelectorAll('input[type="number"]').forEach(function (input) {
            input.value = '';
        });

        var errorBox = document.querySelector('.error');
        if (errorBox) {
            errorBox.style.display = 'none';
        }

        var resultBox = document.querySelector('.resultado');
        if (resultBox) {
            resultBox.style.display = 'none';
        }
    });
});
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
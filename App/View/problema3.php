<?php require_once __DIR__ . '/partials/header.php'; ?>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1e3c72, #2563eb);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: rgba(255,255,255,0.95);
            width: 100%;
            max-width: 560px;
            padding: 32px 30px;
            border-radius: 18px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.18);
            border: 1px solid rgba(15, 23, 42, 0.08);
        }

        h2 {
            text-align: center;
            color: #0f172a;
            margin-bottom: 18px;
            font-size: 1.9rem;
        }

        .descripcion {
            text-align: center;
            color: #475569;
            line-height: 1.7;
            margin-bottom: 28px;
            font-size: 1rem;
        }

        form {
            display: grid;
            gap: 18px;
        }

        button {
            width: 100%;
            padding: 14px 18px;
            border: none;
            border-radius: 10px;
            background: #2563eb;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.25s ease, transform 0.25s ease;
        }

        button:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .actions {
            display: grid;
            gap: 12px;
            margin-top: 8px;
        }

        .actions a {
            display: block;
            text-align: center;
            padding: 12px 0;
            color: #2563eb;
            text-decoration: none;
            border-radius: 10px;
            border: 1px solid rgba(37, 99, 235, 0.15);
            background: rgba(37, 99, 235, 0.06);
            transition: background 0.25s ease, color 0.25s ease;
        }

        .actions a:hover {
            background: rgba(37, 99, 235, 0.14);
            color: #1d4ed8;
        }

        .resultado {
            margin-top: 26px;
            padding: 22px;
            background: #f8fbff;
            border-radius: 14px;
            border-left: 4px solid #2563eb;
            box-shadow: inset 0 1px 0 rgba(255,255,255,.7);
        }

        .resultado h3 {
            color: #1e3c72;
            margin-bottom: 16px;
        }

        .resultado p {
            margin: 12px 0;
            font-size: 1rem;
            color: #334155;
            line-height: 1.6;
        }

        .resultado span {
            display: inline-block;
            font-weight: 700;
            color: #1e40af;
        }
    </style>

<div class="container">

    <h2>Suma de los números del 1 al 1000</h2>

    <p class="descripcion">
        Este programa calcula la suma de todos los números enteros desde 1 hasta 1000.
    </p>

    <form method="post">

        <button type="submit">
            Calcular suma
        </button>

       <?= \App\Utilities\Utilidades::enlaceNavegacion('index.php','← Volver al menú principal') ?>

        

    </form>

    <?php if ($resultado !== null): ?>

        <div class="resultado">

            <h3>Resultado</h3>

            <p>
                Suma total:
                <span>
                    <?= number_format($resultado) ?>
                </span>
            </p>

        </div>

    <?php endif; ?>

</div>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
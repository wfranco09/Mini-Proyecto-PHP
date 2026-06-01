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

        .resultado strong{
            font-weight:bold;
            color:#2a5298;
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
    </style>

    <div class="container">
        <h2>Múltiplos de 4</h2>

        // Formulario para ingresar cantidad de múltiplos a generar
        <form method="post">
            <div class="inputs">
                // Campo de entrada para cantidad de múltiplos
                <input
                    type="number"
                    name="cantidad"
                    min="1"
                    value="<?= htmlspecialchars($_POST['cantidad'] ?? '') ?>"
                    placeholder="Ingrese N"
                    required
                >
            </div>

            <div class="actions">
                <button type="submit">
                    Generar
                </button>
                <?= App\Utilities\Utilidades::enlaceNavegacion(
                    'index.php',
                    '← Volver al menú principal'
                )?>
            </div>
        </form>

        <?php if ($error): ?>

            // Mostrar mensaje de error si existe
            <div class="error">
                <?= htmlspecialchars($error) ?>
            </div>

        <?php endif; ?>
        <?php if (!empty($resultado)): ?>

        <div class="resultado">

            <h3>Primeros <?= count($resultado) ?> múltiplos de 4</h3>
             
            // Mostrar cada múltiplo generado
            <?php foreach ($resultado as $fila): ?>

                <p>
                    <?= $fila['operacion'] ?>
                    =
                    <strong><?= $fila['resultado'] ?></strong>
                </p>

            <?php endforeach; ?>

        </div>

        <?php endif; ?>
    </div>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
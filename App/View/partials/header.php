<?php
/** @var string $tituloPagina */
$tituloPagina = $tituloPagina ?? 'Mini Proyecto #2';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($tituloPagina) ?> | Desarrollo Web VII</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .card {
            background: #fff;
            border-radius: 16px;
            padding: 40px ;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 20px rgba(0,0,0,.08);
        }

        h1 {
            text-align: center;
            font-size: 1.6rem;
            color: #1e293b;
            margin-bottom: 24px;
            margin-top: 10px;
        }
        h4 {
            text-align: center;
            font-size: 1rem;
            color: #475569;
            margin-top: -20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
            color: #475569;
        }

        input[type="date"] {
            width: 100%;
            padding: 10px 14px;
            font-size: 1rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
        }

        button {
            width: 100%;
            margin-top: 16px;
            padding: 12px;
            background: #2563eb;
            color: #fff;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .resultado {
            margin-top: 24px;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            font-size: 1.1rem;
        }

        .error {
            color: #dc2626;
            margin-top: 12px;
            text-align: center;
        }

        .nav-volver {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #2563eb;
            text-decoration: none;
            font-size: .95rem;
        }

        .nav-volver:hover {
            text-decoration: underline;
        }

        
    </style>
</head>
<body>
<main>
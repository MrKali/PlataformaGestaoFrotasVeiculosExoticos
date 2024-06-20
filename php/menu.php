<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Frotas</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .image-container {
            width: 100%;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .row {
            white-space: nowrap;
            animation: marquee 20s linear infinite;
        }

        .row img {
            width: 170px;
            height: 170px;
            margin-right: 15px;
            vertical-align: middle;
        }

        /* Animação do marquee */
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }
    </style>
</head>
<body>
    <header>
        <h1>Plataforma de Gestão de Frotas de Veículos Exóticos</h1>
    </header>
    <nav>
        <ul>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="autenticar.html">Login</a></li>
            <?php endif; ?>
            <li><a href="inserir.php">Inserir Veículo</a></li>
            <li><a href="remover.html">Remover Veículo</a></li>
            <li><a href="atualizar.html">Atualizar Veículo</a></li>
            <li><a href="requisitar.html">Requisitar Veículo</a></li>
            <li><a href="veiculos.html">Veículos Disponíveis</a></li>
            <li><a href="itinerarios.html">Itinerários Disponíveis</a></li>
        </ul>
    </nav>
</body>
</html>

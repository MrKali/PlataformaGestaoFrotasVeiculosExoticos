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
                <li><a href="php/inserir.php">Inserir Veículo</a></li>
            <?php else: ?>
                <li><a href="autenticar.html">Login</a></li>
            <?php endif; ?>
            <li><a href="requisitar.html">Requisitar Veículo</a></li>
            <li><a href="php/veiculos.php">Veículos Disponíveis</a></li>
            <li><a href="php/itinerarios.php">Itinerários Disponíveis</a></li>
        </ul>
    </nav>

    <main>
        <div class="image-container">
            <div class="row">
                <!-- Imagens da primeira linha -->
                <img src="img/acura-removebg-preview.png" alt="vic1">
                <img src="img/Aston-Martin-removebg-preview.png" alt="vic2">
                <img src="img/bentley-removebg-preview.png" alt="vic3">
                <img src="img/bugatti-removebg-preview.png" alt="vic4">
                <img src="img/ferrarilaferrari-removebg-preview.png" alt="vic5">
                <img src="img/cadillac-removebg-preview.png" alt="vic6">
                <img src="img/infiniti-removebg-preview.png" alt="vic7">
                <!-- Repetindo imagens para criar o loop -->
                <img src="img/acura-removebg-preview.png" alt="vic1">
                <img src="img/Aston-Martin-removebg-preview.png" alt="vic2">
                <img src="img/bentley-removebg-preview.png" alt="vic3">
                <img src="img/bugatti-removebg-preview.png" alt="vic4">
                <img src="img/ferrarilaferrari-removebg-preview.png" alt="vic5">
                <img src="img/cadillac-removebg-preview.png" alt="vic6">
                <img src="img/infiniti-removebg-preview.png" alt="vic7">
            </div>
            <div class="row">
                <!-- Imagens da segunda linha -->
                <img src="img//land-rover-removebg-preview.png" alt="vic8">
                <img src="img/maserati-removebg-preview.png" alt="vic9">
                <img src="img/mercedes-benz-removebg-preview.png" alt="vic10">
                <img src="img/porsche-removebg-preview.png" alt="vic11">
                <img src="img/rolls-royce-logo-removebg-preview.png" alt="vic12">
                <img src="img/jaguar-removebg-preview.png" alt="vic13">
                <img src="img/lamborghini-removebg-preview.png" alt="vic14">
                <!-- Repetindo imagens para criar o loop -->
                <img src="img//land-rover-removebg-preview.png" alt="vic8">
                <img src="img/maserati-removebg-preview.png" alt="vic9">
                <img src="img/mercedes-benz-removebg-preview.png" alt="vic10">
                <img src="img/porsche-removebg-preview.png" alt="vic11">
                <img src="img/rolls-royce-logo-removebg-preview.png" alt="vic12">
                <img src="img/jaguar-removebg-preview.png" alt="vic13">
                <img src="img/lamborghini-removebg-preview.png" alt="vic14">
            </div>
        </div>
    </main>
    <br>
    <footer>
        <p>Trabalho realizado por Gonçalo, Andreza, Pedro - IG - Pós Laboral</p>
    </footer>
</body>
</html>
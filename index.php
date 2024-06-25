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
        .footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;
        }
        .footer .container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .footer .about,
        .footer .contact,
        .footer .links {
            flex: 1;
            min-width: 200px;
            margin: 10px 0;
        }
        .footer h3 {
            margin-bottom: 15px;
        }
        .footer p, .footer a {
            margin: 0;
            color: #ccc;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .footer .social-icons a {
            margin: 0 5px;
            color: white;
            text-decoration: none;
        }
        .footer .social-icons a:hover {
            color: #ddd;
        }
        .footer .social-icons i {
            font-size: 18px;
        }
        .footer-bottom {
            margin-top: 20px;
            font-size: 12px;
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
                <li><a href="php/logout.php">Logout</a></li>
                <li><a href="php/inserir.php">Inserir Veículo</a></li>
            <?php else: ?>
                <li><a href="autenticar.html">Login</a></li>
            <?php endif; ?>
            <li><a href="php/requisitarVeiculo.php">Requisitar Veículo</a></li>
            <li><a href="php/veiculos.php">Veículos Disponíveis</a></li>
            <li><a href="php/itinerarios.php">Itinerários Disponíveis</a></li>
        </ul>
    </nav>

    <main>
        
        <div class="image-container">
            <div class="row">
                <!-- Imagens da primeira linha -->
                <img src="img/marcas/acura.png" alt="vic1">
                <img src="img/marcas/astonMartin.png" alt="vic2">
                <img src="img/marcas/bentley.png" alt="vic3">
                <img src="img/marcas/bugatti.png" alt="vic4">
                <img src="img/marcas/ferrari.png" alt="vic5">
                <img src="img/marcas/cadillac.png" alt="vic6">
                <img src="img/marcas/infinit.png" alt="vic7">
                <!-- Repetindo imagens para criar o loop -->
                <img src="img/marcas/acura.png" alt="vic1">
                <img src="img/marcas/astonMartin.png" alt="vic2">
                <img src="img/marcas/bentley.png" alt="vic3">
                <img src="img/marcas/bugatti.png" alt="vic4">
                <img src="img/marcas/ferrari.png" alt="vic5">
                <img src="img/marcas/cadillac.png" alt="vic6">
                <img src="img/marcas/infinit.png" alt="vic7">
            </div><br><br><br>
            <div class="row">
                <!-- Imagens da segunda linha -->
                <img src="img/marcas/landRover.png" alt="vic8">
                <img src="img/marcas/maserati.png" alt="vic9">
                <img src="img/marcas/mercedesBenz.png" alt="vic10">
                <img src="img/marcas/porsche.png" alt="vic11">
                <img src="img/marcas/rollsRoyce.png" alt="vic12">
                <img src="img/marcas/jaguar.png" alt="vic13">
                <img src="img/marcas/lamborghini.png" alt="vic14">
                <!-- Repetindo imagens para criar o loop -->
                <img src="img/marcas/landRover.png" alt="vic8">
                <img src="img/marcas/maserati.png" alt="vic9">
                <img src="img/marcas/mercedesBenz.png" alt="vic10">
                <img src="img/marcas/porsche.png" alt="vic11">
                <img src="img/marcas/rollsRoyce.png" alt="vic12">
                <img src="img/marcas/jaguar.png" alt="vic13">
                <img src="img/marcas/lamborghini.png" alt="vic14">
            </div>
        </div>
    </main>
    <br>
    <footer class="footer">
    <div class="container">
        <div class="about">
            <h3>Sobre Nós</h3>
            <p>Trabalho realizado por Gonçalo, Andreza, Pedro - IG-PL</p>
        </div>
        <div class="contact">
            <h3>Contato</h3>
            <p>Email: gestaofrotaig.com</p>
            <p>Telefone: +351 123 456 789</p>
            <p>Endereço: Rua do Bacalhau, 123, Lisboa, Portugal</p>
        </div>
        <div class="links">
            <h3>Links Úteis</h3>
            <p><a href="sobrenos.html">Sobre Nós</a></p>
            <p><a href="#">Serviços</a></p>
            <p><a href="#">Contato</a></p>
            <p><a href="Projeto-ManualdeApoio-Goncalo_Pedro_Andreza.pdf">Manual de Apoio</a></p>
        </div>
        <div class="social-icons">
    </div>
    <div class="footer-bottom"><br><br>
        <p>&copy; 2024 Gestão de Frotas. Todos os direitos reservados.</p>
    </div>
</footer>
</body>
</html>

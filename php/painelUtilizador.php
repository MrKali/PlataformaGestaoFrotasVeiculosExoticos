<?php include 'menuUser.php'; ?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Utilizador</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        main {
            padding: 20px;
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
    </style>
</head>
<body>
    <main>
        <h2>Bem-vindo ao painel do utilizador! Aqui você pode requisitar veículos, visualizar os veículos disponíveis e ver os itinerários disponíveis.</h2>
    </main>
</body>
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
            <p><a href="#">Sobre Nós</a></p>
            <p><a href="#">Serviços</a></p>
            <p><a href="#">Contato</a></p>
            <p><a href="#">Política de Privacidade</a></p>
        </div>
        <div class="social-icons">
    </div>
    <div class="footer-bottom"><br><br>
        <p>&copy; 2024 Gestão de Frotas. Todos os direitos reservados.</p>
    </div>
</footer>
</html>

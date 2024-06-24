<?php
include 'menuAdmin.php';
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Administrador</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .card {
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 10px;
            padding: 20px;
            text-align: center;
            flex: 1 1 200px;
            max-width: 200px;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <main>
        <div class="container">
            <div class="card">
                <a href="gerirEstadoVeiculos.php">Gerir Estado dos Veículos</a>
            </div>
            <div class="card">
                <a href="gerirRequisicoesAdmin.php">Gerir Requisições</a>
            </div>
            <div class="card">
                <a href="adicionarVeiculo.php">Inserir Veículo</a>
            </div>  
            <div class="card">
                <a href="adicionarItinerario.php">Inserir Itinerário</a>
            </div>
            <div class="card">
                <a href="itinerarios.php">Ver Itinerários</a>
            </div>
            <div class="card">
                <a href="verHistoricoRequisicoes.php">Ver Histórico de Requisições</a>
            </div>
        </div>
    </main>
</body>
</html>

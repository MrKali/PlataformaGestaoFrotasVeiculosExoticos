<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Incluir a função de tradução
include 'functions.php';

// Definir o idioma
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'pt';
$translations = include "../translations/{$lang}.php";
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo translate('admin_panel', $translations, 'Painel do Administrador'); ?></title>
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
    <?php include 'menuAdmin.php'; ?>
    <main>
        <div class="container">
            <div class="card">
                <a href="gerirEstadoVeiculos.php"><?php echo translate('manage_vehicle_status', $translations, 'Gerir Estado dos Veículos'); ?></a>
            </div>
            <div class="card">
                <a href="gerirRequisicoesAdmin.php"><?php echo translate('manage_requests', $translations, 'Gerir Requisições'); ?></a>
            </div>
            <div class="card">
                <a href="adicionarVeiculo.php"><?php echo translate('add_vehicle', $translations, 'Inserir Veículo'); ?></a>
            </div>  
            <div class="card">
                <a href="adicionarItinerario.php"><?php echo translate('add_itinerary', $translations, 'Inserir Itinerário'); ?></a>
            </div>
            <div class="card">
                <a href="verHistoricoRequisicoes.php"><?php echo translate('view_request_history', $translations, 'Ver Histórico de Requisições'); ?></a>
            </div>
        </div>
    </main>
</body>
</html>

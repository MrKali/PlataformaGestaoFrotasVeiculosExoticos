<?php
include 'conexaoDb.php';

// Iniciar a sessão para gerenciar o idioma
session_start();
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'pt';
$translations = include "../translations/{$lang}.php";

function translate($key, $translations, $default = '') {
    return isset($translations[$key]) ? $translations[$key] : $default;
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo translate('add_itinerary', $translations, 'Add Itinerary'); ?></title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        .form-container form input,
        .form-container form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-container form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-container form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php include 'menuAdmin.php'; ?>
        <div class="form-container">
            <h2><?php echo translate('add_new_itinerary', $translations, 'Add New Itinerary'); ?></h2>
            <form action="processarAdicionarItinerario.php" method="post">
                <label for="titulo"><?php echo translate('title', $translations, 'Title'); ?>:</label>
                <input type="text" id="titulo" name="titulo" required>

                <label for="descricao"><?php echo translate('description', $translations, 'Description'); ?>:</label>
                <textarea id="descricao" name="descricao" required></textarea>

                <label for="mapa_url"><?php echo translate('map_url', $translations, 'Map URL'); ?>:</label>
                <input type="text" id="mapa_url" name="mapa_url" required>

                <button type="submit"><?php echo translate('add_itinerary', $translations, 'Add Itinerary'); ?></button>
            </form>
        </div>
    </main>
</body>
</html>

<?php
include 'conexaoDb.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM `itinerarios` WHERE `id` = $id";
    $result = mysqli_query($liga, $query);

    if (!$result) {
        die("Erro ao executar a query: " . mysqli_error($liga));
    }

    $itinerario = mysqli_fetch_assoc($result);

    if (!$itinerario) {
        echo "<script>alert('Itinerário não encontrado.'); window.history.back();</script>";
        exit();
    }
} else {
    echo "<script>alert('ID do itinerário não fornecido.'); window.history.back();</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Itinerário</title>
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
            <h2>Editar Itinerário</h2>
            <form action="processarEditarItinerario.php" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($itinerario['id']); ?>">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($itinerario['titulo']); ?>" required>

                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" required><?php echo htmlspecialchars($itinerario['descricao']); ?></textarea>

                <label for="mapa_url">URL do Mapa:</label>
                <input type="text" id="mapa_url" name="mapa_url" value="<?php echo htmlspecialchars($itinerario['mapa_url']); ?>" required>

                <button type="submit">Guardar Alterações</button>
            </form>
        </div>
    </main>
</body>
</html>

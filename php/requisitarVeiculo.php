<?php
include 'menuUser.php';
include 'conexaoDb.php';

// Obter a lista de veículos disponíveis
$query_veiculos = "SELECT veiculos.id, marcas.marca, modelos.modelo, veiculos.ano, veiculos.matricula 
                   FROM veiculos 
                   JOIN marcas ON veiculos.marca = marcas.id 
                   JOIN modelos ON veiculos.modelo = modelos.id 
                   WHERE veiculos.estado = 'disponivel'";
$result_veiculos = mysqli_query($liga, $query_veiculos);

// Obter a lista de itinerários disponíveis
$query_itinerarios = "SELECT id, titulo FROM itinerarios";
$result_itinerarios = mysqli_query($liga, $query_itinerarios);
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisitar Veículo</title>
    <link rel="stylesheet" href="../styles.css">
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
        .form-container form select, 
        .form-container form input {
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
    <main>
        <div class="form-container">
            <h2>Requisitar Veículo</h2>
            <form action="processarRequisicao.php" method="post">
                <label for="veiculo">Veículo:</label>
                <select id="veiculo" name="veiculo" required>
                    <option value="">Selecione um veículo</option>
                    <?php while ($row = mysqli_fetch_assoc($result_veiculos)): ?>
                        <option value="<?php echo htmlspecialchars($row['id']); ?>">
                            <?php echo htmlspecialchars($row['marca'] . ' ' . $row['modelo'] . ' (' . $row['ano'] . ') - ' . $row['matricula']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <label for="itinerario">Itinerário:</label>
                <select id="itinerario" name="itinerario" required>
                    <option value="">Selecione um itinerário</option>
                    <?php while ($row = mysqli_fetch_assoc($result_itinerarios)): ?>
                        <option value="<?php echo htmlspecialchars($row['id']); ?>">
                            <?php echo htmlspecialchars($row['titulo']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <label for="data_requisicao">Data de Requisição:</label>
                <input type="date" id="data_requisicao" name="data_requisicao" required>

                <button type="submit">Requisitar Veículo</button>
            </form>
        </div>
    </main>
</body>
</html>

<?php
include 'conexaoDb.php';

// Consultar todos os veículos na base de dados, incluindo o logo da marca
$query_veiculos = "
    SELECT veiculos.id, marcas.marca, marcas.diretorio_logo, modelos.modelo, veiculos.ano, veiculos.matricula, veiculos.estado 
    FROM veiculos
    JOIN marcas ON veiculos.marca = marcas.id
    JOIN modelos ON veiculos.modelo = modelos.id
";
$result_veiculos = mysqli_query($liga, $query_veiculos);

if (!$result_veiculos) {
    die("Erro ao executar a query: " . mysqli_error($liga));
}

$veiculos = [];
while ($row = mysqli_fetch_assoc($result_veiculos)) {
    $veiculos[] = $row;
}
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Veículos</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-icons {
            display: flex;
            gap: 10px;
        }
        .action-icons img {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }
        .top-bar button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .top-bar button:hover {
            background-color: #45a049;
        }
        .logo-img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <?php include 'menuAdmin.php'; ?>
    <div class="top-bar">
        <h2>Lista de Veículos</h2>
        <button onclick="window.location.href='adicionarVeiculo.php'">Novo Veículo</button>
    </div>
    <table>
        <thead>
            <tr>
                <th></th> <!-- Coluna para o logo -->
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Matrícula</th>
                <th>Estado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($veiculos as $veiculo): ?>
                <tr>
                    <td>
                        <img src="<?php echo htmlspecialchars($veiculo['diretorio_logo']) ?: '../img/marcas/no-image.png'; ?>" alt="Logo da Marca" class="logo-img">
                    </td>
                    <td><?php echo htmlspecialchars($veiculo['id']); ?></td>
                    <td><?php echo htmlspecialchars($veiculo['marca']); ?></td>
                    <td><?php echo htmlspecialchars($veiculo['modelo']); ?></td>
                    <td><?php echo htmlspecialchars($veiculo['ano']); ?></td>
                    <td><?php echo htmlspecialchars($veiculo['matricula']); ?></td>
                    <td><?php echo htmlspecialchars($veiculo['estado']); ?></td>
                    <td class="action-icons">
                        <img src="../img/icons/edit-icon.png" alt="Editar" onclick="window.location.href='editarVeiculo.php?id=<?php echo $veiculo['id']; ?>'">
                        <img src="../img/icons/delete-icon.png" alt="Apagar" onclick="apagarVeiculo(<?php echo $veiculo['id']; ?>)">
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        function apagarVeiculo(id) {
            if (confirm('Tem certeza que deseja apagar este veículo?')) {
                window.location.href = 'apagarVeiculo.php?id=' + id;
            }
        }
    </script>
</body>
</html>

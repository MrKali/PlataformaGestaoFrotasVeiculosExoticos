<?php
include 'menuAdmin.php';
include 'conexaoDb.php';

// Verificar filtros
$filtro_utilizador = isset($_GET['utilizador']) ? $_GET['utilizador'] : '';
$filtro_veiculo = isset($_GET['veiculo']) ? $_GET['veiculo'] : '';
$filtro_estado = isset($_GET['estado']) ? $_GET['estado'] : '';
$filtro_data_inicio = isset($_GET['data_inicio']) ? $_GET['data_inicio'] : '';
$filtro_data_fim = isset($_GET['data_fim']) ? $_GET['data_fim'] : '';

// Construir query de filtro
$query_requisicoes = "SELECT requisicoes.id, requisicoes.username, marcas.marca, modelos.modelo, requisicoes.data_requisicao, requisicoes.estado 
                      FROM requisicoes 
                      JOIN veiculos ON requisicoes.veiculo_id = veiculos.id 
                      JOIN marcas ON veiculos.marca = marcas.id 
                      JOIN modelos ON veiculos.modelo = modelos.id 
                      WHERE 1=1";

if ($filtro_utilizador) {
    $query_requisicoes .= " AND requisicoes.username LIKE '%$filtro_utilizador%'";
}
if ($filtro_veiculo) {
    $query_requisicoes .= " AND (marcas.marca LIKE '%$filtro_veiculo%' OR modelos.modelo LIKE '%$filtro_veiculo%')";
}
if ($filtro_estado) {
    $query_requisicoes .= " AND requisicoes.estado = '$filtro_estado'";
}
if ($filtro_data_inicio && $filtro_data_fim) {
    $query_requisicoes .= " AND requisicoes.data_requisicao BETWEEN '$filtro_data_inicio' AND '$filtro_data_fim'";
}

$result_requisicoes = mysqli_query($liga, $query_requisicoes);
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Requisições</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }
        .filters label {
            margin-right: 10px;
            font-weight: bold;
        }
        .filters input, .filters select {
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
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
    </style>
</head>
<body>
    <main>
        <div class="container">
            <h2>Histórico de Requisições</h2>
            <form class="filters" method="GET" action="verHistoricoRequisicoes.php">
                <div>
                    <label for="utilizador">Utilizador:</label>
                    <input type="text" id="utilizador" name="utilizador" value="<?php echo htmlspecialchars($filtro_utilizador); ?>">
                </div>
                <div>
                    <label for="veiculo">Veículo:</label>
                    <input type="text" id="veiculo" name="veiculo" value="<?php echo htmlspecialchars($filtro_veiculo); ?>">
                </div>
                <div>
                    <label for="estado">Estado:</label>
                    <select id="estado" name="estado">
                        <option value="">Todos</option>
                        <option value="pendente" <?php echo $filtro_estado == 'pendente' ? 'selected' : ''; ?>>Pendente</option>
                        <option value="aprovado" <?php echo $filtro_estado == 'aprovado' ? 'selected' : ''; ?>>Aprovado</option>
                        <option value="rejeitado" <?php echo $filtro_estado == 'rejeitado' ? 'selected' : ''; ?>>Rejeitado</option>
                        <option value="devolvido" <?php echo $filtro_estado == 'devolvido' ? 'selected' : ''; ?>>Devolvido</option>
                    </select>
                </div>
                <div>
                    <label for="data_inicio">Data Início:</label>
                    <input type="date" id="data_inicio" name="data_inicio" value="<?php echo htmlspecialchars($filtro_data_inicio); ?>">
                </div>
                <div>
                    <label for="data_fim">Data Fim:</label>
                    <input type="date" id="data_fim" name="data_fim" value="<?php echo htmlspecialchars($filtro_data_fim); ?>">
                </div>
                <div>
                    <button type="submit">Filtrar</button>
                </div>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Utilizador</th>
                        <th>Veículo</th>
                        <th>Data de Requisição</th>
                        <th>Data de Devolução</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result_requisicoes)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                            <td><?php echo htmlspecialchars($row['marca'] . ' ' . $row['modelo']); ?></td>
                            <td><?php echo htmlspecialchars($row['data_requisicao']); ?></td>
                            <td></td>
                            <td><?php echo htmlspecialchars($row['estado']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>

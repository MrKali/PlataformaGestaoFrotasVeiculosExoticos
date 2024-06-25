<?php
include 'menuUser.php';
include 'conexaoDb.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: ../autenticar.html");
    exit();
}

$username = $_SESSION['username'];

// Obter as requisições do usuário
$query_requisicoes = "SELECT requisicoes.id, marcas.marca, modelos.modelo, requisicoes.data_requisicao, requisicoes.data_devolucao, requisicoes.estado 
                      FROM requisicoes 
                      JOIN veiculos ON requisicoes.veiculo_id = veiculos.id 
                      JOIN marcas ON veiculos.marca = marcas.id 
                      JOIN modelos ON veiculos.modelo = modelos.id 
                      WHERE requisicoes.username = ?";
$stmt = mysqli_prepare($liga, $query_requisicoes);
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
$result_requisicoes = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado das Requisições</title>
    <link rel="stylesheet" href="../styles.css">
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
    </style>
</head>
<body>
    <main>
        <h2>Estado das Requisições</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Veículo</th>
                    <th>Data de Requisição</th>
                    <th>Data de Devolução</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_requisicoes)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars(($row['marca'] ?? '') . ' ' . ($row['modelo'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row['data_requisicao'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row['data_devolucao'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row['estado'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
</body>
</html>

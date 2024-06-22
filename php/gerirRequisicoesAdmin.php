<?php
include 'menuAdmin.php';
include 'conexaoDb.php';

// Obter as requisições pendentes
$query_requisicoes = "SELECT requisicoes.id, requisicoes.username, marcas.marca, modelos.modelo, requisicoes.data_requisicao, requisicoes.estado 
                      FROM requisicoes 
                      JOIN veiculos ON requisicoes.veiculo_id = veiculos.id 
                      JOIN marcas ON veiculos.marca = marcas.id 
                      JOIN modelos ON veiculos.modelo = modelos.id 
                      WHERE requisicoes.estado = 'pendente'";
$result_requisicoes = mysqli_query($liga, $query_requisicoes);
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Requisições</title>
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
    <script>
        function confirmarAcao(id, acao) {
            let mensagem = "Tem certeza que deseja " + acao + " esta requisição?";
            if (confirm(mensagem)) {
                window.location.href = acao + "Requisicao.php?id=" + id;
            }
        }
    </script>
</head>
<body>
    <main>
        <h2>Gerir Requisições</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Utilizador</th>
                    <th>Veículo</th>
                    <th>Data de Requisição</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_requisicoes)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['marca'] . ' ' . $row['modelo']); ?></td>
                        <td><?php echo htmlspecialchars($row['data_requisicao']); ?></td>
                        <td><?php echo htmlspecialchars($row['estado']); ?></td>
                        <td class="action-icons">
                            <img src="../img/icons/yes.png" alt="Aprovar" onclick="confirmarAcao(<?php echo $row['id']; ?>, 'aprovar')">
                            <img src="../img/icons/no.png" alt="Rejeitar" onclick="confirmarAcao(<?php echo $row['id']; ?>, 'rejeitar')">
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
</body>
</html>

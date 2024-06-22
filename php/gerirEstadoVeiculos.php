<?php
include 'menuAdmin.php';
include 'conexaoDb.php';

// Obter a lista de veículos
$query_veiculos = "SELECT veiculos.id, marcas.marca, modelos.modelo, veiculos.ano, veiculos.matricula, veiculos.estado 
                   FROM veiculos 
                   JOIN marcas ON veiculos.marca = marcas.id 
                   JOIN modelos ON veiculos.modelo = modelos.id";
$result_veiculos = mysqli_query($liga, $query_veiculos);
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Estado dos Veículos</title>
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
        function confirmarAtualizacao(id) {
            const estado = document.getElementById(`estado-${id}`).value;
            let mensagem = `Tem certeza que deseja atualizar o estado do veículo para ${estado}?`;
            if (confirm(mensagem)) {
                window.location.href = `atualizarEstadoVeiculo.php?id=${id}&estado=${estado}`;
            }
        }
    </script>
</head>
<body>
    <main>
        <h2>Gerir Estado dos Veículos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Veículo</th>
                    <th>Ano</th>
                    <th>Matrícula</th>
                    <th>Estado Atual</th>
                    <th>Atualizar Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_veiculos)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['marca'] . ' ' . $row['modelo']); ?></td>
                        <td><?php echo htmlspecialchars($row['ano']); ?></td>
                        <td><?php echo htmlspecialchars($row['matricula']); ?></td>
                        <td><?php echo htmlspecialchars($row['estado']); ?></td>
                        <td>
                            <select id="estado-<?php echo $row['id']; ?>" name="estado" required>
                                <option value="disponivel" <?php echo $row['estado'] == 'disponivel' ? 'selected' : ''; ?>>Disponível</option>
                                <option value="reservado" <?php echo $row['estado'] == 'reservado' ? 'selected' : ''; ?>>Reservado</option>
                                <option value="manutencao" <?php echo $row['estado'] == 'manutencao' ? 'selected' : ''; ?>>Manutenção</option>
                            </select>
                            <button onclick="confirmarAtualizacao(<?php echo $row['id']; ?>)">Atualizar</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
</body>
</html>

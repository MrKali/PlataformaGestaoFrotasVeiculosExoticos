<?php
include 'conexaoDb.php';

// Obter todos os itinerários da base de dados
$query_itinerarios = "SELECT * FROM `itinerarios`";
$result_itinerarios = mysqli_query($liga, $query_itinerarios);

if (!$result_itinerarios) {
    die("Erro ao executar a query: " . mysqli_error($liga));
}

$itinerarios = [];
while ($row = mysqli_fetch_assoc($result_itinerarios)) {
    $itinerarios[] = $row;
}
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Itinerários</title>
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
    </style>
</head>
<body>
    <?php include 'menuAdmin.php'; ?>
        <div class="top-bar">
            <h2>Lista de Itinerários</h2>
            <button onclick="window.location.href='adicionarItinerario.php'">Novo Itinerário</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($itinerarios) > 0): ?>
                    <?php foreach ($itinerarios as $itinerario): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($itinerario['id']); ?></td>
                            <td><?php echo htmlspecialchars($itinerario['titulo']); ?></td>
                            <td><?php echo htmlspecialchars($itinerario['descricao']); ?></td>
                            <td class="action-icons">
                                <img src="../img/icons/edit-icon.png" alt="Editar" onclick="window.location.href='editarItinerario.php?id=<?php echo $itinerario['id']; ?>'">
                                <img src="../img/icons/delete-icon.png" alt="Apagar" onclick="apagarItinerario(<?php echo $itinerario['id']; ?>)">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Não existem itinerários disponíveis neste momento.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
    <script>
        function apagarItinerario(id) {
            if (confirm('Tem certeza que deseja apagar este itinerário?')) {
                window.location.href = 'apagarItinerario.php?id=' + id;
            }
        }
    </script>
</body>
</html>

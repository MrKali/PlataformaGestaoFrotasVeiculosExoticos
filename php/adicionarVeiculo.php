<?php
include 'conexaoDb.php';

// Obter as marcas da base de dados
$query_marcas = "SELECT * FROM `marcas`";
$result_marcas = mysqli_query($liga, $query_marcas);

// Verificar se a query foi bem-sucedida
if (!$result_marcas) {
    die("Erro ao obter as marcas: " . mysqli_error($liga));
}

// Função para obter os modelos com base na marca
function getModelos($liga, $id_marca) {
    $query_modelos = "SELECT * FROM `modelos` WHERE `id_marca` = $id_marca";
    return mysqli_query($liga, $query_modelos);
}
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Veículo</title>
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
    <script>
        function getModelos(marcaId) {
            fetch(`getModelos.php?id_marca=${marcaId}`)
                .then(response => response.json())
                .then(data => {
                    const modeloSelect = document.getElementById('modelo');
                    modeloSelect.innerHTML = '';
                    data.forEach(modelo => {
                        const option = document.createElement('option');
                        option.value = modelo.id;
                        option.text = modelo.modelo;
                        modeloSelect.appendChild(option);
                    });
                });
        }

        function validarMatricula(matricula) {
            const padrao1 = /^[A-Z]{2}-\d{2}-\d{2}$/; // AA-00-00
            const padrao2 = /^\d{2}-\d{2}-[A-Z]{2}$/;  // 00-00-AA
            const padrao3 = /^\d{2}-[A-Z]{2}-\d{2}$/;  // 00-AA-00
            const padrao4 = /^[A-Z]{2}-\d{2}-[A-Z]{2}$/;  // AA-00-AA
            return padrao1.test(matricula) || padrao2.test(matricula) || padrao3.test(matricula) || padrao4.test(matricula);
        }

        function validarFormulario(event) {
            const matricula = document.getElementById('matricula').value;
            if (!validarMatricula(matricula)) {
                alert('Matrícula inválida. Deve estar no formato AA-00-00, 00-00-AA, 00-AA-00 ou AA-00-AA.');
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <?php include 'menuAdmin.php'; ?>
        <div class="form-container">
            <h2>Adicionar Novo Veículo</h2>
            <form action="processarAdicionarVeiculo.php" method="post" onsubmit="validarFormulario(event)">
                <label for="marca">Marca:</label>
                <select id="marca" name="marca" onchange="getModelos(this.value)" required>
                    <option value="">Selecione uma marca</option>
                    <?php while ($row = mysqli_fetch_assoc($result_marcas)): ?>
                        <option value="<?php echo htmlspecialchars($row['id']); ?>">
                            <?php echo htmlspecialchars($row['marca']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <label for="modelo">Modelo:</label>
                <select id="modelo" name="modelo" required>
                    <option value="">Selecione um modelo</option>
                </select>

                <label for="ano">Ano:</label>
                <input type="number" id="ano" name="ano" min="1886" max="<?php echo date('Y'); ?>" required>

                <label for="matricula">Matrícula:</label>
                <input type="text" id="matricula" name="matricula" required>

                <input type="hidden" name="estado" value="">

                <button type="submit">Adicionar Veículo</button>
            </form>
        </div>
    </main>
</body>
</html>

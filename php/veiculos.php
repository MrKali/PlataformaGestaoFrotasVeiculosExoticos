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
    <title>Portfólio de Marcas e Carros</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Configurações gerais do corpo */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            padding: 20px;
        }

        /* Estilo do botão personalizado */

.custom-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 1em;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.custom-button:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.custom-button:active {
    background-color: #004494;
    transform: scale(1);
}

        /* Estilo do cabeçalho */
        header {
            background: linear-gradient(135deg, #000000, #2b2b2b, #333, #343a40, #495057);
            color: #fff;
            padding: 15px 0;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }

        header h1 {
            margin: 0;
            font-size: 2em;
        }

        /* Estilo principal */
        main {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        /* Estilo dos cartões */
        .card {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 100%;
            height: auto;
            max-height: 200px; /* Defina a altura máxima para as imagens */
            object-fit: contain; /* Manter a proporção da imagem */
        }

        .card-content {
            padding: 20px;
        }

        .card-content h2 {
            margin-bottom: 15px;
            font-size: 1.5em;
            color: #007bff;
        }

        .car-list {
            list-style: none;
            padding: 0;
        }

        .car-list li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f7f7f7;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .car-list li:hover {
            background-color: #e9ecef;
        }

        /* Responsividade */
        @media (max-width: 600px) {
            main {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Portfólio de Marcas e Carros</h1>
    </header>
    <button onclick="window.history.back();" class="custom-button">Voltar</button>
    <main>
        
        <?php if (count($veiculos) > 0): ?>
            <?php 
            $marcas = [];
            foreach ($veiculos as $veiculo): 
                $marca = $veiculo['marca'];
                if (!isset($marcas[$marca])) {
                    $marcas[$marca] = [
                        'logo' => $veiculo['diretorio_logo'],
                        'veiculos' => []
                    ];
                }
                $marcas[$marca]['veiculos'][] = $veiculo;
            endforeach;
            ?>

            <?php foreach ($marcas as $marca => $data): ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($data['logo']); ?>" alt="<?php echo htmlspecialchars($marca); ?>">
                    <div class="card-content">
                        <h2><?php echo htmlspecialchars($marca); ?></h2>
                        <ul class="car-list">
                            <?php foreach ($data['veiculos'] as $veiculo): ?>
                                <li><?php echo htmlspecialchars($veiculo['modelo'] . ' (' . $veiculo['ano'] . ') - ' . $veiculo['matricula'] . ' - ' . $veiculo['estado']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Não existem veículos disponíveis neste momento.</p>
        <?php endif; ?>
    </main>
    <br>
</body>
</html>

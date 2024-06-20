<?php
include 'conexaoDb.php';

// Consultar todos os itinerários disponíveis na base de dados
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
    <title>Itinerarios Disponiveis</title>
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
            margin: 0;
            padding: 0;
        }

        /* Estilo do cabeçalho */
        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 2em;
        }

        /* Estilo do conteúdo principal */
        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Estilo do rodapé */
        footer {
            text-align: center;
            padding: 15px 0;
            background-color: #343a40;
            color: #fff;
            position: fixed;
            width: 100%;
            bottom: 0;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0;
            font-size: 1em;
        }

        /* Estilo para links */
        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        /* Estilo do iframe do mapa */
        .map-container {
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .map-container iframe {
            width: 100%;
            height: 300px; /* Altura ajustável conforme necessário */
            border: none;
        }

        /* Estilo para a descrição do percurso */
        .descricao-percurso {
            padding: 10px;
            background-color: #f9f9f9;
            border-top: 1px solid #ccc;
            border-radius: 0 0 8px 8px;
        }

        .descricao-percurso h3 {
            margin-top: 0;
            font-size: 1.2em;
        }

        .descricao-percurso p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Percursos Dentro de Portugal</h1>
    </header>
    <main>
        <?php if (count($itinerarios) > 0): ?>
            <?php foreach ($itinerarios as $itinerario): ?>
                <div class="map-container">
                    <iframe src="<?php echo htmlspecialchars($itinerario['mapa_url']); ?>" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <div class="descricao-percurso">
                        <h3><?php echo htmlspecialchars($itinerario['titulo']); ?></h3>
                        <p><?php echo htmlspecialchars($itinerario['descricao']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Não existem itinerários disponíveis neste momento.</p>
        <?php endif; ?>
    </main>
    <footer>
        <p>Trabalho realizado por Gonçalo, Andreza, Pedro</p>
    </footer>
</body>
</html>

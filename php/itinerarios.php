<?php
session_start();
include 'conexaoDb.php';

// Verificar se o Utilizador está logado e se é admin
$isAdmin = false;
if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == 'admin') {
        $isAdmin = true;
    }
}

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
    <title>Itinerários Disponíveis</title>
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #000000, #2b2b2b, #333, #343a40, #495057);
            color: #BAB6AA;
            padding: 15px 0;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        header h1 {
            margin: 0;
            font-size: 2em;
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
.footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;
        }
        .footer .container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .footer .about,
        .footer .contact,
        .footer .links {
            flex: 1;
            min-width: 200px;
            margin: 10px 0;
        }
        .footer h3 {
            margin-bottom: 15px;
        }
        .footer p, .footer a {
            margin: 0;
            color: #ccc;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .footer .social-icons a {
            margin: 0 5px;
            color: white;
            text-decoration: none;
        }
        .footer .social-icons a:hover {
            color: #ddd;
        }
        .footer .social-icons i {
            font-size: 18px;
        }
        .footer-bottom {
            margin-top: 20px;
            font-size: 12px;
        }

        /* Estilo do conteúdo principal */
        main {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
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

        /* Estilo do container de itinerários */
        .itinerarios-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* Estilo do cartão de itinerário */
        .itinerario-card {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin: 10px;
            flex: 1 1 calc(33.333% - 20px);
            display: flex;
            flex-direction: column;
        }

        .itinerario-card iframe {
            width: 100%;
            height: 200px;
            border: none;
        }

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
    <?php if ($isAdmin): ?>
        <?php include 'menuAdmin.php'; ?>
    <?php endif; ?>
    <header>
        <h1>Percursos Dentro de Portugal</h1>
    </header>
    <main>
    <button onclick="window.history.back();" class="custom-button">Voltar</button>
        <div class="itinerarios-container">
            <?php if (count($itinerarios) > 0): ?>
                <?php foreach ($itinerarios as $itinerario): ?>
                    <div class="itinerario-card">
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
        </div>
    </main>
</body>
</html>

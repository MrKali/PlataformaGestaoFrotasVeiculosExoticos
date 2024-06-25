<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: ../autenticar.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu User</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        header h1 {
            margin: 0;
        }
        header .user-info {
            display: flex;
            align-items: center;
        }
        header .user-info span {
            margin-right: 10px;
        }
        header .user-info a {
            color: #fff;
            text-decoration: none;
            background-color: #f44336;
            padding: 5px 10px;
            border-radius: 5px;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            background-color: #444;
            overflow: hidden;
        }
        nav ul li {
            float: left;
        }
        nav ul li a {
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        nav ul li a:hover {
            background-color: #111;
        }
    </style>
</head>
<body>
    <header>
        <h1>Gestão de Frotas</h1>
        <div class="user-info">
            <span>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <a href="logout.php">Logout</a>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="painelUtilizador.php">Home</a></li>
            <li><a href="requisitarVeiculo.php">Requisitar Veículo</a></li>
            <li><a href="estadoRequisicoes.php">Estado das Requisições</a></li>
            <li><a href="itinerarios.php">Itinerários Disponíveis</a></li>
        </ul>
    </nav>
</body>
</html>

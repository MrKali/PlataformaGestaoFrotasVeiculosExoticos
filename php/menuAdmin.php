<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: autenticar.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Administrador</title>
    <link rel="stylesheet" href="styles.css">
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
        .menu-section {
            margin-bottom: 20px;
        }
        .menu-section h3 {
            margin-top: 0;
        }
        .menu-section ul {
            padding-left: 20px;
        }
        .menu-section ul li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Painel do Administrador</h1>
        <div class="user-info">
            <span>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <a href="logout.php">Logout</a>
        </div>
    </header>
    <nav>
    <ul>
        <li><a href="painelAdmin.php">Home</a></li>
        <li><a href="gerirVeiculoAdmin.php">Gerir Veículos</a></li>
        <li><a href="gerirItinerariosAdmin.php">Gerir Itinerários</a></li>
        <li><a href="gerirUsuariosAdmin.php">Gerir Usuários</a></li>
        <li><a href="gerirRequisicoesAdmin.php">Gerir Requisições</a></li>
        <li><a href="gerirRelatoriosAdmin.php">Gerir Relatórios</a></li>
        <li style="float:right"><a href="logout.php">Logout</a></li>
    </ul>
</nav>
    <main>

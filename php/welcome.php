<?php
session_start();

// Verificar se o Utilizador está autenticado
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo - Gestão de Frotas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        main {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .welcome a {
            display: block;
            margin-top: 20px;
            color: #333;
            text-decoration: none;
        }

        .welcome a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Gestão de Frotas</h1>
    </header>
    
    <main>
        <?php if ($role == 'admin'): ?>
            <h2>Bem-vindo, Admin!</h2>
            <p>Aqui pode gerir a frota e utilizadores.</p>
        <?php elseif ($role == 'motorista'): ?>
            <h2>Bem-vindo, Motorista!</h2>
            <p>Aqui pode visualizar os seus itinerários.</p>
        <?php elseif ($role == 'utilizador'): ?>
            <h2>Bem-vindo, Utilizador!</h2>
            <p>Aqui pode requisitar veículos.</p>
        <?php endif; ?>
        <a href="logout.php">Logout</a>
    </main>
</body>
</html>

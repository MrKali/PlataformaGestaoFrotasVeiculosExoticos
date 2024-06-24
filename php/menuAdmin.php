<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: ../autenticar.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Admin</title>
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
            padding: 10px 20px; /* Ajuste para adicionar margens laterais */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-left,
        .header-right {
            display: flex;
            align-items: center;
        }
        header h1 {
            margin: 0;
            flex-grow: 1;
            text-align: center;
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
            margin-left: 10px; /* Margem esquerda para afastar do texto */
        }
        .back-button {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 10px; /* Margem direita para afastar da borda */
        }
    </style>
</head>
<body>
    <header>
        <div class="header-left">
            <?php if (basename($_SERVER['PHP_SELF']) != 'painelAdmin.php'): ?>
                <a href="painelAdmin.php" class="back-button">Voltar</a>
            <?php endif; ?>
        </div>
        <h1>Gestão de Frotas</h1>
        <div class="header-right">
            <div class="user-info">
                <span>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>
</body>
</html>

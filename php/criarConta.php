<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
include 'conexaoDb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordHash = hash('sha256', $password);
    $role = 'user';

    // Verificar se o email já está cadastrado
    $query_check = "SELECT * FROM utilizadores WHERE email = ?";
    $stmt_check = mysqli_prepare($liga, $query_check);
    mysqli_stmt_bind_param($stmt_check, 's', $email);
    mysqli_stmt_execute($stmt_check);
    $result_check = mysqli_stmt_get_result($stmt_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo 'Email já cadastrado.';
    } else {
        // Inserir o novo utilizador
        $query = "INSERT INTO utilizadores (nome, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($liga, $query);
        mysqli_stmt_bind_param($stmt, 'ssss', $nome, $email, $passwordHash, $role);

        if (mysqli_stmt_execute($stmt)) {
            // Enviar email de boas-vindas
            $mail = new PHPMailer(true);

            try {
                // Configurações do servidor de email
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';  // Servidor SMTP do Gmail
                $mail->SMTPAuth = true;
                $mail->Username = 'gestaofrotaig@gmail.com';  // Seu email Gmail
                $mail->Password = 'zrlj knpv pzju hjcw';  // Senha de app gerada
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Destinatários
                $mail->setFrom('gestaofrotaig@gmail.com', 'Gestao de Frotas');
                $mail->addAddress($email, $nome);

                // Conteúdo do email
                $mail->isHTML(true);
                $mail->Subject = 'Bem-vindo(a) a Gestao de Frotas';
                $mail->Body = 'Ola ' . htmlspecialchars($nome) . ',<br><br>Bem-vindo(a) a plataforma de Gestao de Frotas! Estamos felizes por te-lo(a) conosco.<br><br>Atenciosamente,<br>Equipa de Gestao de Frotas';

                $mail->send();
                
                // Login automático
                session_start();
                $_SESSION['username'] = $nome;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;
                
                echo "<script>
                        alert('Conta criada com sucesso! Um email de boas-vindas foi enviado.');
                        window.location.href = 'painelUtilizador.php';
                      </script>";
            } catch (Exception $e) {
                echo "Erro ao enviar email de boas-vindas: {$mail->ErrorInfo}";
            }
        } else {
            echo 'Erro ao criar conta: ' . mysqli_error($liga);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
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
</head>
<body>
    <div class="form-container">
        <h2>Criar Conta</h2>
        <form action="criarConta.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Palavra-Passe:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Criar Conta</button>
        </form>
    </div>
</body>
</html>

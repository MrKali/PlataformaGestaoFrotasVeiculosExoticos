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
            // Enviar email de confirmação
            $mail = new PHPMailer(true);

            try {
                // Configurações do servidor de email
                $mail->isSMTP();
                $mail->Host = 'smtp-relay.brevo.com'; // Servidor SMTP do Sendinblue
                $mail->SMTPAuth = true;
                $mail->Username = '77102d002@smtp-brevo.com'; // Seu nome de usuário SMTP Sendinblue
                $mail->Password = '9z5MZPFgfhtIJQXx'; // Sua senha SMTP Sendinblue
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Destinatários
                $mail->setFrom('seuemail@seusite.com', 'Gestão de Frotas');
                $mail->addAddress($email, $nome);

                // Conteúdo do email
                $mail->isHTML(true);
                $mail->Subject = 'Confirmação de Email';
                $mail->Body = 'Clique no link para confirmar seu email: <a href="http://seusite.com/confirmarEmail.php?email=' . urlencode($email) . '">Confirmar Email</a>';

                $mail->send();
                echo 'Email de confirmação enviado.';
            } catch (Exception $e) {
                echo "Erro ao enviar email de confirmação: {$mail->ErrorInfo}";
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

<?php
include 'conexaoDb.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Verificar se o email está no banco de dados
    $query = "SELECT * FROM utilizadores WHERE email = ?";
    $stmt = mysqli_prepare($liga, $query);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Confirmar email
        $query_update = "UPDATE utilizadores SET email_confirmado = 1 WHERE email = ?";
        $stmt_update = mysqli_prepare($liga, $query_update);
        mysqli_stmt_bind_param($stmt_update, 's', $email);

        if (mysqli_stmt_execute($stmt_update)) {
            echo 'Email confirmado com sucesso!';
        } else {
            echo 'Erro ao confirmar email: ' . mysqli_error($liga);
        }
    } else {
        echo 'Email não encontrado.';
    }
} else {
    echo 'Email não fornecido.';
}
?>

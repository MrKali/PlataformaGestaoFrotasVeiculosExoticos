<?php
session_start();
include 'conexaoDb.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Atualizar o estado da requisição para 'rejeitado'
    $query = "UPDATE requisicoes SET estado = 'rejeitado' WHERE id = ?";
    $stmt = mysqli_prepare($liga, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("Requisição rejeitada com sucesso."); window.location.href = "gerirRequisicoesAdmin.php";</script>';
    } else {
        echo '<script>alert("Erro ao rejeitar a requisição: ' . mysqli_error($liga) . '"); window.history.back();</script>';
    }
}
?>

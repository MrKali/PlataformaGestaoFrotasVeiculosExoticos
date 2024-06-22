<?php
session_start();
include 'conexaoDb.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Atualizar o estado da requisição para 'aprovado'
    $query = "UPDATE requisicoes SET estado = 'aprovado' WHERE id = ?";
    $stmt = mysqli_prepare($liga, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        // Atualizar o estado do veículo para 'reservado'
        $query_veiculo = "UPDATE veiculos 
                          SET estado = 'reservado' 
                          WHERE id = (SELECT veiculo_id FROM requisicoes WHERE id = ?)";
        $stmt_veiculo = mysqli_prepare($liga, $query_veiculo);
        mysqli_stmt_bind_param($stmt_veiculo, 'i', $id);
        mysqli_stmt_execute($stmt_veiculo);

        echo '<script>alert("Requisição aprovada com sucesso."); window.location.href = "gerirRequisicoesAdmin.php";</script>';
    } else {
        echo '<script>alert("Erro ao aprovar a requisição: ' . mysqli_error($liga) . '"); window.history.back();</script>';
    }
}
?>

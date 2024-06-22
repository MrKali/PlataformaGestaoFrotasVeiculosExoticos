<?php
session_start();
include 'conexaoDb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $data_devolucao = $_POST['data_devolucao'];

    // Atualizar a data de devolução da requisição
    $query = "UPDATE requisicoes SET data_devolucao = ?, estado = 'devolvido' WHERE id = ?";
    $stmt = mysqli_prepare($liga, $query);
    mysqli_stmt_bind_param($stmt, 'si', $data_devolucao, $id);

    if (mysqli_stmt_execute($stmt)) {
        // Atualizar o estado do veículo para 'disponível'
        $query_veiculo = "UPDATE veiculos SET estado = 'disponivel' WHERE id = (SELECT veiculo_id FROM requisicoes WHERE id = ?)";
        $stmt_veiculo = mysqli_prepare($liga, $query_veiculo);
        mysqli_stmt_bind_param($stmt_veiculo, 'i', $id);
        mysqli_stmt_execute($stmt_veiculo);

        echo '<script>alert("Data de devolução e estado do veículo atualizados com sucesso."); window.location.href = "estadoRequisicoes.php";</script>';
    } else {
        echo '<script>alert("Erro ao atualizar a data de devolução: ' . mysqli_error($liga) . '"); window.history.back();</script>';
    }
}
?>

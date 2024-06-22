<?php
session_start();
include 'conexaoDb.php';

if (isset($_GET['id']) && isset($_GET['estado'])) {
    $id = $_GET['id'];
    $estado = $_GET['estado'];

    // Atualizar o estado do veículo
    $query = "UPDATE veiculos SET estado = ? WHERE id = ?";
    $stmt = mysqli_prepare($liga, $query);
    mysqli_stmt_bind_param($stmt, 'si', $estado, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("Estado do veículo atualizado com sucesso."); window.location.href = "gerirEstadoVeiculos.php";</script>';
    } else {
        echo '<script>alert("Erro ao atualizar o estado do veículo: ' . mysqli_error($liga) . '"); window.history.back();</script>';
    }
}
?>

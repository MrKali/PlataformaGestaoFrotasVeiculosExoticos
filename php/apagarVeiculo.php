<?php
include 'conexaoDb.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Verificar se o veículo existe
    $query_verificar = "SELECT * FROM `veiculos` WHERE `id` = $id";
    $result_verificar = mysqli_query($liga, $query_verificar);

    if (mysqli_num_rows($result_verificar) > 0) {
        // Apagar o veículo
        $query_apagar = "DELETE FROM `veiculos` WHERE `id` = $id";
        if (mysqli_query($liga, $query_apagar)) {
            echo "<script>alert('Veículo apagado com sucesso!'); window.location.href='gerirVeiculoAdmin.php';</script>";
        } else {
            echo "<script>alert('Erro ao apagar veículo: " . mysqli_error($liga) . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Veículo não encontrado.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('ID do veículo não fornecido.'); window.history.back();</script>";
}
?>

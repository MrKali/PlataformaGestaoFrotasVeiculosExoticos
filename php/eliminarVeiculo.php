<?php
include 'conexaoDb.php';
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: ../autenticar.html");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Iniciar transação
    mysqli_begin_transaction($liga);

    try {
        // Eliminar as requisições associadas ao veículo
        $query_requisicoes = "DELETE FROM requisicoes WHERE veiculo_id = ?";
        $stmt_requisicoes = mysqli_prepare($liga, $query_requisicoes);
        mysqli_stmt_bind_param($stmt_requisicoes, 'i', $id);
        mysqli_stmt_execute($stmt_requisicoes);

        // Eliminar o veículo da base de dados
        $query_veiculo = "DELETE FROM veiculos WHERE id = ?";
        $stmt_veiculo = mysqli_prepare($liga, $query_veiculo);
        mysqli_stmt_bind_param($stmt_veiculo, 'i', $id);
        mysqli_stmt_execute($stmt_veiculo);

        // Commit transação
        mysqli_commit($liga);

        echo '<script>alert("Veículo eliminado com sucesso."); window.location.href = "gerirEstadoVeiculos.php";</script>';
    } catch (mysqli_sql_exception $exception) {
        // Rollback transação em caso de erro
        mysqli_rollback($liga);
        echo '<script>alert("Erro ao eliminar o veículo: ' . $exception->getMessage() . '"); window.history.back();</script>';
    }
} else {
    header("Location: gerirEstadoVeiculos.php");
    exit();
}
?>

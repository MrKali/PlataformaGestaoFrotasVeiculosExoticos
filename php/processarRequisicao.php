<?php
session_start();
include 'conexaoDb.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../autenticar.html");
    exit();
}

$username = $_SESSION['username'];
$veiculo_id = $_POST['veiculo'];
$itinerario_id = $_POST['itinerario'];
$data_requisicao = $_POST['data_requisicao'];

// Inserir a requisição na base de dados
$query = "INSERT INTO requisicoes (username, veiculo_id, itinerario_id, data_requisicao, estado) VALUES (?, ?, ?, ?, 'pendente')";
$stmt = mysqli_prepare($liga, $query);
mysqli_stmt_bind_param($stmt, 'siis', $username, $veiculo_id, $itinerario_id, $data_requisicao);

if (mysqli_stmt_execute($stmt)) {
    echo '<script>alert("Pedido de requisição enviado com sucesso."); window.location.href = "estadoRequisicoes.php";</script>';
} else {
    echo '<script>alert("Erro ao enviar pedido de requisição: ' . mysqli_error($liga) . '"); window.history.back();</script>';
}
?>

<?php
include 'conexaoDb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $marca = intval($_POST['marca']);
    $modelo = intval($_POST['modelo']);
    $ano = intval($_POST['ano']);
    $matricula = strtoupper($_POST['matricula']);
    $estado = $_POST['estado']; // Estado pode ser atualizado, dependendo do cenário

    // Verificar se a matrícula já existe para outro veículo
    $query_verificar = "SELECT * FROM `veiculos` WHERE `matricula` = '$matricula' AND `id` != $id";
    $result_verificar = mysqli_query($liga, $query_verificar);

    if (mysqli_num_rows($result_verificar) > 0) {
        echo "<script>alert('Matrícula já existe.'); window.history.back();</script>";
    } else {
        $query = "UPDATE `veiculos` SET `marca` = '$marca', `modelo` = '$modelo', `ano` = '$ano', `matricula` = '$matricula', `estado` = '$estado' WHERE `id` = $id";

        if (mysqli_query($liga, $query)) {
            echo "<script>alert('Veículo atualizado com sucesso!'); window.location.href='gerirVeiculoAdmin.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar veículo: " . mysqli_error($liga) . "'); window.history.back();</script>";
        }
    }
}
?>

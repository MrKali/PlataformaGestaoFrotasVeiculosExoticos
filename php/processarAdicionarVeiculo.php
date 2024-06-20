<?php
include 'conexaoDb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marca = intval($_POST['marca']);
    $modelo = intval($_POST['modelo']);
    $ano = intval($_POST['ano']);
    $matricula = strtoupper($_POST['matricula']);
    $estado = ''; // Estado sempre em branco

    // Verificar se a matrícula já existe
    $query_verificar = "SELECT * FROM `veiculos` WHERE `matricula` = '$matricula'";
    $result_verificar = mysqli_query($liga, $query_verificar);

    if (mysqli_num_rows($result_verificar) > 0) {
        echo "<script>alert('Matrícula já existe.'); window.history.back();</script>";
    } else {
        $query = "INSERT INTO `veiculos` (`marca`, `modelo`, `ano`, `matricula`, `estado`) VALUES ('$marca', '$modelo', '$ano', '$matricula', '$estado')";

        if (mysqli_query($liga, $query)) {
            echo "<script>alert('Veículo adicionado com sucesso!'); window.location.href='gerirVeiculoAdmin.php';</script>";
        } else {
            echo "<script>alert('Erro ao adicionar veículo: " . mysqli_error($liga) . "'); window.history.back();</script>";
        }
    }
}
?>

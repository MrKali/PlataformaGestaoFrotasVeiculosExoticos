<?php
include 'conexaoDb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $matricula = $_POST['matricula'];
    $estado = 'disponivel';  // Estado inicial do veículo

    // Verificar se a matrícula já está cadastrada
    $query_check = "SELECT * FROM veiculos WHERE matricula = ?";
    $stmt_check = mysqli_prepare($liga, $query_check);
    mysqli_stmt_bind_param($stmt_check, 's', $matricula);
    mysqli_stmt_execute($stmt_check);
    $result_check = mysqli_stmt_get_result($stmt_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo 'Matrícula já cadastrada.';
    } else {
        // Inserir o novo veículo
        $query = "INSERT INTO veiculos (marca, modelo, ano, matricula, estado) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($liga, $query);
        mysqli_stmt_bind_param($stmt, 'siiss', $marca, $modelo, $ano, $matricula, $estado);

        if (mysqli_stmt_execute($stmt)) {
            echo 'Veículo adicionado com sucesso.';
        } else {
            echo 'Erro ao adicionar veículo: ' . mysqli_error($liga);
        }
    }
}
?>

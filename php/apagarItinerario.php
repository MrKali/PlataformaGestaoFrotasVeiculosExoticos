<?php
include 'conexaoDb.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Verificar se o itinerário existe
    $query_verificar = "SELECT * FROM `itinerarios` WHERE `id` = $id";
    $result_verificar = mysqli_query($liga, $query_verificar);

    if (mysqli_num_rows($result_verificar) > 0) {
        // Apagar o itinerário
        $query_apagar = "DELETE FROM `itinerarios` WHERE `id` = $id";
        if (mysqli_query($liga, $query_apagar)) {
            echo "<script>alert('Itinerário apagado com sucesso!'); window.location.href='gerirItinerariosAdmin.php';</script>";
        } else {
            echo "<script>alert('Erro ao apagar itinerário: " . mysqli_error($liga) . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Itinerário não encontrado.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('ID do itinerário não fornecido.'); window.history.back();</script>";
}
?>

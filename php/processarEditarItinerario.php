<?php
include 'conexaoDb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $titulo = mysqli_real_escape_string($liga, $_POST['titulo']);
    $descricao = mysqli_real_escape_string($liga, $_POST['descricao']);
    $mapa_url = mysqli_real_escape_string($liga, $_POST['mapa_url']);

    $query = "UPDATE `itinerarios` SET `titulo` = '$titulo', `descricao` = '$descricao', `mapa_url` = '$mapa_url' WHERE `id` = $id";

    if (mysqli_query($liga, $query)) {
        echo "<script>alert('Itinerário atualizado com sucesso!'); window.location.href='gerirItinerariosAdmin.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar itinerário: " . mysqli_error($liga) . "'); window.history.back();</script>";
    }
}
?>

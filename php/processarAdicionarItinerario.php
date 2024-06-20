<?php
include 'conexaoDb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = mysqli_real_escape_string($liga, $_POST['titulo']);
    $descricao = mysqli_real_escape_string($liga, $_POST['descricao']);
    $mapa_url = mysqli_real_escape_string($liga, $_POST['mapa_url']);

    $query = "INSERT INTO `itinerarios` (`titulo`, `descricao`, `mapa_url`) VALUES ('$titulo', '$descricao', '$mapa_url')";

    if (mysqli_query($liga, $query)) {
        echo "<script>alert('Itinerário adicionado com sucesso!'); window.location.href='gerirItinerariosAdmin.php';</script>";
    } else {
        echo "<script>alert('Erro ao adicionar itinerário: " . mysqli_error($liga) . "'); window.history.back();</script>";
    }
}
?>

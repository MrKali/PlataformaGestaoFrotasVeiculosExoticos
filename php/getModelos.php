<?php
include 'conexaoDb.php';

if (isset($_GET['id_marca'])) {
    $id_marca = intval($_GET['id_marca']);
    $query_modelos = "SELECT * FROM `modelos` WHERE `id_marca` = $id_marca";
    $result_modelos = mysqli_query($liga, $query_modelos);

    if (!$result_modelos) {
        die("Erro ao obter os modelos: " . mysqli_error($liga));
    }

    $modelos = [];
    while ($row = mysqli_fetch_assoc($result_modelos)) {
        $modelos[] = $row;
    }

    echo json_encode($modelos);
}
?>

<?php
include 'conexaoDb.php';

if (isset($_GET['marca_id'])) {
    $marca_id = intval($_GET['marca_id']);
    $query = "SELECT diretorio_logo FROM marcas WHERE id = $marca_id";
    $result = mysqli_query($liga, $query);

    if ($result) {
        $marca = mysqli_fetch_assoc($result);
        if ($marca) {
            echo json_encode(['diretorio_logo' => $marca['diretorio_logo']]);
        } else {
            echo json_encode(['error' => 'Marca não encontrada.']);
        }
    } else {
        echo json_encode(['error' => 'Erro na consulta ao banco de dados.']);
    }
} else {
    echo json_encode(['error' => 'ID da marca não fornecido.']);
}
?>

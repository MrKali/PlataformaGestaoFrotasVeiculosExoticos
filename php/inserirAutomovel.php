<?php
include "ligaBD.php";

// Obter dados do formulário
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$matricula = $_POST['matricula'];

// Preparar e executar a query
$query = "INSERT INTO veiculos (marca, modelo, ano, matricula) VALUES ('$marca', '$modelo', $ano, '$matricula')";

if(mysqli_query($liga, $query)){
    echo "success";
} else {
    echo "Erro ao inserir o veículo: " . mysqli_error($liga);
}

mysqli_close($liga);
?>

<?php
include 'conexaoDb.php';

// Verificar se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter dados do formulário
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $matricula = $_POST['matricula'];
    $estado = 'disponivel'; // Definir o estado como disponível

    // Inserir veículo na base de dados
    $query = "INSERT INTO veiculos (marca, modelo, ano, matricula, estado) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($liga, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssiss', $marca, $modelo, $ano, $matricula, $estado);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                    alert('Veículo adicionado com sucesso!');
                    setTimeout(function() {
                        window.location.href = 'gerirEstadoVeiculos.php';
                    }, 2000);
                  </script>";
        } else {
            echo "Erro ao adicionar veículo: " . mysqli_error($liga);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da query: " . mysqli_error($liga);
    }
}

mysqli_close($liga);
?>

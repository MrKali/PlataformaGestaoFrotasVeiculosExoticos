<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserção de Veículos</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .dropdown-item img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
        .dropdown-menu {
            width: 100%;
        }
        .dropdown-toggle::after {
            margin-left: 10px;
        }
    </style>
</head>
<body>
<?php include 'menu.php'; ?>
    <?php
    session_start();
    // Verificar se o usuário está autenticado
    if (!isset($_SESSION['username'])) {
        header("Location: index.html");
        exit();
    }
    ?>
    <header>
        <h1>Inserir Veículo</h1>
    </header>
    <main>
        <form id="vehicleForm">
            <label for="marca">Marca:</label>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="marcaDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Selecione a Marca
                </button>
                <div class="dropdown-menu" aria-labelledby="marcaDropdown">
                    <a class="dropdown-item" href="#" data-value="Acura"><img src="img/acura-removebg-preview.png" alt="Acura"> Acura</a>
                    <a class="dropdown-item" href="#" data-value="Aston Martin"><img src="img/Aston-Martin-removebg-preview.png" alt="Aston Martin"> Aston Martin</a>
                    <a class="dropdown-item" href="#" data-value="Bentley"><img src="img/bentley-removebg-preview.png" alt="Bentley"> Bentley</a>
                    <!-- Adicione mais marcas conforme necessário -->
                </div>
            </div>
            <input type="hidden" id="marca" name="marca" required>

            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" required><br>

            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" required><br>

            <label for="matricula">Matrícula:</label>
            <input type="text" id="matricula" name="matricula" required><br>

            <input type="submit" value="Inserir Veículo" class="btn btn-primary">
        </form>
        <a href="index.html">Voltar ao Início</a>

        <!-- Modal -->
        <div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="responseModalLabel">Mensagem</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modalMessage">
                        <!-- Mensagem será inserida aqui -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="modalOkButton">OK</button>
                        <button type="button" class="btn btn-secondary" id="modalInsertNewButton">Inserir Novo Veículo</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Audio Element -->
        <audio id="successAudio" src="music/pedro.mp3" preload="auto"></audio>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Dropdown item click handler
            $('.dropdown-item').on('click', function(e) {
                e.preventDefault();
                var selectedBrand = $(this).data('value');
                var brandName = $(this).text().trim();
                $('#marcaDropdown').text(brandName);
                $('#marca').val(selectedBrand);
            });

            $('#vehicleForm').on('submit', function(event) {
                event.preventDefault(); // Prevenir o envio padrão do formulário

                $.ajax({
                    url: 'php/inserirAutomovel.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if(response === "success"){
                            $('#modalMessage').html('<p>Inserido com sucesso!</p><img src="img/pedro.gif" alt="Sucesso">');
                            $('#successAudio')[0].play();
                        } else {
                            $('#modalMessage').text(response);
                        }
                        $('#responseModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        $('#modalMessage').text('Erro ao inserir o veículo: ' + error);
                        $('#responseModal').modal('show');
                    }
                });
            });

            $('#modalOkButton').on('click', function() {
                window.location.href = 'index.html';
            });

            $('#modalInsertNewButton').on('click', function() {
                window.location.href = 'inserir.php';
            });
        });
    </script>
</body>
</html>

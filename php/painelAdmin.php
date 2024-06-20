<?php include 'menuAdmin.php'; ?>
        <h2>Bem-vindo ao painel de administração!</h2>
        <p>Aqui você pode gerenciar a frota de veículos e os itinerários disponíveis.</p>
        
        <div class="menu-section" id="gerir-veiculos">
            <h3>Gerir Veículos</h3>
            <ul>
                <li><a href="adicionarVeiculo.php">Adicionar Veículo</a></li>
                <li><a href="removerVeiculo.php">Remover Veículo</a></li>
                <li><a href="atualizarVeiculo.php">Atualizar Veículo</a></li>
                <li><a href="listarVeiculos.php">Visualizar Veículos Disponíveis</a></li>
            </ul>
        </div>

        <div class="menu-section" id="gerir-itinerarios">
            <h3>Gerir Itinerários</h3>
            <ul>
                <li><a href="adicionarItinerario.php">Adicionar Itinerário</a></li>
                <li><a href="removerItinerario.php">Remover Itinerário</a></li>
                <li><a href="atualizarItinerario.php">Atualizar Itinerário</a></li>
                <li><a href="listarItinerarios.php">Visualizar Itinerários Disponíveis</a></li>
            </ul>
        </div>

        <div class="menu-section" id="gerir-utilizadores">
            <h3>Gerir Utilizadores</h3>
            <ul>
                <li><a href="adicionarUtilizador.php">Adicionar Utilizador</a></li>
                <li><a href="removerUtilizador.php">Remover Utilizador</a></li>
                <li><a href="atualizarUtilizador.php">Atualizar Utilizador</a></li>
                <li><a href="listarUtilizadores.php">Visualizar Utilizadores</a></li>
            </ul>
        </div>

        <div class="menu-section" id="gerir-requisicoes">
            <h3>Gerir Requisições de Veículos</h3>
            <ul>
                <li><a href="aprovarRequisicoes.php">Aprovar/Rejeitar Requisições</a></li>
                <li><a href="listarRequisicoes.php">Visualizar Requisições Pendentes</a></li>
            </ul>
        </div>

        <div class="menu-section" id="gerir-relatorios">
            <h3>Gerir Relatórios e Estatísticas</h3>
            <ul>
                <li><a href="gerarRelatorios.php">Gerar Relatórios de Utilização</a></li>
                <li><a href="estatisticasManutencao.php">Estatísticas de Manutenção</a></li>
                <li><a href="relatoriosCombustivel.php">Relatórios de Consumo de Combustível</a></li>
            </ul>
        </div>
    </main>
</body>
</html>

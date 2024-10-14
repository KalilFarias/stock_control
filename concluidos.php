<?php
    
    include_once("config/login_check.php");
    include_once("templates/header.php");

$stock = [];

$query = "SELECT s.*, u_criacao.nome AS nome_usuario_criacao, u_devolucao.nome AS nome_usuario_devolucao
    FROM stocks s
    JOIN usuarios u_criacao ON s.usuario_id_criacao = u_criacao.id
    JOIN usuarios u_devolucao ON s.usuario_id_devolucao = u_devolucao.id; 
    WHERE devolvido = 1";

$stmt = $conn->prepare($query);

$stmt->execute();

$stock = $stmt->fetchAll();


?>
<div class="container">
    <h1 id="main-title">Solicitações já concluídas</h1>
    <?php if(count($stock) > 0): ?>
        <table class="table" id="stock-table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Ferramenta Solicitada</th>
                    <th scope="col">Numero do patrimonio</th>
                    <th scope="col">Data da solicitação</th>
                    <th scope="col">Horário da solicitação</th>
                    <th scope="col">Usuario de criação</th>
                    <th scope="col">Data de devolução</th>
                    <th scope="col">Horário de devolução</th>
                    <th scope="col">Usuario de devolução</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($stock as $stocks): ?>
                    <tr>
                        <td scope="row"><?= htmlspecialchars($stocks["name"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["tool"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["patrimonio"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["date_retirada"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["time_retirada"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["nome_usuario_criacao"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["date_devolucao"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["time_devolucao"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["nome_usuario_devolucao"]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum item concluído encontrado.</p>
    <?php endif; ?>
</div>
<?php
include_once("templates/footer.php");
?>
<script src="js/formata_data.js" defer></script>
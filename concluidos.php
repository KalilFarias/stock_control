<?php
    
    include_once("config/login_check.php");
    include_once("templates/header.php");

$stock = [];

// Verifica se foi submetido o filtro de datas
$dateStart = isset($_GET['date_start']) ? $_GET['date_start'] : null;
$dateEnd = isset($_GET['date_end']) ? $_GET['date_end'] : null;

// Consulta base
$query = "SELECT s.*, u_criacao.nome AS nome_usuario_criacao, u_devolucao.nome AS nome_usuario_devolucao
    FROM stocks s
    JOIN usuarios u_criacao ON s.usuario_id_criacao = u_criacao.id
    JOIN usuarios u_devolucao ON s.usuario_id_devolucao = u_devolucao.id 
    WHERE s.devolvido = 1";

// Condições dinâmicas para filtro de datas
if ($dateStart && $dateEnd) {
    // Se ambas as datas foram fornecidas
    $query .= " AND s.date_retirada BETWEEN :date_start AND :date_end";
} elseif ($dateStart) {
    // Se apenas a data de início foi fornecida
    $query .= " AND s.date_retirada >= :date_start";
} elseif ($dateEnd) {
    // Se apenas a data de término foi fornecida
    $query .= " AND s.date_retirada <= :date_end";
}

// Prepara a consulta
$stmt = $conn->prepare($query);
//echo $query;

// Vincula os parâmetros de data se aplicável
if ($dateStart) {
    $stmt->bindParam(':date_start', $dateStart);
}
if ($dateEnd) {
    $stmt->bindParam(':date_end', $dateEnd);
}

// Executa a consulta
$stmt->execute();
$stock = $stmt->fetchAll();
?>

<div class="container">
    <h1 id="main-title">Solicitações já concluídas</h1>

    <!-- Formulário de filtro por datas -->
    <form method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="date_start">Data de Início</label>
                <input type="date" name="date_start" class="form-control" value="<?= htmlspecialchars($dateStart) ?>">
            </div>
            <div class="col-md-4">
                <label for="date_end">Data de Término</label>
                <input type="date" name="date_end" class="form-control" value="<?= htmlspecialchars($dateEnd) ?>">
            </div>
            <div class="col-md-4 align-self-end">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <?php if(count($stock) > 0): ?>
        <table class="table" id="stock-table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Ferramenta Solicitada</th>
                    <th scope="col">Numero do patrimônio</th>
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
        
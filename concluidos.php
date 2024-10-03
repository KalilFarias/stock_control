<?php

include_once("templates/header.php");

$stock = [];

$query = "SELECT * FROM stocks WHERE devolvido = 1";

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
                    <th scope="col">Data da solicitação</th>
                    <th scope="col">Horário da solicitação</th>
                    <th scope="col">Data de devolução</th>
                    <th scope="col">Horário de devolução</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($stock as $stocks): ?>
                    <tr>
                        <td scope="row"><?= htmlspecialchars($stocks["name"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["tool"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["date_retirada"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["time_retirada"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["date_devolucao"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["time_devolucao"]) ?></td>
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

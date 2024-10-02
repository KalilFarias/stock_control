<?php

include_once("templates/header.php");



?>
<div class="container">
    <h1 id="main-title">Solicitações já concluídas</h1>
    <?php if(count($stock) > 0): ?>
        <table class="table" id="stock-table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Ferramenta Solicitada</th>
                    <th scope="col">Data</th>
                    <th scope="col">Horário da solicitação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($stock as $stocks): ?>
                    <tr>
                        <td scope="row"><?= htmlspecialchars($stocks["name"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["tool"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["date_retirada"]) ?></td>
                        <td scope="row"><?= htmlspecialchars($stocks["time_retirada"]) ?></td>
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

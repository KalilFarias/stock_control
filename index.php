<?php
  include_once("templates/header.php");
?>
  <div class="container">
    <?php if(isset($printMsg) && $printMsg != ''): ?>
      <p id="msg"><?= $printMsg ?></p>
    <?php endif; ?>
    <h1 id="main-title">Controle de Ferramentas</h1>
    <?php if(count($stock) > 0): ?>
      <table class="table" id="stock-table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Ferramenta Solicitada</th>
            <th scope="col">Data</th>
            <th scope="col">Horário da solicitação</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($stock as $stocks): ?>
            <tr>
              <td scope="row"><?= $stocks["name"] ?></td>
              <td scope="row"><?= $stocks["tool"] ?></td>
              <td scope="row"><?= $stocks["date_retirada"]?></td>
              <td scope="row"><?= $stocks["time_retirada"]?></td>
              <td class="actions">
                <a href="<?= $BASE_URL ?>show.php?id=<?= $stocks["id"] ?>"><i class="fas fa-eye check-icon"></i></a>
                <?php if (isset($_COOKIE['token_sessao'])) {?>
                  <a href="<?= $BASE_URL ?>edit.php?id=<?= $stocks["id"] ?>"><i class="far fa-edit edit-icon"></i></a>
                  <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST">
                    <input type="hidden" name="type" value="delete">
                    <input type="hidden" name="id" value="<?= $stocks["id"] ?>">
                    <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                  </form>
                  <?php }?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>  
      <p id="empty-list-text">Ainda não há nenhuma solicitação <a href="<?= $BASE_URL ?>create.php">clique aqui para adicionar</a>.</p>
    <?php endif; ?>
  </div>
<?php
  include_once("templates/footer.php");
?>

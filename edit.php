<?php
  include_once("config/login_check.php");
  include_once("templates/header.php");
?>
  <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Editar solicitação</h1>
    <form id="create-form" action="config/process.php" method="POST">
      <input type="hidden" name="type" value="edit">
      <input type="hidden" name="id" value="<?= $stock['id'] ?>">
      <div class="form-group">
        <label for="name">Nome do solicitante:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" value="<?= $stock['name'] ?>" required>
      </div>
      <div class="form-group">
        <label for="tool">Nome da ferramenta:</label>
        <input type="text" class="form-control" id="tool" name="tool" placeholder="Digite o telefone" value="<?= $stock['tool'] ?>" required>
      </div>
      <div class="form-group">
        <label for="name">Numero do patrimonio:</label>
        <input type="number" class="form-control" id="patrimonio" name="patrimonio" placeholder="Digite o numero do patriomonio" value="<?= $stock['name'] ?>" required>
      </div>
      <div class="form-group">
        <label for="observation">Observações:</label>
        <textarea type="text" class="form-control" id="observation" name="observation" placeholder="Insira as observações" rows="3"><?= $stock['observation'] ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
  </div>
<?php
  include_once("templates/footer.php");
?>

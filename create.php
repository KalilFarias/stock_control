<?php
  include_once("templates/header.php");
  if (!isset($_COOKIE['token_sessao'])) {
    header("Location: index.php");
  }
?>
  <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Criar Pedido</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
      <input type="hidden" name="type" value="create">
      <div class="form-group">
        <label for="name">Nome do solicitante:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" required>
      </div>
      <div class="form-group">
        <label for="tool">Ferramenta solicitada:</label>
        <input type="text" class="form-control" id="tool" name="tool" placeholder="Digite o telefone" required>
      </div>
      <div class="form-group">
        <label for="observation">Observações:</label>
        <textarea type="text" class="form-control" id="observation" name="observation" placeholder="Insira as observações" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Concluir</button>
    </form>
  </div>
<?php
  include_once("templates/footer.php");
?>

<?php
  include_once("templates/header.php");
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
        <input type="text" class="form-control" id="tool" name="tool" placeholder="Digite o nome da ferramenta" required>
      </div>
      <div class="form-group">
        <label for="patrimonio">Numero do patrimonio:</label>
        <input type="number" class="form-control" id="patrimonio" name="patrimonio" placeholder="Digite o numero do patrimonio" required>
      </div>
      <div class="form-group">
        <label for="date">Data da solicitação</label>
        <input type="date" class="form-control" id="date_retirada" name="date_retirada" value="<?php echo date('d-m-y');?>"required>
      </div>
      <div class="form-group">
        <label for="time_retirada">Horário da solicitação</label>
        <input type="time" class="form-control" id="time_retirada" name="time_retirada" value="<?php echo date('H:i'); ?>" required>
      </div>
      <div class="form-group">
        <label for="observation">Observações:</label>
        <textarea type="text" class="form-control" id="observation" name="observation" placeholder="Insira as observações" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-success mt-4">Concluir</button>
    </form>
  </div>
<?php
  include_once("templates/footer.php");
?>

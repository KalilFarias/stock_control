<?php
  include_once("templates/header.php");

  if ($_SESSION['is_admin'] != 1) {
    header("Location: index.php");
  }
?>
<div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Resetar senha de Usuário</h1>
    <form id="create-form" action="config/process.php" method="POST">
      <input type="hidden" name="type" value="reset-senha">
      <div class="form-group">
        <label for="senha-atual">Email do Usuário:</label>
        <input type="email" class="form-control" id="email-reset" name="email-reset" placeholder="Digite o email do usuário" required>
      </div>
      <div class="form-group">
        <label for="nova-senha">Nova Senha:</label>
        <input type="password" class="form-control" id="nova-senha" name="nova-senha" placeholder="Digite a nova senha" required>
        <br>
        <input type="password" class="form-control" id="confirma-senha" name="confirma-senha" placeholder="Confirme a nova senha" required>
      </div>
      <div class="container form-group">
        <div class="row justify-content-around">
            <button type="reset" class="col-3 btn btn-danger">Limpar dados</button>
            <button type="submit" class="col-3 btn btn-success">Concluir</button>

        </div>
      </div>
    </form>
</div>
<?php
  include_once("templates/footer.php");
?>
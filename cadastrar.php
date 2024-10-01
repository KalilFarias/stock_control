<?php
  include_once("templates/header.php");

  if (!isset($_COOKIE['token_sessao']) and $_SESSION['is_admin'] != 1) {
    header("Location: index.php");
  }
?>
<div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Cadastrar usuário</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
      <input type="hidden" name="type" value="cadastrar">
      <div class="form-group">
        <label for="name">Nome do usuário:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do Usuário" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha" required>
        <hr>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Confirme a senha" required>
      </div>
      <div class="form-group">
        <label for="observation">Observações:</label>
        <textarea type="text" class="form-control" id="observation" name="observation" placeholder="Insira as observações" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Concluir</button>
    </form>
  </div>
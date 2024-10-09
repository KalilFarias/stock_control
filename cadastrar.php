<?php

  if ($_SESSION['is_admin'] != 1) {
    header("Location: index.php");
  }
  
  include_once("templates/header.php");

?>
<div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Cadastrar novo usuário</h1>
    <form id="create-form" action="config/process.php" method="POST">
      <input type="hidden" name="type" value="cadastrar-usuario">
      <div class="form-group">
        <label for="nome">Nome do usuário:</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do Usuário" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha" required>
        <br>
        <input type="password" class="form-control" id="confirma-senha" name="confirma-senha" placeholder="Confirme a senha" required>
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
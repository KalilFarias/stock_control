<?php

  include_once("config/url.php");
  include_once("config/process.php");
  include_once("config/auth.php");

  // limpa a mensagem
  if(isset($_SESSION['msg'])) {
    $printMsg = $_SESSION['msg'];
    $_SESSION['msg'] = '';
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Controle de Ferramentas</title>
  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <!-- CSS -->
  <link rel="stylesheet" href="<?= $BASE_URL ?>css/styles.css">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="<?= $BASE_URL ?>index.php">
        <img src="<?= $BASE_URL ?>img/logo.svg" alt="Agenda">
      </a>
      <div>
        <div class="navbar-nav">
          <a class="nav-link active" id="home-link" href="<?= $BASE_URL ?>index.php">Controle</a>
          <?php if (isset($_COOKIE['token_sessao'])) {?>
            <a class="nav-link active" href="<?= $BASE_URL ?>create.php">Adicionar Pedido</a>
          <?php }?>
          <?php if (isset($_COOKIE['token_sessao'])) {?>
            <a class="nav-link active" href="<?= $BASE_URL ?>concluidos.php">Concluidos</a>
          <?php }?>
          <!-- Botão Meu Cadastro (colapsable) -->
          <?php if (!isset($_COOKIE['token_sessao'])) { ?>

          <!-- Mostrar botão de Login se o usuário não estiver logado -->
              <li class="nav-item col-sm-auto">
                  <a class="nav-link navbar-content" aria-current="page" href="<?= $BASE_URL ?>login.php">Login</a>
              </li>
          <?php } else {?>

          <!-- Mostrar o menu com o nome do usuário se ele estiver logado -->
              <li class="nav-item dropdown col-sm-auto">
                  <a class="nav-link dropdown-toggle navbar-content" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Olá <?php echo $_SESSION['user_name'] ?> <!-- Mostra o nome do usuário -->
                  </a>
                  <ul class="dropdown-menu col-sm-auto navbar-dropdown"> <!-- Menu com opções, que abre quando clica non nome do usuário -->
                      <li class="dropdown-header">Config de usuário</li>
                      <li><a class="dropdown-item navbar-content" href="alterar_senha.php">Alterar senha</a></li>
                      <!-- Opção de cadastrar usuário estará disponível só para o admin-->
                      <?php if($_SESSION['is_admin'] == 1) {?>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-header">Gerenciamento</li>
                        <li><a class="dropdown-item navbar-content" href="cadastrar.php">Cadastrar Usuário</a></li>
                        <li><a class="dropdown-item navbar-content" href="reset_senha.php">Resetar Senha</a></li>
                        <?php }?>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item navbar-content" href="logoff.php">Logout</a></li>
                  </ul>
              </li>
          <?php } ?>
        </div>
      </div>
    </nav>
  <!-- BOOTSTRAP JAVASCRIPT-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </header>
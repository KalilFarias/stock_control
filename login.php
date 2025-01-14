<?php
  include_once("templates/header.php");
?>


<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 text-center">
            <img src="img/logo_policia.png" alt="Logo Polícia" class="img-fluid mt-5 mb-3" width="250">
            <h2 class="fw-bold">Bem-vindo</h2>
            <p class="text-muted">Por favor, efetue o login para acessar o sistema</p>
        </div>

        <div class="col-md-5">
            <div class="card shadow-lg p-4 border-0 rounded-4">
                <h3 class="text-center mb-4 text-primary">Login</h3>
                <form action="config/process.php" method="POST">
                    <input type="hidden" name="type" value="login">
                
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email-input" name="email" placeholder="seuemail@dominio.com.br" required>
                        <label for="email-input">E-mail</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password-input" name="senha" placeholder="Senha" required>
                        <label for="password-input">Senha</label>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg rounded-pill shadow-sm" type="submit">
                            Entrar
                        </button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <a href="#" class="text-decoration-none text-primary small">Esqueceu sua senha?</a>
                </div>
            </div>
        </div>
    </div>
</div>

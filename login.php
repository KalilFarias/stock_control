<?php
  include_once("templates/header.php");
?>

    <div class="row align-items-center mb-5">
        
        <div class="col-md-7 col-lg-6 mt-3 mx-auto">
            <div class="px-4 py-2 mt-4 mb-2 mx-auto col-lg-7 text-center">
                <img src="img/logo_policia.png" alt="" class="img-fluid mt-5 rounded-3" width="300">

            </div>
        </div>


        <div class="col-md-12 col-lg-6">
            <div class="px-4 py-2 mt-4 mb-2 mx-auto col-lg-7 text-center">
                <h1 class="display-8 fw-bold">Efetue o login para acessar o sistema</h1>
            </div>
        
            <div class="col-md-10 mx-auto col-lg-7">
                <form class="p-4 p-md-5 rounded-3 form-custom" action="<?= $BASE_URL ?>config/process.php" method="POST">
                    <input type="hidden" name="type" value="login">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control form-field-custom" id="email-input" name="email" placeholder="seuemail@dominio.com.br">
                        <label for="email-input" class="form-label-custom">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control form-field-custom" id="password-input" name="senha" placeholder="Senha">
                        <label for="password" class="form-label-custom">Senha</label>
                    </div>
                    <div class="d-grid gap-3 col mx-auto">
                        <button class="btn btn-primary btn-lg" type="submit">Entrar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>